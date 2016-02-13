<?php 

namespace App\Http\Controllers;
use Auth;
use Input;
use Hash;
use Redirect;
use Session;
use Illuminate\Contracts\Auth\Guard;
use Validator;
use App\Mesaje;
use DB;
use Response;



class MesajeController extends Controller {

		public function TrimiteMesaj()
		{

			$data = date("Y-m-d H:i:s", strtotime('+3 hours'));
			$user_id = Auth::user()->user_id;
			$id = Input::get('ids');
			$deja = DB::table('mesaje')->where('expeditor_id',$user_id)->where('destinatar_id',$id)->first();

			if(!$deja)
			{

					DB::table('mesaje')->insert(array('expeditor_id' => $user_id, 'destinatar_id' => $id, 'data_mesajului' => $data));
					return Response::json(['success' => 'request succeeded'], 200);
			}
				
					
			
								
		}

		public function TabelMesaje() 
		{
			$mesaje = Mesaje::all();
			die(var_dump($mesaje));
			//DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->get();
			return view('Mesaje')->with('');
		}

		public function room() {
			//$mesaje = Mesaje::all();
			if(Auth::check())
			{
				$users = DB::table('users')->where('user_id','!=',Auth::user()->user_id)->get();
				$mesaje = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->orWhere('expeditor_id',Auth::user()->user_id)->join('users','user_id','=','mesaje.expeditor_id')->orderBy('data_mesajului', 'desc')->get();
				return view('Mesaje')->with('mesaje',$mesaje)->with('users',$users);
			
			}
			 else return Redirect::to('/');
		}
}