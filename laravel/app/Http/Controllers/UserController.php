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

		public function RecuperareParola()
		{
			return view('RecuperareParola');
		}



	}