<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomer;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function viewCustomer(){

        return view('taylor.taylor-customer');
    }
    public function createCustomer(Request $request){

        unset($request['_token']);
        $obj = $request->all();

        $obj['created_at'] = Carbon::now();
        $obj['updated_at'] = Carbon::now();
        Customer::insert($obj);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $obj]);
    }
    public function deleteCustomer(Request $request){

        $id = $request->input('customer_id');
        Customer::where('customer_id', $id)->delete();


        $this->success = true;
        $this->message = 'Delete successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
    public function editCustomer(Request $request){

        $id = $request->input('customer_id');
        $data = Customer::where('customer_id', $id)->first();
//        dd($request->all());
        if (!empty($data)) {
            $data->update($request->all());
        }
        $this->success = true;
        $this->message = 'Edit successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
}
