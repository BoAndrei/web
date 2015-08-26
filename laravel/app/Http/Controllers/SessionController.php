<?php 

namespace App\Http\Controllers;
use Auth;
use Input;
use Hash;
use Redirect;
use Session;
use Illuminate\Contracts\Auth\Guard;
use Validator;
use App\Register;
use DB;
use Response;


class SessionController extends Controller {

	public function register(){
		return view('register');
	}

	public function login(){

		if (!Auth::guest()) 
		{
			return Redirect::to('/admin');
		}
		return view('login');
	}

	public function StoreRegister()
{
	$messages = [
		'unique' => 'Acest :attribute deja exista',
		'min' => 'Câmpul :attribute trebuie sa conţina cel puţin :min caractere',
		'required' => 'Campul :attribute trebuie completat',
		'email' => 'Campul :attribute trebuie sa fie valid'
	];

	$validator = Validator::make(Input::all(),Register::$rules,$messages);
	if($validator->fails())
	{
		return Redirect::back()->withInput()->withErrors($validator);
	}
	
    Register::saveFormData(Input::except(array('_token')));
    return Redirect::to('/');
}

	public function StoreLogin()
	{
		 
      $lol = DB::table('users')->where('username','=',Input::get('username'))->first();
        if($lol->user_status != 'banned')
		{
 			 if(Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password'))))

			{return Response::json(['success' => 'request succeeded'], 200);}
				else return Response::json(['status' => 'cacat'], 404);
		}

		else return Response::json(['status' => 'banned'], 403);
 
	}

	public function destroy()
	{
		 
        Session::flush();
        return Redirect::to('/');
 
	}
}