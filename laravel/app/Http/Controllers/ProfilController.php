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
use Imagick;
use ImagickPixel;





class ProfilController extends Controller {

		public function setarilecontului()
		{
			return view('SetarileContului');
		}

		public function mesaje()
		{
			//$mesaje = Mesaje::all();
			if(Auth::check())
			{
				$users = DB::table('users')->where('user_id','!=',Auth::user()->user_id)->get();
				$mesaje = DB::table('mesaje')->where('expeditor_id',Auth::user()->user_id)->orWhere('destinatar_id',Auth::user()->user_id)->join('users','user_id','=','mesaje.expeditor_id')->orderBy('data_mesajului', 'desc')->get();
				return view('Mesaje')->with('mesaje',$mesaje)->with('users',$users);
			
			}
			 else return Redirect::to('/');
		}

		public function mesaj ()
		{


			if(Auth::check())
						{
							DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('mesaj_id',Input::get('id'))->update(array('citit' => '1'  ));

						$mesaj_id = Input::get('id'); 
						$salut = DB::table('mesaje')->where('mesaj_id',$mesaj_id)->first();
			$lol = Auth::user()->user_id;
			if(!$salut)
			{
				return Redirect::to('/');
			 die();
			}
					if( $salut->expeditor_id != $lol && $salut->destinatar_id != $lol){
			return Redirect::to('/');
			 die();}


			
			
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
				$id = Input::get('check');
				foreach ($id as $ids ) 
				{
        			 DB::table('mesaje')->where('mesaj_id',$ids)->update(array('viz_dest' => '1', 'citit'=>'1'  ));
	
    			}

				  

			    return Redirect::to('/profil/'.Auth::user()->username.'/mesaje');
			}

		else return Redirect::to('/');
		}

		public function stergemesaje()
		{
			if(Auth::check())
			{
				DB::table('mesaje')->where('mesaj_id',Request::segment(5))->update(array('viz_exp' => '1', 'citit'=>'1'  ));
				return Redirect::to('/profil/'.Auth::user()->username.'/mesaje');
			}else return Redirect::to('/');
		}

		public function TrimiteMesaj()
		{
			if(!Auth::check())
			{
				return Redirect::to('/');
			}

			$users = DB::table('users')->where('user_id','!=',Auth::user()->user_id)->get();
			return view('TrimiteMesaj')->with('users',$users);
		}



		public function modificareimagine()
		{
			return view('SchimbareImagine');
		}

		



		public function EditImagine()
		{$ok = 0;
			if(isset($_FILES["image"])){
				//die(var_dump());
				//die(var_dump(call_user_func_array('mb_convert_encoding', array(basename($_FILES["image"]["name"]),'ISO-8859-2','UTF-8')) ));
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
    if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir . mb_convert_encoding(basename($_FILES["image"]["name"]),'ISO-8859-2','UTF-8'))) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
   
    } else {
 return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');

        echo "Sorry, there was an error uploading your file.";
    }
  }

}$ok = 0;
			if( DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('image' => $target_file)))
			{$ok=1;}
			
if($ok == 1)
{
function convertImage($source,$dst,$width,$height,$quality)
{
	$imageSize = getimagesize($source);
 if ($imageSize['mime'] == 'image/jpeg') 
    {
        $imageRessource = imagecreatefromjpeg($source);
    }
    else if ($imageSize['mime'] == 'image/gif') 
    {
        $imageRessource = imagecreatefromgif($source);
    }
    else if($imageSize['mime'] == 'image/png') 
    
        $imageRessource = imagecreatefrompng($source);
    
	//$imageRessource = imagecreatefromjpeg($source);

	$imageFinal = imagecreatetruecolor($width, $height);

	$final = imagecopyresampled($imageFinal, $imageRessource, 0, 0, 0, 0, $width, $height, $imageSize[0], $imageSize[1]);
//header('Content-Type: image/png');
	imagejpeg($imageFinal,$dst,$quality);
}
convertImage('images/'.mb_convert_encoding(basename($_FILES["image"]["name"]),'ISO-8859-2','UTF-8'),'images/'.mb_convert_encoding(basename($_FILES["image"]["name"]),'ISO-8859-2','UTF-8').'','300','300', 100);
}

			return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/modificareimagine');
	

		}

		public function datepersonale()
		{

			$conf = DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->first();

			return view('DatePersonale')->with('conf',$conf);
		}

		public function EditDate()
		{
			$data_user_id = DB::table('users_data')->first();
			if($data_user_id->users_data_id == Auth::user()->user_id)
			
			{
				DB::table('users_data')->where('users_data_id',Auth::user()->user_id)->update( array('nume'=>Input::get('Nume'), 'prenume'=>Input::get('Prenume'), 'adresa'=>Input::get('Adresa'), 'ziua'=>Input::get('date_day'), 'luna'=>Input::get('date_month'), 'anul'=>Input::get('date_year'), 'localitate'=>Input::get('oras'), 'sexul'=>Input::get('sexul'), 'privacy'=>Input::get('privacy')  ) );
				return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/datepersonale');
			}
			else
			{
				DB::table('users_data')->insert( array('users_data_id'=>Auth::user()->user_id, 'nume'=>Input::get('Nume'), 'prenume'=>Input::get('Prenume'), 'adresa'=>Input::get('Adresa'), 'data_nasterii'=>Input::get('date_day'). ' - '.Input::get('date_month').' - '.Input::get('date_year'), 'localitate'=>Input::get('oras'), 'sexul'=>Input::get('sexul'), 'privacy'=>Input::get('privacy')) );
				return Redirect::to('http://localhost/profil/'.Auth::user()->username.'/datepersonale');
			}
		}



		

}