<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customerrecord;
use Illuminate\Http\Request;

class CustomerrecordController extends Controller
{
    public function addRecord(Request $request){

        $obj = new Customerrecord();
        $obj->user_id = $request->input('user_id');
        $obj->customer_id = $request->input('customer_id');
        $obj->quantity = $request->input('quantity');
        $obj->total_price = $request->input('total_price');
        $obj->save();

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
}
