<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomer;
use App\Models\Customer;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\PostTrait;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Stripe;
class CustomerController extends Controller
{

    use PostTrait;
    public function viewCustomer()
    {
        $obj = Customer::all();


        return view('taylor.taylor-customer', compact('obj'));
    }

    public function saveCustomer(Request $request)
    {

        unset($request['_token']);
        $obj = $request->all();

        $obj['created_at'] = Carbon::now();
        $obj['updated_at'] = Carbon::now();
        $obj['user_id'] = loginId();
        Customer::insert($obj);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $obj]);

    }

    public function deleteCustomer(Request $request){


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
    public function showCustomersView(){
        $obj = Customer::select('customers.id','customers.first_name','customers.last_name','customers.contact','customers.address','u.name')
            ->where('user_id',loginId())->join('users as u', 'u.id','=','customers.user_id')->get()->toArray();

//    $arr = [];
//    foreach ($obj as $i => $r){
//
//        $arr[$i]= $r;
//        $arr[$i]['brand']= 'oppo';
//
//    }
//
//        dd($arr);


//    $this->sendMessage(11);
//     foreach ($obj as $k=>$row){
//
//         $arr[$k] = $row;
//         $arr[$k]['image'] = $row;
//         $arr[$k]['image']['image'] = $row;
//         $arr[$k]['image']['image']['contact'] = '123';
//         dd($arr);
//     }


     $this->message = 'save';
        return view('taylor.all-customer');

        return response()->json(['success' => true, 'message' => $this->message,'data'=>$obj]);

    }

    public function updateCustomer(Request $request){

        unset($request['_token']);
        $data = $request->all();
        Customer::where('id', $request->input('id'))->update($data);

        $this->success = true;
        $this->message = 'Data Updated successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    public function getCustomers(){
        $obj = Customer::select('customers.id','customers.first_name','customers.last_name','customers.contact','customers.address','customers.suit_quantity','customers.total_price','customers.add_price','customers.note','u.name')
            ->where('user_id',loginId())
            ->join('users as u', 'u.id','=','customers.user_id')
            ->get()->toArray();

      $arr = [];

        foreach ($obj as $key=>$row){
            $arr[] = $row;
            $arr[$key]['remaining_price'] = $row['total_price']-$row['add_price'];

        }
        $obj = $arr;
        return response()->json(['success' => true, 'message' => '','data'=>$obj]);

    }

    public function searchCustomer(Request $request)
    {
        $obj = Customer::where('id', $request->input('id'))->where('user_id', loginId())->first();
        return response()->json(['success' => true, 'message' => '','data'=>$obj]);

    }

    public function showPayment(){
        return view('payment');
    }

    public function savePayment(Request $request){

        Stripe\Stripe::setApiKey(getenv('SECRET_KEY'));
//        $stripe = new \Stripe\StripeClient(
//            getenv('SECRET_KEY')
//        );
        $response = \Stripe\Token::create(array(
            'card' => [
                'number' => $request->input('card_number'),
                'exp_month' => $request->input('expiry_month'),
                'exp_year' => $request->input('expiry_year'),
                'cvc' => $request->input('cvc'),
            ],
        ));
        
        if (!empty($response['id'])) {
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'gbp',
                'amount' => 100,
                'description' => 'test',
                'metadata' => ['name' => 'test'],
            ]);

           if ($charge['status'] =='succeeded'){
               $obj = new Payment();
               $obj->charge_id = $charge['id'];
               $obj->user_id = loginId();
               $obj->amount = $charge['amount'];
               $obj->amount_refund = $charge['amount_refunded'];
               $obj->card_id = $charge['payment_method'];
               $obj->brand = $charge['payment_method_details']['card']['brand'];
               $obj->country = $charge['payment_method_details']['card']['country'];
               $obj->cvc = $charge['payment_method_details']['card']['last4'];
               $obj->fingerprint = $charge['source']['fingerprint'];

               $obj->save();
               return response('success', 'Payment Done');
           }
//        $charge = $stripe->charges->create([
//            'amount' => 2000,
//            'currency' => 'gbp',
//            'source' => 'tok_amex', // obtained with Stripe.js
//            'description' => 'My First Test Charge (created for API docs)'
//        ]);
        }

    }


}
