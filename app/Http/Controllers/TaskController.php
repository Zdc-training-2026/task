<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller

{
    public function index()
    {
        //タスク一覧を表示
        $tasks = Task::orderBy('due_date', 'asc')->where('user_id', session('user_id'))->get();
        return view('tasks.index', compact('tasks'));
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
        $stmt += array('user_id' => session('user_id'));
        Task::create($stmt);

        return redirect()->route('Task.index')->with('success', '投稿が完了しました！');
    }

    public function edit(int $id)
    {
        //タスク編集フォーム表示
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact("task"));
    }
    public  function update(Request $request, $id)
    {
        //タスク更新処理
        $up = Task::find($id);
        $up->fill($request->all());
        $up->save();
        return redirect()->route('Task.index')->with('success', 'データを更新しました。');
    }

    //タスク削除処理
    public function destroy(int $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        // 削除完了後に一覧画面へリダイレクト
        return redirect()->route('Task.index')->with('success', 'データを削除しました。');
    }
}
