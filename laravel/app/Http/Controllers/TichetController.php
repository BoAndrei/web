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
use Illuminate\Support\Str;



class TichetController extends Controller {

			public function tichete() {

				$msj_contact = DB::table('mesaje_contact')->where('mesaj_c_expeditor',Auth::user()->user_id)->get();
				
				return view('Tichete')->with('msj_contact',$msj_contact);	
			}

			public function tichet() {

				$msj_contact = DB::table('mesaje_contact')->where('mesaj_c_id',Request::segment(2))->join('users','user_id','=','mesaj_c_expeditor')->get();
				return view('Tichet')->with('msj_contact',$msj_contact);;
			}
	
}