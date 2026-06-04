<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AuthController extends Controller
{
    public function showRegister(){
        // $Registration = $this->
        return view('register');
    }

    public function register(Request $request){
        $data = $request ->validate([
        'name' =>'required|max:50',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8|confirmed'
        ]);
    User::create($data);
    return redirect()->route('Auth.login');
    }

    public function showLogin(){

    }

    public function login(){

    }

    public function logout(){

    }


}




// Functionの続き、ドキュメントの６番目、ハッシュ化をしてユーザー登録完了



 public function index()
    {
        $books = $this->book->findAllBooks();

        return view('book.index', compact('books'));

//掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }