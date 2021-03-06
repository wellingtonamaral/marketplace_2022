<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    private $product;
    public function __construct(Product $product)

    {
        $this->product = $product;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $products = $this->product->limit(8)->orderBy('id','DESC')->get();

        return view('welcome', compact('products'));
    }
    public function single($slug){
       $product =  $this->product->whereSlug($slug)->first();

       return view('Single',compact('product'));
    }
}
