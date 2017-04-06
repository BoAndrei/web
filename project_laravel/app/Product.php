<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Product extends Model 
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'image'];

    public static function createOrEdit($request, $imageName, $id = NULL)
    {
        Product::updateOrCreate(['id' => $id], [
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'image'       => $imageName
        ]);
    }

    public static function uploadImage($request, &$imageName)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            Input::file('image')->move('images', $imageName);
        }
    }

}
