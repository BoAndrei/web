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

        foreach ($products as $product) {
            if (in_array($product->id, Session::get('cart') ? Session::get('cart') : array())) {
                $cartProducts[] = $product;
            } else {
                $tableProducts[] = $product;
            }

        }

        if (isset($cartProducts)) {
            $cartProducts = (object)$cartProducts;
        }
        if(isset($tableProducts)) {
            $tableProducts = (object)$tableProducts;
        }

        return view('homepage', compact(['tableProducts', 'cartProducts']));
    }    
}
