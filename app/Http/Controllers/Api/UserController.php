<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasswordMail;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\True_;
use function PHPSTORM_META\elementType;

class UserController extends Controller
{
    private $message = '';
    private $success = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $search_user = User::where('id',$id)->first();
        if($search_user)
        {
            unset($search_user->confirm_password);
            $destinationPath = asset("taylorlogo");
            $search_user->logo = $destinationPath.'/'.$search_user->logo;
            $this->message ="Data Founded";
        }
        else
        {
            $this->message ="Data Not Founded";
        }
        $this->success = true;
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data'=> $search_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = [];
        $imageData = $request->all();
        $validations = [
            'first_name' => 'required',
            'last_name' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'contact' => 'unique:users,contact,'

        ];
        $validator = \Validator::make($imageData, $validations);
        if ($validator->fails()) {
            $this->message = formatErrors($validator->errors()->toArray());
        }
        else{

            if ($request->input('password') == $request->input('confirm_password')){
                $data = new User();
                $data->first_name = $request->input('first_name');
                $data->last_name = $request->input('last_name');
                $data->shop_name = $request->input('shop_name');
                $data->address = $request->input('address');
                $data->contact = $request->input('contact');
                $data->password = Hash::make($request->input('password'));
                $data->confirm_password = Hash::make($request->input('confirm_password'));
                $data->logo = $request->input('logo');
                $data->save();
                $user = User::find($data->id);
                $token = $user->createToken('Taylor')->accessToken;
                $user->token = $token;
                unset($user->confirm_password);
                unset($user->logo);
                $this->success = true;
                $this->message = 'Saved successfully';
            }
            else{
                $this->success = false;
                $this->message = 'Password not matched';
                $user = [];
            }
        }




        return response()->json(['success' => $this->success, 'message' => $this->message, 'data'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show = User::get()->toArray();
        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data'=> $show]);
    }
    public function getUserName(){
        $name = User::select('name','image')->where('id',loginId())->first();

        $this->success = true;
        return response()->json(['success' => $this->success, 'data'=> $name]);
    }
    public function setUserName(){
        $name = User::select('name','address','image')->where('id',loginId())->first();
        $name->count = Customer::where('user_id',loginId())->count();

        $this->success = true;
        return response()->json(['success' => $this->success, 'data'=> $name]);
    }
    public function setUserImage(Request $request){

        $profileImage = null;
//        dd($request);
        if ($request->hasFile('image')) {
            $request->validate([
                'file' => 'mimes:jpeg,bmp,png'
            ]);
            $file = $request->input('image');
            $profileImage = $request->image->hashName();

            $image = $request->file('image');
            $destinationPath = public_path('userimages');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $profileImage);
        }
          $obj = User::find(loginId());
        $obj->image = $profileImage;
        $obj->save();
        $this->success = true;
        return response()->json(['success' => $this->success, 'data'=> $obj]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->input('id');
        $product = User::find($id);

        if($product)
        {
            $product->first_name = $request->input('first_name');
                $product->last_name = $request->input('last_name');
                $product->shop_name = $request->input('shop_name');
                $product->address =$request->input('address');
                $product->contact = $request->input('contact');
          $product->save();
            $this->message = 'Edit Successfully';
        }
        else
        {
            $this->message = 'Edit not';
        }


        $this->success = true;

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data'=> $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        if ($user){
            $user->delete();
            $this->success = true;
            $this->message ="Delete Successfully";
        }
        else{
            $this->success = false;
            $this->message ="Not Founded";
        }


        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }


    public function logo(Request $request){

        $destinationPath = public_path("taylorlogo");
        $data = base64_decode(preg_replace('/^data:image\/\w+;base64,/i', '', $request->input('image')));
        $logo = time() . uniqid(rand()) . '.png';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        $tempFile = $destinationPath . '/' . $logo;
        file_put_contents($tempFile, $data);
        $user = User::find($request->input('user_id'));
        $user->logo = $logo;
        $user->save();

        $this->success = true;
        $this->message ="Save Logo Successfully";

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    public function showUser(){
        return view('taylor.taylor-dashboard');
    }

    public function saveUser(Request $request){

        unset($request['_token']);
        $obj = $request->all();

        $obj['created_at'] = Carbon::now();
        $obj['updated_at'] = Carbon::now();
        User::insert($obj);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message,]);
    }

    public function loginUser(Request $request){

        $contact = $request->input('contact');
        $password = $request->input('password');
        $obj = User::where(['contact'=>$contact, 'password'=>$password,])->first();

        if($obj){
            $this->success = true;
            $this->message = 'Login successfully';
            return response()->json(['success' => $this->success, 'message' => $this->message,]);
        }
        else{
            return redirect()->back();
        }
    }

    public function userProfile(){
        $data = User::find(loginId());
        return view('taylor.user-profile', compact('data'));
    }
}
