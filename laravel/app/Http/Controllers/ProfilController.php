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
			//DB::table('users')->insert(array('image' => Input::get('image')));
			return view('SchimbareImagine');
		}

		public function EditImagine()
		{
			if(isset($_FILES["image"])){
$target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {


        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {

        echo "Sorry, file already exists.";
        $uploadOk = 0;
        return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');

    }

    if ($uploadOk == 0) {
      
    echo "Sorry, your file was not uploaded.";
      return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');

    } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
   
    } else {
 return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');

        echo "Sorry, there was an error uploading your file.";
    }
  }

}
			 DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('image' => $target_file));
			
			return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');
		}


		

}