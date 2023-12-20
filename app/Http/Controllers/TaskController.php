<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks= $this->getAllTasks();

        $dbTasks = DB::table('tasks')
                    ->join('users', 'users.id', '=', 'tasks.user_id')
                    ->select('tasks.*', 'users.name as user_name')
                    ->get();

        //dd($dbTasks);

        return view('tasks.all_tasks', compact(
            'tasks',
            'dbTasks'

    ));
    }

    public function viewTask($id){

        $task = Task::where('id',$id)
        ->first();


        return view('tasks.view_task', compact('task'));

    }

    public function deleteTask($id){

        DB::table('tasks')
        ->where('id',$id )
        ->delete();

        return back();
    }

    public function addTask(){
        $users = DB::table('users')->get();


        return view('tasks.add_task', compact('users'));
    }

    public function createTask(Request $request){
        //receeber os dados do form e inserir na BD
        $request->validate([
            'name'=> 'required|string',
            'user_id'=> 'required|exists:users,id',
        ]);

        DB::table('tasks')
        ->insert([
            'name'=>  $request->name,
            'description'=>  $request->description,
            'user_id'=>  $request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso');

    }

    protected function getAllTasks(){
        $tasks =[
            ['1', 'lavar a loiça'],
            ['2', 'fazer o jantar'],
            ['3', 'dormir'],
        ];

        return $tasks;
    }
}
