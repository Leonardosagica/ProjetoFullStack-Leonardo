<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks= $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));
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
