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
use Cookie;
use App;



class SessionController extends Controller {

	public function register(){
		return view('register');
	}

	public function admin(){

		if (Auth::user() && Auth::user()->user_type == 'admin') 
		{
			return view('AdminPage');
		} else return Redirect::to('/');
		
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
		
  
		 $remember = (Input::has('remember')) ? true : false;
		 $date = array('username'=>Input::get('username'), 'password'=>Input::get('password') );
      $lol = DB::table('users')->where('username','=',Input::get('username'))->first();
        if($lol->user_type != 'banned')
		{
 			 if(Auth::attempt($date,$remember))

			{

				return Response::json(['success' => 'request succeeded'], 200);
			}
			
			else 
				return Response::json(['status' => 'satat'], 404);


		}

		else return Response::json(['status' => 'banned'], 403);
 
	}

	public function destroy()
	{
		   DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'0')); 
 //if ((time() - Session::activity()) > (Config::get('session.lifetime') * 60))
//{
    //DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'0')); 

//}

		   
DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('remember_token'=>'')); 


      $ckname=Auth::getRecallerName(); //Get the name of the cookie, where remember me expiration time is stored
      $ckval=Cookie::get($ckname); //Get the value of the cookie
       //change the expiration time
  

        Session::flush();
        return Redirect::to('/')->withCookie(Cookie::make($ckname,$ckval,-10080));
     
 
	}
}