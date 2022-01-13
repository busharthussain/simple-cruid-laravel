<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use function Psy\sh;

class CustomerController extends Controller
{
    private $message = '';
    private $success = false;
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Customer::insert([$request->toArray()]);

        $this->success = true;
        $this->message = 'Saved successfully';
        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $show = Customer::select('first_name','contact','id')->where('user_id',$request->input('user_id'));

        if(!empty($request->input('search'))){
            $search = '%'.$request->input('search').'%';
            $show = $show->where('contact','Like',$search)
            ->orWhere('first_name','Like',$search);
        }

//        $show = $show->get()->toArray();
//        $show = array_column($show,'contact');
        $arr = [];
//        foreach ($show as $k=>$row){
//            $arr[] = $row['contact'];
//        }
//        dd($arr);
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
    public function update(Request $request, $id)
    {
        //
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
        Customer::where('id', $id)->delete();

        $this->success = true;
        $this->message ="Delete Successfully";

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }
}
