<?php

/**
 * This is used to format errors
 *
 * @param $data
 *     array:2 [
 * "email" => array:1 [
 * 0 => "The email has already been taken."
 * ]
 * "mobile_number" => array:1 [
 * 0 => "The mobile number has already been taken."
 * ]
 * ]
 * @return array
 *
 * array:2 [
 * 0 => "The email has already been taken."
 * 1 => "The mobile number has already been taken."
 * ]
 */
function formatErrors($data)
{
    $errors = [];
    if (!empty($data)) {
        foreach ($data as $row) {
            if ($row) {
                foreach ($row as $value) {
                    $errors[] = $value;
                }
            }
        }
    }

    return $errors;
}
