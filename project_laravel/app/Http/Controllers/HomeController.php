<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function homePage()
    {
        $products = Product::all(); 
        return view('HomePage')->with('products',$products);
    }
        
      
        
        
    
    
    
    
    
}
