<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class JsController extends Controller
{
    private $params = [];
    private $data = [];
    public function showIndex()
    {
        return view('curd.create');
    }

    public function saveData(Request $request)
    {
       $data = $request->all();
       unset($data['_token']);
        Customer::insert($data);

        $this->success = true;
        $this->message = 'Data Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
    public function showData(Request $request)
    {
        $this->params = [
            'perPage' => 10,
            'page' => $request->input('page'),
            'search' => $request->input('search'),
            'sortColumn' => $request->input('sortColumn'),
            'sortType' => $request->input('sortType'),
        ];
        $this->data = User::getData($this->params);
        dd($this->data);
        return response()->json($this->data);
    }
}
