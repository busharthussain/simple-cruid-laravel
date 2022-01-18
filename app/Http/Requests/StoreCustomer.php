<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|Integer',
            'first_name'=>'required',
            'last_name'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'length'=>'required|Integer',
            'shoulder'=>'required|Integer',
            'neck'=>'required|Integer',
            'chest'=>'required|Integer',
            'waist'=>'required|Integer',
            'hip'=>'required|Integer',
            'arm'=>'required|Integer',
            'moda'=>'required|Integer',
            'kaff'=>'required|Integer',
            'kaff_width'=>'required|Integer',
            'arm_gool'=>'required|Integer',
            'arm_moori'=>'required|Integer',
            'collar'=>'required|Integer',
            'bean'=>'required|Integer',
            'shalwar_length'=>'required|Integer',
            'shalwar_gheera'=>'required|Integer',
            'shalwar_paincha'=>'required|Integer',
            'pent_length'=>'required|Integer',
            'pent_waist'=>'required|Integer',
            'pent_hip'=>'required|Integer',
            'pent_paincha'=>'required|Integer',
            'price'=>'required|Integer'
        ];
    }
}
