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
        $obj = Customer::select('customer_id','first_name','last_name','contact','address','length','shoulder','neck','chest',
            'waist','hip','gheera_gool','gheera_choras','arm','moda','kaff','kaff_width','arm_gool','arm_moori','collar','bean',
            'shalwar_length','shalwar_gheera','shalwar_paincha','pocket_front','pocket_side','pocket_shalwar','pent_length',
            'pent_waist','pent_hip','pent_paincha','single_salai','double_salai','triple_salai','design','book_no','design_no',
            'note','price','id')->get()->toArray();
//        $obj = $obj->toArray();



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
