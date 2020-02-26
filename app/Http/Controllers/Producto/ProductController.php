<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Mark;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::select('products.id', 'products.name', 'products.price', 'marks.name as mark')
            ->join('marks','marks.id','=','products.marks_id')->get();
        return view('Product/index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::lists('name', 'id')->prepend('Seleccioname la Marca');
        return view('Product.create')->with('marks', $marks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return  redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::FindOrFail($id);
        return view('product.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marks = Mark::lists('name', 'id')->prepend('Seleccioname la Marca');
        $products = Product::FindOrFail($id);

        return view('product.edit', array('products' => $products, 'marks' => $marks));
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
        $products  = Product::FindOrFail($id);
        $input = $request->all();
        $products->fill($input)->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $products = Product::FindOrFail($id); 
       $products->delete();
       return redirect()->route('product.index');
    }
}
