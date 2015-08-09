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

			$user_id = Auth::user()->user_id;
			$destinatar_username = Input::get('catre');
			$destinatar_id = DB::table('users')->where('username',$destinatar_username)->select('user_id')->first();
			$data = date("Y-m-d H:i:s", strtotime('+3 hours'));
			
			if($destinatar_username != Auth::user()->username  && Input::get('subiect') != '')
			{	
				DB::table('mesaje')->insert(array('expeditor_id' => $user_id, 'subiect' => Input::get('subiect'), 'mesaj' => Input::get('mesaj'), 'destinatar_id' => $destinatar_id->user_id, 'data_mesajului' => $data));
				return Response::json(['success' => 'request succeeded'], 200);
				Redirect::to('/');
			}					
		}

		public function TabelMesaje() 
		{
			$mesaje = Mesaje::all();
			die(var_dump($mesaje));
			//DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->get();
			return view('Mesaje')->with('');
		}
}