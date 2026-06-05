<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller

{
    public function index()
    {
        //タスク一覧を表示
        $list = Task::select('title', 'body')->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('list'));
    }
    public function create()
    {
        //タスク作成フォーム表示
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        //タスク保存
        $stmt = $request->validate([
            'title' => 'required|max:100',
            'body' => 'nullable|max:1000',
            'status' => 'required|in:未着手,進行中,完了',
            'due_date' => 'nullable|date',
        ]);

        Task::create($stmt);

        return redirect()->route('Task.index')->with('success', '投稿が完了しました！');
    }

    public function edit()
    {
        //タスク編集フォーム表示
        return view('tasks.edit');
    }
    public  function update()
    {
        //タスク更新処理
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    //タスク削除処理
    public function destroy(int $id)
    {

        $tasks = Task::find($id);

        return view('tasks/edit');
    }
}
//タスク削除処理フォーム resources/views/tasks/edit.blade.php