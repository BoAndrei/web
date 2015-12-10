<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Input;
use Hash;

class Register extends Model {
        protected $guarded = array();
        protected $table = 'users'; 
        public $timestamps = 'false' ;
        
 
 
        public static function saveFormData()
        {
            $data = date("d-m-Y H:i:s", strtotime('+3 hours'));
            DB::table('users')->insert(array('username'=>Input::get('username'), 'password'=>Hash::make(Input::get('password')),'email'=>Input::get('email'),'date_registered'=>$data));

        }

        public static $rules = [
        	'username' => 'required|min:2|unique:users,username',
        	'password' => 'required|min:4',
        	'email' => 'required|email|unique:users,email'
        ];

        public function getRememberToken()
{
    //return $this->remember_token;
    return null;
}

public function setRememberToken($value)
{
    //$this->remember_token = $value;
    return null;
}

public function getRememberTokenName()
{
    //return 'remember_token';
    return null;
}
 
}