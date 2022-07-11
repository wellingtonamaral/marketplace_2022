<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore =  auth()->user()->store;
        $products = $userStore->products()->paginate(10);
        $categories = \App\Models\Category::all(['name']);


        return view('admin.products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$stores = \App\Models\Store::all(['id','name']);
        $categories = \App\Models\Category::all(['id','name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();

        $store = auth()->user()->store;
        //$store = \App\Models\Store::find($data['store']);
       $product = $store->products()->create($data);
       $product->categories()->sync($data['categories']);
       if($request->hasFile('photos')){
        $images = $this->imageUpload($request, 'image');

        $product->photos()->createMany($images);
       }

        flash('Produto cadastrado com Sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = $this->product->findOrFail($product);
        $categories = \App\Models\Category::all(['id','name']);

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->product->find($product);
        $product->update($data);

        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request, 'image');

            $product->photos()->createMany($images);
           }


        flash('Produto Atualizado com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = $this->product->find($product);
        //$product= \App\Models\Product::find($product);
        $product->delete();

        flash("Produto excluido com sucesso")->success();
        return redirect()->route('admin.products.index');

    }
    private function imageUpload(Request $request, $imageColumn)
{
    $images = $request->file('photos');
    $uploadedImages = [];
    foreach($images as $image){
        $uploadedImages[] = [$imageColumn => $image->store('products','public')];
    }
    return $uploadedImages;
}
}
