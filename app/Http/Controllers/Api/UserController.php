<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasssword;
use App\Mail\ForgetPasswordMail;
use App\Models\Customer;
use App\Models\importExcel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use phpDocumentor\Reflection\Types\True_;
use phpseclib3\File\ASN1\Maps\RelativeDistinguishedName;
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
        $search_user = User::where('id', $id)->first();
        if ($search_user) {
            unset($search_user->confirm_password);
            $destinationPath = asset("taylorlogo");
            $search_user->logo = $destinationPath . '/' . $search_user->logo;
            $this->message = "Data Founded";
        } else {
            $this->message = "Data Not Founded";
        }
        $this->success = true;
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $search_user]);
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
        } else {

            if ($request->input('password') == $request->input('confirm_password')) {
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
                            /**Laravel Passport**/
                $user = User::find($data->id);
                $token = $user->createToken('Taylor')->accessToken;
                $user->token = $token;

                unset($user->confirm_password);
                unset($user->logo);
                $this->success = true;
                $this->message = 'Saved successfully';
            } else {
                $this->success = false;
                $this->message = 'Password not matched';
                $user = [];
            }
        }


        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show = User::get()->toArray();
        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $show]);
    }

    public function getUserName()
    {
        $name = User::select('name', 'image')->where('id', loginId())->first();

        $this->success = true;
        return response()->json(['success' => $this->success, 'data' => $name]);
    }

    public function getUserData()
    {
        $name['user'] = User::select('name', 'address', 'image')->where('id', loginId())->first()->toArray();
        $name['count'] = Customer::where('user_id', loginId())->count();
        $name['price'] = Customer::where('user_id', loginId())->sum('total_price');
        $name['suit'] = Customer::where('user_id', loginId())->sum('suit_quantity');

        $this->success = true;
        return response()->json(['success' => $this->success, 'data' => $name]);
    }

    public function setUserImage(Request $request)
    {

        $profileImage = null;
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
        $data = $request->all();

        unset($data['_token'], $data['image']);
        $user = User::find(loginId());
        $data['image'] = !empty($profileImage) ? $profileImage : $user->image;
        if (!empty($request->input('old_password'))) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                if ($request->input('new_password') == $request->input('confirm_password')) {
                    $data['password'] = Hash::make($request->input('new_password'));
                } else {
                    $this->message = 'new password and confirm password does not match!';
                }
            } else {
                $this->message = 'old password does not match!';
            }
        }
        unset($data['old_password'], $data['confirm_password'], $data['new_password']);
        User::where('id', loginId())->update($data);
        $obj = User::find(loginId());

        $this->success = true;
        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $obj]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->input('id');
        $product = User::find($id);

        if ($product) {
            $product->first_name = $request->input('first_name');
            $product->last_name = $request->input('last_name');
            $product->shop_name = $request->input('shop_name');
            $product->address = $request->input('address');
            $product->contact = $request->input('contact');
            $product->save();
            $this->message = 'Edit Successfully';
        } else {
            $this->message = 'Edit not';
        }


        $this->success = true;

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->success = true;
            $this->message = "Delete Successfully";
        } else {
            $this->success = false;
            $this->message = "Not Founded";
        }


        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }


    public function logo(Request $request)
    {

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
        $this->message = "Save Logo Successfully";

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    public function showUser()
    {
        return view('taylor.taylor-dashboard');
    }

    public function saveUser(Request $request)
    {

        unset($request['_token']);
        $obj = $request->all();

        $obj['created_at'] = Carbon::now();
        $obj['updated_at'] = Carbon::now();
        User::insert($obj);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message,]);
    }

    public function loginUser(Request $request)
    {

        $contact = $request->input('contact');
        $password = $request->input('password');
        $obj = User::where(['contact' => $contact, 'password' => $password,])->first();

        if ($obj) {
            $this->success = true;
            $this->message = 'Login successfully';
            return response()->json(['success' => $this->success, 'message' => $this->message,]);
        } else {
            return redirect()->back();
        }
    }

    public function userProfile()
    {
        $data = User::find(loginId());
        return view('taylor.user-profile', compact('data'));
    }
    public function userLanguage(){
        return view('taylor.language');
    }

    public function forgotPassword()
    {
        return view('auth.passwords.email');
    }

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        $this->message = "We can't find a user with that email address.";
        if (!empty($user)) {
            $pin = rand(1000, 9999);
            $user->otp = $pin;
            $user->save();
            Mail::to($user->email)->send(new ForgetPasssword($pin));
            $this->success = true;
            $this->message = 'Mail Send successfully';
        }

        return response()->json(['success' => $this->success, 'message' => $this->message,]);
    }

    public function sendOtp(Request $request)
    {

        $data = User::find(loginId());
        if ($data->otp == $request->input('otp')) {

            $this->success = true;
            $this->message = 'Mail Send successfully';
        } else {
            $this->success = false;
            $this->message = 'OTP not match';
        }
        return response()->json(['success' => $this->success, 'message' => $this->message,]);
    }

    public function changePassword()
    {
        return view('reset-password');
    }

    public function savePassword(Request $request)
    {

        $password = User::find(loginId());
        if ($request->input('new_password') == $request->input('confirm_password')) {

            $password->password = Hash::make($request->input('new_password'));
            $password->save();
            $this->success = true;
            $this->message = 'Password Save successfully';
            return response()->json(['success' => $this->success, 'message' => $this->message,]);
        }
    }

    public function sendLanguage(Request $request){

        $lang = $request->input('lang');
        User::where('id', loginId())->update(['language' => $lang]);
        return response()->json(['message' => 'Language Changed']);
    }

    public function getLanguage(){

        $data = User::select('language')->where('id', loginId())->first();
        $this->success = true;

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $data]);
    }
                 /*
                  * Import Excel file
                  */
    public function importExcel(Request $request)
    {

        ini_set('max_execution_time', '0');

        $rows = Excel::toArray(new importExcel(), $request->file('excel'));

        $arr = [];

        foreach ($rows as $index=>$data){
            foreach ($data as $k=>$item){
                if ($k == 0){
                    unset($item);
                }else{
                $arr[$k]['experience'] = $item[0];
                $arr[$k]['phase'] = $item[1];
                $arr[$k]['body_part'] = $item[2];
                $arr[$k]['plan_section'] = $item[3];
                $arr[$k]['total_row'] = $item[4];
                $arr[$k]['set_type'] = $item[5];
                $arr[$k]['set_row'] = $item[6];
                $arr[$k]['target_muscle'] = $item[7];
                $arr[$k]['training_form'] = $item[8];
                $arr[$k]['training_type'] = $item[9];
                $arr[$k]['equipment'] = $item[10];
                $arr[$k]['muscle_equip_exercise'] = $item[11];
                $arr[$k]['age_group'] = $item[12];
                $arr[$k]['load'] = $item[13];
                $arr[$k]['exercise_code'] = $item[14];
                $arr[$k]['exercise'] = $item[15];
                $arr[$k]['set_w_c'] = $item[16];
                $arr[$k]['rep_w_c'] = $item[17];
                $arr[$k]['duration_w_c'] = $item[18];
                $arr[$k]['note_w_c'] = $item[19];
                $arr[$k]['cardio_form_c'] = $item[20];
                $arr[$k]['work_rest_c'] = $item[21];
                $arr[$k]['rep_c'] = $item[22];
                $arr[$k]['duration_c'] = $item[23];
                }
            }
        }




        foreach (array_chunk($arr,500)  as $row) {

            importExcel::insert($row);
        }

        $this->success = true;
        $this->message = 'Import Excel Succcessfully';
        return response()->json(['success' => $this->success, 'message' => $this->message,]);

    }

    /**
     * @param $id
     * @return mixed
     */
    /**
     * For PDF file
     */
    public function customerInvoice($id){

        $data = [];
        $obj = Customer::find($id);
        $obj->remaining_price = $obj->total_price - $obj->add_price;
        if (!empty($obj)) {
            $data['excel'] = $obj;
        }

        $pdf = PDF::loadView('taylor.pdf', $data);
        return $pdf->download($obj->first_name.'pdf');

    }
}
