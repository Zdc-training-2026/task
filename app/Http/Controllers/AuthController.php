<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()              //登録フォーム表示
    {
        return view('auth.register');
    }

    public function register(Request $request)          //ユーザー登録処理
    {
        $data = $request->validate([                    //ユーザーが入力したものが条件を満たしているかチェック
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $data["password"] = Hash::make($data["password"]);  //ハッシュ化をする

        User::create($data);                        //データベースへ書き込み
        return redirect()->route('Auth.login');     //ログイン画面へ遷移(returnで処理終了)
    }

    public function showLogin()                     //ログインフォーム表示
    {
        return view("auth.login");                  //"views\auth\login.blade.php"へ飛ばす
    }

    public function login(Request $request)         //ログイン処理
    {
        $user =  User::where('email', $request->email)->first();                //登録されているメールチェック
        if (!$user || !Hash::check($request->password, $user->password)) {      //入力されたパスワードとハッシュ化されたパスワードの照合
            return back()->withErrors(['email' => '認証に失敗しました']);         //エラーメッセージが出るようにしたつもり
        }
        session (['user_id' => $user->id]);                                     
        session (['user_name' => $user->name]);                                     
        return redirect()->route('Task.index');                                 //照合できたら'Task.index'に遷移
    }

    public function logout() {                      //ログアウト処理
        session()->forget('user_id');                  
        session()->forget('user_name');                  
        return redirect()->route('Auth.showLogin')->with('success', 'ログアウトしました');         //ログアウトしてログイン画面に遷移
    }
}





//  public function index()
//     {
//         $books = $this->book->findAllBooks();

//         return view('book.index', compact('books'));

//掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
    //     $posts = Post::orderBy('created_at', 'desc')->get();

    //     return view('posts.index', compact('posts'));
    // }