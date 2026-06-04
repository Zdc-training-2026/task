<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller

{
    public function index()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $list = Task::select('title', 'body')->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('list'));
    }
    public function create()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $form = Task::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('form'));
    }
    public function store()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }
    public function edit()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }
    public  function update()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }
    public function destroy()
    {
        //掲示板の一覧を時間の新しい順に取得して、ビューで使えるようにしてるっぽい
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }
}
