<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductCredentialsRequest;
use Illuminate\Http\Request;
use Redirect;

class ProductsController extends Controller
{
    public function create()
    {
        return view('products.editproducts');
    }

    public function store(Request $request, ProductCredentialsRequest $request)
    {
        Product::uploadImage($request, $imageName);

        Product::createOrEdit($request, $imageName);

        return Redirect::to('/');
    }

    public function edit(Product $product)
    {
        return view('products.editproducts', compact('product'));
    }

    public function update(Request $request, Product $product, ProductCredentialsRequest $request)
    {
        Product::uploadImage($request, $imageName);

        $imageName = $imageName ? $imageName : $product->image;

        Product::createOrEdit($request, $imageName, $product->id);

        return Redirect::to('/');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::to('/');
    }
}
