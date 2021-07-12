<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $success = false;
    private $message = '';
    private $data = [];

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            parse_str($request->input('data'), $this->data);
            Product::Create($this->data);
            $this->success = true;
            $this->message = 'Product Created Successfully';
        } catch (Exception $e) {
            $this->message = $e->getMessage();
        }

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);

        return view('products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        try {
            parse_str($request->input('data'), $this->data);
            $product->update($this->data);
            $this->success = true;
            $this->message = 'Product Created Successfully';
        } catch (Exception $e) {
            $this->message = $e->getMessage();
        }

        return response()->json(['success' => $this->success, 'message' => $this->message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }

        return response()->json(['success' => 'Product deleted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
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
}
