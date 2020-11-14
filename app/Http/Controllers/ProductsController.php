<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select('SELECT * FROM products');
        return view('Products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);
        // handle file upload 
        if($request->hasFile('cover')){
            //get file name with extenstion
            $fileWithExt = $request->file('cover')->getClientOriginalName();
            // get just the file name
            $fileName = pathinfo($fileWithExt,PATHINFO_FILENAME);
            // get just the extention
            $ext = $request->file('cover')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName .'_' . time() . '.' . $ext;
            //upload image
            $path = $request->file('cover')->storeAs('public/coverimages', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpeg';
        }
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->user_id = auth()->user()->id ;
        $product->cover  = $fileNameToStore;
        $product->quantity= $request->input('quantity');
        $product->price= $request->input('price');
        $product->save();
        return redirect('Products')->with('sucess','product added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('Products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
