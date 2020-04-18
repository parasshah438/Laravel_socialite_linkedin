<?php
namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Validator,Redirect,Response,File;
 use Socialite;
 use App\User;

 class SocialiteController extends Controller
 {

 public function index()
 {
     return view('login');
 }
 
 public function redirect($provider)
 {
     return Socialite::driver($provider)->redirect();
 }

 public function callback($provider)
 {
   $getInfo = Socialite::driver($provider)->user(); 
   $user = $this->create($getInfo,$provider); 
   auth()->login($user); 
   return redirect()->to('/home');
 }

 public function create($getInfo,$provider)
 {
   $user = User::where('email', $getInfo->email)->first();
   if (!$user) {
         $user = new User; 
            $user['name'] = $getInfo->getName();
            $user['email'] = $getInfo->getEmail();
            $user['provider_id'] = $getInfo->id;
            $user['provider'] = $provider;
            $user['avatar'] = $getInfo->getAvatar();
            $user['email_verified_at'] =  now();
            $user->save();
     }
     return $user;
  }
}