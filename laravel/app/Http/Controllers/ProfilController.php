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
use App\User;
use Request;



class ProfilController extends Controller {

		public function setarilecontului()
		{
			return view('SetarileContului');
		}

		public function mesaje()
		{
			$mesaje = Mesaje::all();
			if(Auth::check())
			{
				return view('Mesaje')->with('mesaje',$mesaje)->withUsers(User::all());
			}
			 else return Redirect::to('/');
		}

		public function mesaj ()
		{
			if(Auth::check())
						{
							DB::table('mesaje')->where('mesaj_id',Request::segment(5))->update(array('citit' => '1'  ));

						$mesaj_id = Request::segment(5); $salut = DB::table('mesaje')->where('mesaj_id',$mesaj_id)->first();
			$lol = Auth::user()->user_id;
			if(!$salut)
			{
				return Redirect::to('/');
			 die();
			}
					if( $salut->expeditor_id != $lol && $salut->destinatar_id != $lol){
			return Redirect::to('/');
			 die();}
						$mesaje = Mesaje::all();
						
							return view('Mesaj')->with('mesaje',$mesaje)->withUsers(User::all());
						}

						else return Redirect::to('/');
		}

		
		public function mesajetrimise ()
		{
			if(Auth::check())
			{
				$mesaje = Mesaje::all();
				return view('MesajeTrimise')->with('mesaje',$mesaje)->withUsers(User::all());
			}
			else return Redirect::to('/');
		}

		
		public function stergemesajd()
		{
			if(Auth::check())
			{
				DB::table('mesaje')->where('mesaj_id',Request::segment(5))->update(array('viz_exp' => '1'  ));
			    return Redirect::to('/profil/'.Auth::user()->username.'/mesaje');
			}

		else return Redirect::to('/');
		}

		public function stergemesaje()
		{
			if(Auth::check())
			{
				DB::table('mesaje')->where('mesaj_id',Request::segment(5))->update(array('viz_dest' => '1'  ));
				return Redirect::to('/profil/'.Auth::user()->username.'/mesaje');
			}else return Redirect::to('/');
		}

		public function modificareimagine()
		{
			return view('SchimbareImagine');
		}


		

}