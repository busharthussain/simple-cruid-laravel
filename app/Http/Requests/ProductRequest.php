<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $record = [];
        parse_str($this->data, $record);
        $this->request->add(['name' => $record['name']]);
        $this->request->add(['price' => $record['price']]);
        $this->request->add(['brand' => $record['brand']]);

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'brand' => 'required',
        ];
    }
}
