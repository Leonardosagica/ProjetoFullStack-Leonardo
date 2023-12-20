<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function allUsers(){

        $users = ['João', 'Filipe', 'Sara'];
        $tasks = ['estudar Laravel', 'estudar MVC'];

        $contactInfo = $this->contactInfo();
        $contacts = $this->allContacts();

        //$allDbUsers = DB::table('users')->get();

        $allDbUsers = User::get();

        /*
        //busca todos os users que têm pass 1234 para mandar mail a dizer que a pass não é segura
        $dbusers = DB::table('users')
                    ->where('password', '1234')
                    ->first();

        foreach($dbusers as $item){
            //manda email a dizer que pass não é segura
            SendMail::data(to:$item->email, data:'mude a sua pass'); //dummy content de mandar mail
        };*/



        /*DB::table('users')
        ->updateOrInsert(
            ['email' => 'Eloy86@gmail.com'],
            [
            'name' => 'Outro Nome',
            'password' => 'OutroPassDificil',
            ]
        );*/


        //dd($dbusers);
        //debug dump and die
        //dd($contacts);

        //continua
        //var_dump($contacts);

        return view('users.all_users', compact(
            'users',
            'tasks',
            'contactInfo',
            'contacts',
            //'dbusers',
            'allDbUsers'
        ));
    }

    public function createUser(Request $request){
        //dd($request->all());

        $request->validate([
            'name' => 'string|required|max:50',
            'password' => 'required|min:6',
            'email' => 'required|unique:users'
        ]);

        User::insert([
            'name' =>  $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('users.all')->with('message', 'utilizador adicionado com sucesso');


    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'string|required|max:50',
            'password' => 'required|min:6',
        ]);


        User::where('id',$request->id)
        ->update([
            'name' =>  $request->name,
            'phone' =>  $request->phone,
            'address' =>  $request->address,
            'password' => Hash::make($request->password),
        ]);

        //Auth::attempt();
        return redirect()->route('users.all')->with('message', 'utilizador actualizado com sucesso');


    }

    public function viewUser($id){

        $user = User::where('id', $id)->first();

        return view('users.view_user',
        compact('user'));
    }

    public function deleteUser($id){
        DB::table('tasks')
        ->where('user_id', $id)
        ->delete();

        DB::table('users')
        ->where('id', $id)
        ->delete();

        return back();

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
