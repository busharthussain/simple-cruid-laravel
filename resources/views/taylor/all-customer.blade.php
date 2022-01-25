<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<table>
    <thead>
    {{--<th>Id</th>--}}
    <th>Customer Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Length</th>
    <th>Shoulder</th>
    <th>Neck</th>
    <th>Chest</th>
    <th>Waist</th>
    <th>Hip</th>
    <th>Gheera Gool</th>
    <th>Gheera Choras</th>
    <th>Arm</th>
    <th>Moda</th>
    <th>Kaff</th>
    <th>Kaff Width</th>
    <th>Arm Gool</th>
    <th>Arm Moori</th>
    <th>Collar</th>
    <th>Bean</th>
    <th>Shalwar Length</th>
    <th>Shalwar Gheera</th>
    <th>Shalwar Paincha</th>
    <th>Pocket Front</th>
    <th>Pocket Side</th>
    <th>Pocket Shalwar</th>
    <th>Pent Length</th>
    <th>Pent Waist</th>
    <th>Pent Hip</th>
    <th>Pent Paincha</th>
    <th>Single Salai</th>
    <th>Double Salai</th>
    <th>Triple Salai</th>
    <th>Design</th>
    <th>Book No</th>
    <th>Design No</th>
    <th>Note</th>
    <th>Price</th>
    <th>Action</th>
    </thead>
    <tbody id="customer_data">

    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $showCustomer = '{{URL::route('customer.show')}}';
        $token = "{{ csrf_token() }}";
    $(document).ready(function () {


    function getCustomers() {
        $.ajax({
            url: $showCustomer,
            type: 'GET',
            data: {},
            success: function (response) {
                if (response.success == true) {
                    $('#customer_data').html('');
                    $.each(response.data, function (i, v) {
                        var tabletData = '';
                        $.each(v, function (ii, vv) {
                            if (ii == 'id') {
                                tabletData += '<td xmlns="http://www.w3.org/1999/html"><button class="delete-customer" id="' + vv + '">Delete</button><br><br><br><button class="edit-customer" id="' + vv + '">Edit</button></td>'
                            } else {
                                tabletData += '<td>' + vv + '</td>'
                            }
                        })

                        var html = '<tr>' + tabletData + '</tr>';
                        $('#customer_data').append(html);
                    });
                }
            }
        });
    }
</script>