<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends BaseController
{
    private function sanitize($data) 
    {
        $data = trim($data);
        $data = strip_tags($data);
        return $data;
    }
    
    public function getUserLogin()
    {   
        return view('LoginPage');
    }    
    
    public function postUserLogin()
    {  
        $username = $this->sanitize(Input::get('username'));
        $password = $this->sanitize(Input::get('password'));
            
        if ($username == $_ENV['ADMIN_USERNAME'] && $password == $_ENV['ADMIN_PASSWORD']) {
            Session::put('user', $username);
            return Redirect::to('/');  
        }
    }
        
    public function userLogout()
    {
        Session::flush('user');
        return Redirect::to('/');
    }
    
    
    
    
    
    
}
