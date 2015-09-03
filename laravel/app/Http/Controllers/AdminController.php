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




class AdminController extends Controller {
    
	public function TotiUserii(){
		$Users = DB::table('users')->get();
		//die(var_dump($Users));
		return view('TotiUserii')->with('Users',$Users);
	}

	public function introducerecategorii()
	{
		return view('IntroducereCategorii');
	}

	public function EditCategorii()
	{
 $slug = Str::slug(Input::get('DenumireC'));
   
   
		DB::table('categories')->insert(array( 'denumire'=>Input::get('DenumireC'), 'categ_urlslug'=>$slug) );
		return Redirect::to('admin/introducerecategorii');
	}
private function getEventSlug($title)
{
    $slug = Str::slug($title);
    $slugCount = count( $this->event->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
 
    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
}

    }
