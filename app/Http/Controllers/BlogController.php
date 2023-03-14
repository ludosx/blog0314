<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    public function loginView() {

        return view('login');
    }


    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'));        
        }
        else {
            return redirect(route('home'));
        }
    }


    public function registerView() {

        return view('register');
    }


    public function register(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();    

        Auth::login($user);

        return redirect(route('dashboard'));
    }


    public function dashboardView() {

        return view('dashboard', ['posts' => Post::all(), 'users' => User::all()]);
    }


    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }


    public function newPost() {
        
        return view('post');
    }


    public function savePost(Request $request) {
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->text_post = $request->text_post;
        $post->save();

        return redirect(route('dashboard'));
    }


    public function newAnswer(Request $request) {

        return view('answer', ['post_id' => $request->post_id]);
    }


    public function saveAnswer(Request $request) {
        $answer = new Answer();
        $answer->user_id = $request->user_id;
        $answer->post_id = $request->post_id;
        $answer->answer = $request->answer;
        $answer->save();

        return redirect(route('dashboard'));
    }


}
