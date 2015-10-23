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
	
	 $user = DB::table('users')->where('username',Input::get('username'))->first();
	 $email = DB::table('users')->where('email',Input::get('email'))->first();

	 if (count($user) == 0 && count($email) == 0)
    	{
    		$data = date("d-m-Y H:i:s", strtotime('+3 hours'));
        	DB::table('users')->insert(array('username'=>Input::get('username'), 'password'=>Hash::make(Input::get('password')),'email'=>Input::get('email'),'date_registered'=>$data));
   			
   			$last_id = DB::table('users')->orderBy('user_id', 'desc')->first();
   			//die(var_dump($last_id->user_id));
   			DB::table('users_data')->insert(array('users_data_id'=>$last_id->user_id));
   			return Response::json(['success' => 'request succeeded'], 200);
   		}
   			if(count($user) != 0 && count($email) != 0)
   				return Response::json(['success' => 'request succeeded'], 406);
   			
   			if (count($user) != 0)
   			 	return Response::json(['success' => 'request succeeded'], 404);
				
   			
   			if (count($email) != 0)
   				return Response::json(['success' => 'request succeeded'], 405);

   			
   
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