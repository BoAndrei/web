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
				Mail::raw('Pentru a reseta parola acceseaza acest link:http://localhost/resetparola/'.Input::get('email').'/'.$randomString, function($message) {
   				 $message->to(Input::get('email'), Input::get('email'))->subject('Parola Noua');
				
				});

				//DB::table('users')->where('email','=',Input::get('email'))->update(array('password' => Hash::make($randomString)));
			
			
			return Redirect::to('/');
		}

		public function resetparola() {
			
			return view('ResetParola');
		
		}

		public function TopicNou() {
			
			$categorii = DB::table('categories')->get();
			return view('TopicNou')->with('categorii',$categorii);
		
		}

		public function EditTopic() {
			
			
				
			$data = date("Y-m-d H:i:s", strtotime('+3 hours'));
			$slug = Str::slug(Input::get('Topic'));
			
			$tag = Input::get('tags');
			$last_id = DB::table('topics')->orderBy('topic_id', 'desc')->first();




			if(!Input::get('categorie'))
			{
				return Response::json(['status' => 'found'], 404);	
			}


			if(str_word_count(Input::get('Topic')) < 15)
			{
				return Response::json(['status' => 'found'], 403);	
			}

				


			if(!$tag)
			{
				return Response::json(['status' => 'found'], 406);	
			}

			
				foreach ($tag as $tags ) 
				{
					
					if(DB::table('tags')->where('nume_tag',$tags)->exists())
					{
						$occ = DB::table('tags')->where('nume_tag',$tags)->first();
						$k = $occ->tag_occurances;

						DB::table('tags')->where('nume_tag',$tags)->update(array('tag_occurances' => $k+1));
					}
					else
        			 DB::table('tags')->insert(array('nume_tag' => $tags  ));

        			$tag_id = DB::table('tags')->where('nume_tag',$tags)->first();
					DB::table('tags_topics')->insert(array('tags_id' => $tag_id->tag_id, 'topics_id'=>$last_id->topic_id+1));

	    			
	    		}


			if( DB::table('topics')->where('topic_urlslug',$slug)->select('occurances')->first())
			{
				$var = DB::table('topics')->where('topic_urlslug',$slug)->first();
				$k = $var->occurances;
			}
			else 
				$k = 0;

			
			$topics = DB::table('topics')->where('topic_urlslug',$slug)->get();

			if($topics)
			{
				$k++;
				DB::table('topics')->where('topic_urlslug',$slug)->update(array( 'occurances'=> $k ));				
			}

			
			if($k > 0)
			{
				DB::table('topics')->insert(array( 'topic_author_id'=>Auth::user()->user_id, 'contents'=>Input::get('Topic'), 'date_added'=>$data, 'categorie'=>Input::get('categorie'),'topic_urlslug'=>$slug.'-'.$k ));
				
			}

			else if($k == 0)
			{
				DB::table('topics')->insert(array( 'topic_author_id'=>Auth::user()->user_id, 'contents'=>Input::get('Topic'), 'date_added'=>$data, 'categorie'=>Input::get('categorie'),'topic_urlslug'=>$slug ));
				
			}
return Response::json('/topic/'.Str::slug(Input::get('categorie')).'/'.substr($slug,0,100));
//return Redirect::to('/topic/'.Input::get('categorie').'/'.$slug);
		
		
	}

		public function ToateTopicurile()
		{

			$topics = DB::table('topics')->join('categories','categorie','=','denumire')->join('users','user_id','=','topic_author_id')->orderBy('date_added', 'DESC')->paginate(20);
			return view('PrimaPagina')->with('topics',$topics);
		}

		public function Topic() {

			//$topic_id = DB::table('replies')->join('topics','topics','=','topic_id')->get();

			$replies = DB::table('replies')->join('topics','topic','=','topic_urlslug')->join('users','author_id','=','user_id')->where('topic',Request::segment(3))->orderBy('acceptat', 'DESC')->orderBy('reply_date_added', 'ASC')->get();
			//die(var_dump($replies));
			$topic = DB::table('topics')->join('users','topic_author_id','=','user_id')->where('topic_urlslug',Request::segment(3))->get();
			
			$tag = DB::table ('tags_topics')->join('topics','topic_id','=','topics_id')->join('tags','tag_id','=','tags_id')->where('topic_urlslug',Request::segment(3))->get();

			$repliesReply = DB::table('repliesreply')->join('users','reply_author_id','=','user_id')->get();

			return view('Topic')->with('topic',$topic)->with('replies',$replies)->with('repliesReply',$repliesReply)->with('tag',$tag);
		}

		public function PostReply() {
			
			$data = date("Y-m-d H:i:s", strtotime('+3 hours'));
			DB::table('replies')->insert(array( 'content'=>Input::get('reply'), 'reply_date_added'=>$data, 'topic'=>Input::get('topic_id'),'author_id'=>Auth::user()->user_id ));
			
			$topicz = DB::table('topics')->where('topic_urlslug',Input::get('topic_id'))->join('categories','denumire','=','categorie')->first();
			return Redirect::to('/topic/'.$topicz->categ_urlslug.'/'.$topicz->topic_urlslug);

		}

		public function PostReplyReply() {

			$data = date("Y-m-d H:i:s", strtotime('+3 hours'));
			DB::table('repliesreply')->insert( array( 'replies_id'=>Input::get('reply_id'), 'repliesReply_content'=>Input::get('reply'), 'date_added'=>$data, 'reply_author_id'=>Auth::user()->user_id ) );
			
			$topicz = DB::table('topics')->where('topic_urlslug',Input::get('topic_id'))->join('categories','denumire','=','categorie')->first();
			return Redirect::to('/topic/'.$topicz->categ_urlslug.'/'.$topicz->topic_urlslug);
		}

		public function likeAdd() {
			$likes = DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->first();
			
			if(count($likes) == 0)
			{

				$dislikes = DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->first();
			
				if(count($dislikes) != 0)
				{
					DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->delete();
					$k2 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
					$k3 = $k2->dislikes;
					DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('dislikes'=>$k3-1));
					

				}

				DB::table('likes')->insert(array( 'user_id' => Auth::user()->user_id, 'topic_id'=>Input::get('topic_id') ));
				$k1 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
				$k = $k1->likes;
				DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('likes'=>$k+1));
				if(count($dislikes) != 0)
				{
					return Response::json(['status' => 'found'], 205);	
				}
				else return Response::json(['status' => 'found'], 200);	
			}

			else
			{
				DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->delete();
				$k1 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
				$k = $k1->likes;
				DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('likes'=>$k-1));
				return Response::json(['status' => 'huy'], 201);
			}
			
			
			  
		}

		public function dislikeAdd() {
			$dislikes = DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->first();
			
			if(count($dislikes) == 0)
			{
				$likes = DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->first();
				
				if(count($likes) != 0)
				{
					DB::table('likes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->delete();
					$k1 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
					$k = $k1->likes;
					DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('likes'=>$k-1));
				}

				DB::table('dislikes')->insert(array( 'user_id' => Auth::user()->user_id, 'topic_id'=>Input::get('topic_id') ));
				$k2 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
				$k3 = $k2->dislikes;
				DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('dislikes'=>$k3+1));
				if(count($likes) != 0)
				{
					return Response::json(['status' => 'found'], 206);	
				}
				else return Response::json(['status' => 'io'], 203);
					
			}

			else
			{
				DB::table('dislikes')->where('user_id',Auth::user()->user_id)->where('topic_id',Input::get('topic_id'))->delete();
				$k2 = DB::table('topics')->where('topic_id',Input::get('topic_id'))->first();
				$k3 = $k2->dislikes;
				DB::table('topics')->where('topic_id',Input::get('topic_id'))->update(array('dislikes'=>$k3-1));
				
				return Response::json(['status' => 'po'], 204);
			}


		}

		public function TopicDelete() {
		
			
			if(Auth::user()->user_type == 'admin')
			{ $var = DB::table('topics')->where('topic_urlslug',Request::segment(2))->first();
				DB::table('topics')->where('topic_urlslug',Request::segment(2))->delete();
				DB::table('replies')->where('topic',Request::segment(2))->delete();
				DB::table('likes')->where('topic_id',$var->topic_id)->delete();
				DB::table('dislikes')->where('topic_id',$var->topic_id)->delete();
				return Redirect::to('/');
			}
			else
				return Redirect::to('/');
			

		}

		public function ReplyDelete() {
			$author = DB::table('replies')->where('reply_id',Request::segment(2))->first();
			if(Auth::user()->user_type == 'admin' || Auth::user()->user_id == $author->author_id)
			{
				DB::table('replies')->where('reply_id',Request::segment(2))->delete();
				DB::table('repliesreply')->where('replies_id',Request::segment(2))->delete();
				return Redirect::to($_SERVER['HTTP_REFERER']);
			}
			else
				return Redirect::to('/');
			
		}

		public function SearchTopicuri() {

			$search_term = Request::segment(3);

			$topics = DB::table('topics')->join('categories','categorie','=','denumire')->join('users','user_id','=','topic_author_id')->where('contents','like',"%$search_term%")->get();
			
			return view('TopicSearch')->with('topics',$topics);
		}

		public function SearchRaspunsuri() {

			$search_term = Request::segment(3);

		

			$topics = DB::table('topics')->join('replies','topic','=','topic_urlslug')->join('categories','categorie','=','denumire')->join('users','user_id','=','topic_author_id')->where('content','like',"%$search_term%")->orderBy('date_added', 'DESC')->get();
		
				return view('TopicSearchRaspunsuri')->with('topics',$topics);
		}

		public function SearchTags() {

			$search_term = Request::segment(3);

		

			$topics = DB::table('tags_topics')->join('topics','topics_id','=','topic_id')->join('categories','categorie','=','denumire')->join('tags','tags_id','=','tag_id')->join('users','user_id','=','topic_author_id')->where('nume_tag','=',$search_term)->orderBy('date_added', 'DESC')->get();
		
				return view('TopicSearchTags')->with('topics',$topics);
		}

		public function RaspunsAcceptat() {

			$id = Input::get('reply_id');
			$topic_urlslug = Input::get('topic');
			
			if(Auth::user()->user_type == 'admin')
			{
				DB::table('replies')->where('topic',$topic_urlslug)->update(array('acceptat'=> 0));
				DB::table('replies')->where('reply_id',$id)->update( array('acceptat' => 1  ) );
				return Response::json(['status' => 'found'], 200);	
			}else 
			

			return Response::json(['status' => 'found'], 404);	
		}

		public function topicuriproprii() {

			$topics = DB::table('topics')->join('categories','categorie','=','denumire')->join('users','user_id','=','topic_author_id')->where('topic_author_id',Auth::user()->user_id)->orderBy('date_added', 'DESC')->paginate(5);
			return view('TopicuriProprii')->with('topics',$topics);
		}

		public function raspunsuriproprii() {
$topics = DB::table('topics')->join('replies','topic','=','topic_urlslug')->join('categories','categorie','=','denumire')->join('users','user_id','=','topic_author_id')->where('topic_author_id',Auth::user()->user_id)->orderBy('date_added', 'DESC')->get();
		
			$replies = DB::table('replies')->join('users','author_id','=','user_id')->where('author_id',Auth::user()->user_id)->orderBy('reply_date_added', 'ASC')->get();
				return view('RaspunsuriProprii')->with('topics',$topics);
		}

		public function CautareSite() {

			$users = DB::table('users')->get();
			return view('CautareSite')->with('users',$users);
		}

		public function CautareSiteForm() {
			
			$term = Request::segment(2);
			$search_term = Request::segment(3);
$rezultate = DB::table('users')->join('users_data','users_data_id','=','user_id')->where($term,'LIKE',"%$search_term%")->get();



			
//die(var_dump($rezultate));
			return view('RezultateCautare')->with('rezultate',$rezultate);
		}

		public function contact() {
			return view('Contact');
		}

		public function contactnou() {

			$data = date("Y-m-d H:i:s", strtotime('+2 hours'));
			DB::table('mesaje_contact')->insert(array( 'mesaj_c_expeditor'=>Auth::user()->user_id, 'mesaj_c_titlu'=>Input::get('subiect'), 'mesaj_c_subiect'=>Input::get('mesaj'), 'mesaj_c_data'=>$data, 'mesaj_c_tip'=>Input::get('tip_tichet') ));

			
		}

		public function contactraspuns() {

			$data = date("Y-m-d H:i:s", strtotime('+2 hours'));
			DB::table('mesaje_contact')->where('mesaj_c_id',Input::get('mesaj_c_id'))->update(array('mesaj_c_raspuns'=>Input::get('raspuns'), 'mesaj_c_raspuns_expeditor'=>Auth::user()->user_id, 'mesaj_c_raspuns_data'=>$data, 'mesaj_c_status'=>'1'));
		}




		

	}