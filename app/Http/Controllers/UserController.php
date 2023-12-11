<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers(){

        $users = ['João', 'Filipe', 'Sara'];
        $tasks = ['estudar Laravel', 'estudar MVC'];

        $contactInfo = $this->contactInfo();
        $contacts = $this->allContacts();

        //debug dump and die
        //dd($contacts);

        //continua
        //var_dump($contacts);

        return view('users.all_users', compact(
            'users',
            'tasks',
            'contactInfo',
            'contacts'
        ));
    }

    public function viewUser(){
        return view('users.view_user');
    }

    public function addUser(){
        return view('users.add_user');
    }

    protected function contactInfo(){
        $contactInfo = [
            'name' => 'Sara',
            'age'=> 37
        ];

        return $contactInfo;
    }

    protected function allContacts(){
        
        $contacts =[
            ['1', 'Sara', '96666666'],
            ['2', 'Larissa', '96666666'],
            ['3', 'Miguel', '96666666'],
        ];

        return $contacts;
    }
}
