<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderCredentialsRequest;


class CartProductsController extends Controller
{
    public function productAddToCart($id)
    {
        Session::push('cart', $id);
        return Redirect::to('/');
    }

    public function productRemoveFromCart($id)
    {
        $cartProducts = Session::get('cart');

        $index = array_search($id, $cartProducts);

        if ($index !== false) {
            unset($cartProducts[$index]);
            Session::put('cart', $cartProducts);
        }

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

        foreach ($products as $product) {
            if (in_array($product->id, Session::get('cart') ? Session::get('cart') : array())) {
                $cartProducts[] = $product;
            }
        }

        if (isset($cartProducts)) {
            $cartProducts = (object)$cartProducts;
        }


        return view('orderpage', compact('cartProducts'));
    }

    public function postProductOrder(Request $request, OrderCredentialsRequest $request)
    {
        Session::put('order', (object) [
            'buyerName' => $request->input('name'),
            'buyerStreetInfo' => $request->input('street'),
            'buyerPhonenumber' => $request->input('pnumber'),
        ]);

        return Redirect::to('/product/sendmail');

    }

    public function sendMail()
    {
        $emails = ['bocsan.andrei@gmail.com'];

        Mail::send('emailmessage', [], function($message) use ($emails) {
            $message->to($emails)->subject('This is test e-mail');
        });
        Session::flush('cart');
        return Redirect::to('/');
    }
}
