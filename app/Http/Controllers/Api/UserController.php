<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $search_user = User::where('id',$id)
            ->first();
        if($search_user)
        {
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
        $data = new User();
        $data->first_name = $request->input('first_name');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->last_name = $request->input('last_name');
        $data->shop_name = $request->input('shop_name');
        $data->address = $request->input('address');
        $data->contact = $request->input('contact');
        $data->save();

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
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
        User::where('id', $id)->delete();

        $this->success = true;
        $this->message ="Delete Successfully";

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }





}
