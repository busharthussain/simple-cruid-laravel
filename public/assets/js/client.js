$(document).ready(function () {
    $(document).on('click', '#add-record, #edit-record', function (e) {
        e.preventDefault();
        $type = 'addRecord';
        $methodType = 'PUT';
        if (this.id == 'add-record') {
            $methodType = 'POST';
        }
        updateFormData();
        renderClient();
    });

    $(document).on("click", '.paq-pager ul.pagination a', function (e) {
        if (typeof ($isBladePaginator) === 'undefined') {
            e.preventDefault();
            $page = $(this).attr('href').split('page=')[1];
            $type = $defaultType;
            updateFormData();
            renderClient();
        }
    });

    $('body').on('click', '.delete_content', function (e) {
        e.preventDefault();
        if (typeof ($viewOnly) === 'undefined' || $viewOnly != 1) {
            $deleteId = this.id;
            swal({
                title: "Are you sure to delete?",
                icon: "warning",
                buttons: ["Cancel", "Delete"],
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                dangerMode: true,
                closeOnCancel: true
            }).then(function (isConfirm) {
                if (isConfirm) {
                    $type = 'delete';
                    $formData = {
                        '_token': $token,
                        'id': $deleteId
                    };
                    renderClient();
                }
            })
        }
    });

    $('body').on('click', '.sorting', function (e) {
        e.preventDefault();
        $('.sorting').not(this).removeClass('fa-sort-asc fa-sort-desc').addClass('fa-sort');
        $sortColumn = $(this).parent().attr("id");
        if ($(this).hasClass('fa-sort-' + $asc)) {
            $(this).removeClass('fa-sort-' + $asc).addClass('fa-sort-' + $desc);
            $sortType = 'desc';
        } else if ($(this).hasClass('fa-sort-' + $desc)) {
            $(this).removeClass('fa-sort-' + $desc).addClass('fa-sort-' + $asc);
            $sortType = 'asc';
        } else {
            $(this).addClass('fa-sort-' + $asc);
            $sortType = 'asc';
        }
        $type = $defaultType;
        updateFormData();
        renderClient();
    });

    $('#search').keydown(function (e) {
        if (e.keyCode == 13) {
            event.preventDefault();
            $search = $(this).val();
            $page = 1;
            updateFormData();
            $type = $defaultType;
            renderClient();
        }
    });

    /**
     * This is used to get drop down data dynamically
     */
    $('body .drop_down_filters').change(function () {
        $dropDownFilters = {};
        var inputs = $(".drop_down_filters");
        for (var i = 0; i < inputs.length; i++) {
            $dropDownFilters[$(inputs[i]).attr('id')] = $(inputs[i]).val();
        }
        updateFormData();
        $type = $defaultType;
        renderClient();
    });

});

/**
 * This is used to control admin all functions
 */
function renderClient(uniqueId = "") {

    /**
     * This is user to render grid data on base of grid fields
     */
    var renderGrid = function () {
        $html = '';
        $result = $data.result;
        $gridFields = $data.gridFields;
        $('#total-record').html('[' + $data.total + ']');
        $(".paq-pager").html($data.pager);
        if ($result != '') {
            $.each($result, function (i, v) {
                $keyValue = v;
                $blockedDisplay = '';
                $html += '<tr id="row_' + $keyValue.id + '" class="' + $blockedDisplay + '">' ;
                $.each($gridFields, function (index, value) {
                    $columValue = v[value.name];
                    if (value.name == 'checkbox') {
                        $html += '<td id="column_' + value.name + '_' + $keyValue.id + '"><input class="checkbox-items" type="checkbox" id="checkbox_' + $keyValue.id + '"></td>';
                    }else if (value.name == 'image') {
                        $html += '<td id="column_' + value.name + '_' + $keyValue.id + '"><img id="product_image_'+$keyValue.id+'" src="'+$columValue+'" style="height: 100px; width: 100px;"/></td>';
                    }
                    else {
                        $html += '<td id="column_' + value.name + '_' + $keyValue.id + '">' + isNull($columValue) + '</td>';
                    }
                });
                var fn = window[$defaultType + 'Action'];
                if (typeof fn === 'function') { // used to trigger relative action
                    fn();
                }
                $html += '</tr>';
            });
        }
        $('#page-data').html($html);
    };

    /**
     * This is used to render plan action
     */
    renderProductAction = function () {
        $id = $keyValue.id;
        $html += '<td class="responsive-row">\n' +
            '<a href="'+$editRoute+ '/' + $id + '/edit' +'" id="edit_' + $id + '"  class="text-warning edit-button-group"><i class="fas fa-edit"></i></a>' +
            '<a href="#"  id="delete_' + $id + '" class="text-danger  delete_product"><i class="far fa-trash-alt"></i></a>\n' +
            '</td>';
    };


    /**
     * This is used to check value null or not
     *
     * @returns {*}
     */
    var isNull = function (value) {
        if ((value === null && typeof value === "object") || typeof (value) === 'undefined') {
            return '';
        }

        return value;
    };

    /**
     * This is used to upload image
     */
    var uploadImage = function () {
        $('.uploader').dmUploader({
            url: $uploadImageRoute,
            allowedTypes: 'image/*',
            dataType: 'json',
            onBeforeUpload: function (id) {
                $('.uploader').data('dmUploader').settings.extraData = {
                    "_token": $token,
                    id: 1
                };
            },
            onNewFile: function (id, file) {
                $.danidemo.addFile('#demo-files', id, file);

                /*** Begins Image preview loader ***/
                if (typeof FileReader !== "undefined") {

                    var reader = new FileReader();

                    // Last image added
                    var img = $('#demo-files').find('.demo-image-preview').eq(0);

                    reader.onload = function (e) {
                        img.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(file);

                } else {
                    // Hide/Remove all Images if FileReader isn't supported
                    $('#demo-files').find('.demo-image-preview').remove();
                }
                /*** Ends Image preview loader ***/

            },
            onUploadProgress: function (id, percent) {
                var percentStr = percent + '%';
                $.danidemo.updateFileProgress(id, percentStr);
            },
            onUploadSuccess: function (id, data) {
                if (typeof ($isUploadImage) !== 'undefined') {
                    $isUploadImage = true;
                }
                if (data.success == true) {
                    if (typeof $imageType != 'undefined' && $imageType == true) {
                        location.reload(true);
                    }
                    $.danidemo.updateFileStatus(id, 'success', 'Upload Complete');
                    $.danidemo.updateFileProgress(id, '100%');
                }
            },
            onUploadError: function (id, message) {
                //notificationMsg(message, error);
            },
            onFileTypeError: function (file) {
                notificationMsg('File \'' + file.name + '\' cannot be added: must be an Image', error);
            },
            onFileSizeError: function (file) {
                //notificationMsg('File \'' + file.name + '\' cannot be added: size excess limit', error);
            },
            onFallbackMode: function (message) {
                //notificationMsg('Browser not supported(do something else here!): ' + message, error);
            }
        });
    };

    /**
     * This is used to render grid routes
     */
    var callGridRender = function () {
        $.ajax({
            url: $renderRoute,
            type: 'GET',
            data: $formData,
            success: function (data) {

                $data = data;
                renderGrid();
            },
            error: function ($error) {
                // notificationMsg($error, error);
            }
        });
    };

    var sorter = function () {
        // will be add later
    };

    /**
     * This is common function used to add record
     */
    function addRecord () {
        $.ajax({
            url: $addRecordRoute,
            type: $methodType,
            data: $formData,
            success: function (data) {
                if (data.success === true) {
                    toastr.success(data.message);
                    window.location.href = $indexRoute;
                }
            },
            error: function (error) {
                $message = '';
                    $message = '';
                    $.each(error.responseJSON.errors, function (i, v) {
                        $message += v + "\n";
                    });
                swal("error!", $message, "error");
            }
        });
    };

    /**
     * This is general function used to delete content
     */
    var destroy = function () {
        ajaxStartStop();
        $.ajax({
            url: $deleteRoute,
            type: 'Delete',
            data: $formData,
            success: function (data) {
                if (data.success == true) {
                    swal("Done!", data.message, "success");
                    $('#row_' + data.id).remove();
                    if (typeof ($reloadAfterDelete) !== 'undefined' && $reloadAfterDelete == true) {
                        $page = 1;
                        updateFormData();
                        $type = $defaultType;
                        renderClient();
                    }
                }
            },
            error: function ($error) {
                // notificationMsg($error, error);
            }
        });
    };

    // rendering grid
    if ($type.indexOf('render') !== -1) {
        callGridRender();
    } else if ($type.indexOf('delete') !== -1) {
        destroy();
    } else if($type.indexOf('addRecord') !== -1) {
        addRecord();
    }

    var functionList = {};
    functionList["sorter"] = sorter;
    functionList['uploadImage'] = uploadImage;
    if ($type in functionList) {
        functionList[$type]();
    }

}