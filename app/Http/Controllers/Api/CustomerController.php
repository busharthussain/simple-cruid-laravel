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
    public function viewCustomer()
    {
        $obj = Customer::all();
        return view('taylor.taylor-customer', compact('obj'));
    }

    public function createCustomer(Request $request)
    {

        unset($request['_token']);
        $obj = $request->all();

        $obj['created_at'] = Carbon::now();
        $obj['updated_at'] = Carbon::now();
        Customer::insert($obj);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $obj]);

    }

    public function deleteCustomer(Request $request)
    {
        Customer::where('id', $request->input('id'))->delete();

        $this->success = true;
        $this->message = 'Delete successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    public function editCustomer($id)
    {
        $obj = Customer::where('id', $id)->first();
        return view('taylor.edit-customer', compact('obj'));

    }
    public function getCustomers(){
        $obj = Customer::select('customer_id','first_name','last_name','contact','address','id')->get()->toArray();
//




//        dd($obj);

        return response()->json(['success' => true, 'message' => '','data'=>$obj]);

    }
    public function updateCustomer(Request $request){

        unset($request['_token']);
        $data = $request->all();
        Customer::where('id', $request->input('id'))->update($data);

        $this->success = true;
        $this->message = 'Data Updated successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

}
