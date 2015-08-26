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
use App\User;
use DB;
use Response;
use App\Mesaje;
use Mail;
use Swift_SmtpTransport;
use Config;
use Request;



class UserController extends Controller {

		public function profile()
		{
			
				DB::table('mesaje')->where('viz_exp','=','1')->where('viz_dest','=','1')->delete();
			
			$mesaje = Mesaje::all();
			return view('Profile')->with('mesaje',$mesaje)->withUsers(User::all());
		}

		public function EditEmail()
		{
			$parola = Auth::user()->password;	
			$NoulEmail = Input::get('NoulEmail');

					 
			if(Hash::check(Input::get('ParolaActuala'),$parola) && count(User::where('email','=',$NoulEmail)->get()) == 0 )
			{

				   	DB::table('users')->where ('user_id',Auth::user()->user_id)->update(array('email' => Input::get('NoulEmail')));
					return Response::json(['success' => 'request succeeded'], 200);
				
			}	 
			else 
			if(!Hash::check(Input::get('ParolaActuala'),$parola))
				{
					return Response::json(['status' => 'found'], 403);
				}

				else if(count(User::where('email','=',$NoulEmail)->get()) != 0)
					{
						return Response::json(['status' => 'found'], 404);
					}
}
 
	


		public function EditParola()
		{
			$parola = Auth::user()->password;

			if(Hash::check(Input::get('ParolaActuala2'),$parola) && Input::get('NouaParola') == Input::get('NouaParola2') && Input::get('NouaParola') != '' && strlen(Input::get('NouaParola')) > 4)
			{
				DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('password' => Hash::make(Input::get('NouaParola'))));
				return Response::json(['success' => 'request succeeded'], 200);
			}

			
			if(!Hash::check(Input::get('ParolaActuala2'),$parola))
				{
					return Response::json(['status' => 'found'], 403);
				}
			else if(Hash::check(Input::get('ParolaActuala2'),$parola))
			{
				return Response::json(['status' => 'parola_buna'], 202);
			}

			 

		}

		public function EditParola2()
		{
		

			if (Input::get('NouaParola') == Input::get('NouaParola2') && Input::get('NouaParola') != '' && strlen(Input::get('NouaParola')) > 4)
			{
				$newPassword = Hash::make(Input::get('NouaParola'));
				

				DB::table('users')->where('email',Request::segment(2))->update(array('password' => $newPassword ));
				
				
				return Redirect::to('/');
			}

			
			

			 

		}


		public function RecuperareParola()
		{
			// dd(Config::get('mail'))
			return view('RecuperareParola');
		}

		public function ParolaNoua()
		{

			$length = 10;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
			echo $randomString;
			
			if(count(DB::table('users')->where('email','=',Input::get('email'))->first()) == 0)
			{
				return Redirect::to('recuperareparola');
			}

				Mail::raw('Parola noua este:'.$randomString, function($message) {
   				 $message->to(Input::get('email'), Input::get('email'))->subject('Parola Noua');
				
				});

				DB::table('users')->where('email','=',Input::get('email'))->update(array('password' => Hash::make($randomString)));
			
			
			return Redirect::to('/');
		}

		public function ParolaNoua2()
		{

			$length = 30;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

			$user = DB::table('users')->where('email','=',Input::get('email'))->first();
			if(count($user) == 0)
			{
				return Redirect::to('recuperareparola');
			}

			$link = '<a href = "localhost/'.$randomString.'">Link</a>';
				
			DB::table('passwordrecovery')->insert(array('hash' => $randomString, 'user_id' => $user->user_id));
				Mail::raw('Pentru a reseta parola acceseaza acest link:http://localhost/'.Input::get('email').'/'.$randomString, function($message) {
   				 $message->to(Input::get('email'), Input::get('email'))->subject('Parola Noua');
				
				});

				//DB::table('users')->where('email','=',Input::get('email'))->update(array('password' => Hash::make($randomString)));
			
			
			return Redirect::to('/');
		}

		public function resetparola() {
			return view('ResetParola');
		}



	}