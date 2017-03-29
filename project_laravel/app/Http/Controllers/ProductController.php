<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function sanitize($data) 
    {
        $data = trim($data);
        $data = strip_tags($data);
        return $data;
    }
               
    private $rulesAddProduct = array(
        'productName' => 'required|max:255',
        'productDescription' => 'required',
        'productPrice' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg'
    );
    private $rulesEditProduct = array(
        'productName' => 'required|max:255',
        'productDescription' => 'required',
        'productPrice' => 'required|integer',
    );
    private $rulesOrder = array(
        'name' => 'required|max:255',
        'pnumber' => 'required|integer',
        'street' => 'required'
    );
             
    public function getProductAdd()
    {
        return view('EditProducts')->with('product','');
    }
        
    public function postProductAdd(Request $request)
    {
        $product = new Product;
            
        $name = $this->sanitize($request->input('productName'));
        $description = $this->sanitize($request->input('productDescription'));
        $price = $this->sanitize($request->input('productPrice'));
            
        $validator = Validator::make($request->all(), $this->rulesAddProduct);
            
        if ($validator->passes()) {  
            
            if (Input::file()) {   
                $image = Input::file('image');
                   
                $imageName = time() . $image->getClientOriginalName();
                Input::file('image')->move('images', $imageName);
                    
                $product->product_image = $imageName;
            }
                
            $product->product_name = $name;
            $product->product_description = $description;
            $product->product_price = $price;
            $product->save();
                
            return Redirect::to('/');
                
        } else {
            $messages = $validator->messages();
            $request->flash();
            return view('EditProducts')->withErrors($validator)->with('product','');
        }
    }
        
    public function getProductEdit(Request $request)
    { 
        $product = Product::find(Route::input('product_id'));
        return view('EditProducts')->with('product',$product);
    }
        
    public function postProductEdit(Request $request)
    {
        $products = Product::all();
        $product = Product::find(Route::input('product_id'));
            
        $name = $this->sanitize($request->input('productName'));
        $description = $this->sanitize($request->input('productDescription'));
        $price = $this->sanitize($request->input('productPrice'));
            
        if (Input::file()) {
            $image = Input::file('image');
               
            $imageName = time() . $image->getClientOriginalName();
            Input::file('image')->move('images', $imageName);
                
            $product->product_image = $imageName;
        } 
               
            
           
            
        $validator = Validator::make($request->all(), $this->rulesEditProduct);
            
        if ($validator->passes()) { 
            $product->product_name = $name;
            $product->product_description = $description;
            $product->product_price = $price;
            $product->save();
                
            return Redirect::to('/');
        } else {
            $request->flash();
            return view('EditProducts')->withErrors($validator)->with('product','');
        }   
    }
        
    public function productDelete()
    {
        $product = Product::find(Route::input('product_id'));
        $product->forceDelete();
        return Redirect::to('/');
    }
        
    public function productAddToCart()
    {
        Session::push('cart', Route::input('product_id'));
        return Redirect::to('/');
    }
        
    public function productRemoveFromCart()
    {
        $cartProducts = Session::get('cart');
              
        foreach ($cartProducts as $key => $cartProduct) {
            if ($cartProduct == Route::input('product_id')) {
                $found = $key;
            }
        }    
        Session::pull('cart');
        unset($cartProducts[$found]);
        Session::put('cart', $cartProducts);
              
        return Redirect::to('/');
    }
        
    public function productResetCart()
    {
        Session::forget('cart');
        return Redirect::to('/');
    }
        
    public function getProductOrder()
    {
        $products = Product::all();
        return view('OrderPage')->with('products',$products);
            
    }
        
    public function postProductOrder(Request $request)
    {
        $products = Product::all();
            
        $validator = Validator::make($request->all(), $this->rulesOrder);
            
        if ($validator->passes()) { 
            Session::put('buyerName', $request->input('name'));
            Session::put('buyerStreetInfo', $request->input('street'));
            Session::put('buyerPhonenumber', $request->input('pnumber'));
               
            return Redirect::to('/product/sendmail');
        } else {
            $messages = $validator->messages();   
            $request->flash();
            return view('OrderPage')->withErrors($validator)->with('products',$products);
        }   
    }
        
    public function sendMail()
    {
        $emails = ['bocsan.andrei@gmail.com'];

        Mail::send('EmailMessage', [], function($message) use ($emails)
        {    
            $message->to($emails)->subject('This is test e-mail');    
        });
        var_dump( Mail:: failures());
        exit;
    }
        
}