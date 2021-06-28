<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(23);
        $fileimg = '';
        if ($request->hasFile('file')) {
            $request->validate(
                [
                    'image' => 'mime:jpg,png,jpag,svg'
                ]
            );
            $file = $request->input('file');
            $img = $request->input('file');
            $fileimg = $request->file->hashName();
            $image = $request->file('file');
            $destinationPath = public_path('productimage/');
            $image->move($destinationPath, $fileimg);
        }
        $obj = new Product();
//        dd($obj);
        $obj->product_name = $request->input('product_name');
        $obj->product_price = $request->input('product_price');
        $obj->product_brand = $request->input('product_brand');
        $obj->product_image = $fileimg;
        $obj->save();

        return view ('products.index');
    }
    public function getData(Request $request)
    {
        $this->data = [];
        $this->params = [
            'perPage' => 10,
            'page' => $request->input('page'),
            'search' => $request->input('search'),
            'sortColumn' => $request->input('sortColumn'),
            'sortType' => $request->input('sortType'),
            'dropDownFilters' => $request->input('dropDownFilters'),
        ];
        $this->data = Product::getProductData($this->params);

        return response()->json($this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(44);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $url = asset('productimage/');
         $data  = Product::select( DB::raw("CONCAT('$url', '/' , product_image) as image"),'id','product_name','product_price','product_brand')->where('id',$id)->first();
         return view ('products.edit' , compact('data'));
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
        $fileimg = '';
        if ($request->hasFile('file')) {
            $request->validate(
                [
                    'image' => 'mime:jpg,png,jpag,svg'
                ]
            );
            $file = $request->input('file');
            $img = $request->input('file');
            $fileimg = $request->file->hashName();
            $image = $request->file('file');
            $destinationPath = public_path('productimage/');
            $image->move($destinationPath, $fileimg);
        }
        $data  = Product::where('id',$id)->first();
        $fileimg =  (empty($fileimg) ? $data->product_image : $fileimg);
            $data->update(['product_name'=> $request->input('product_name'),
                'product_price'=>$request->input('product_price'),
                'product_brand'=>$request->input('product_brand'),
                'product_image'=>$fileimg]);

            return view('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product =Product::find($id);
         if(!empty($product->product_image)){
             $path = public_path('productimage/'). '/'. $product->product_image;
             if(file_exists($path)){
                 unlink($path);
             }
         }
         $product->delete();

        return response()->json(['success' =>'Product deleted successfully']);
    }
}
