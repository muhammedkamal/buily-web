<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        return redirect('products')->with('sucess','product added.');
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
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product->user_id==auth()->user()->id){
            return view('Products.edit')->with('product',$product);
        }
        else{
            return view('Products.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->user_id = auth()->user()->id ;
        $product->quantity= $request->input('quantity');
        $product->price= $request->input('price');
        if($request->hasFile('cover')){
            if($product->cover != "noimage.jpeg"){
                Storage::delete('/public/coverimages/'.$product->cover);
            }
            $product->cover = $fileNameToStore;
        }
        $product->update();
        return redirect('Products.index')->with('sucess','product Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(auth()->user()->id != $product->user_id){
            return redirect('products')->with('error','Unauthoraized Page.');
        }
        if($product->cover != "noimage.jpeg"){
            Storage::delete('/public/coverimages/'.$product->cover);
        }
        $product->delete();
        return redirect('products')->with('sucess','product Deleted.');
    }

    /**
     * search the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $products = $request->q ;

        $resaults =  DB::table('products')->where('name','like','%'.$products.'%')->get();
        return view('Products.index')->with('products',$resaults);        
    }
}
