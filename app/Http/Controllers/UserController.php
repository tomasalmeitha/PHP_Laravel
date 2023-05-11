<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $aMinhaVariavel = "Hello turma de Soft Dev!";

        $usersModel = User::all();

        return view('users.home', compact('aMinhaVariavel'));
    }

    public function all_users()
    {
        $oMeuArray = [
            'nome' => 'Sara',
            'nome2' => 'José',
            'nome3' => 'Rúben',
        ];

        if (request()->query('user_id')) {
            $allUsers = DB::table('users')
                ->where('id', request()->query('user_id'))
                ->get();
        } else {
            $allUsers = DB::table('users')
                ->get();
        }

        $cesaeInfo = $this->getCesaeInfo();

        return view('users.all_users', compact('oMeuArray', 'cesaeInfo', 'allUsers'));
    }

    public function all_tasks()
    {
        $allTasks = $this->getAllTasks();
        return view('users.all_tasks', compact('allTasks'));
    }

    public function viewUser($id)
    {
        $ourUser = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.view_user', compact('ourUser'));
    }

    public function deleteUser($id)
    {

        DB::table('tasks')
            ->where('users_id', $id)
            ->delete();


        DB::table('users')
            ->where('id', $id)
            ->delete();

        return back();
    }

    public function viewTask($id)
    {
        $ourTask = DB::table('tasks')
            ->where('id', $id)
            ->first();

        return view('users.view_task', compact('ourTask'));
    }

    public function deleteTask($id)
    {

        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        return back();
    }

    public function addUser()
    {
        return view('users.add_user');
    }
    protected function getCesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Cenas',
            'email' => 'cenas@gmail.com',
        ];

        return $cesaeInfo;
    }

    public function createUser(Request $request)
    {
        $myUser = $request->all();

        /* $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]); */

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('home_all_users')->with('message', 'Utilizador adicionado com sucesso');

        file_put_contents("request.txt", print_r($myUser, true));
    }

    protected function getAllTasks()
    {

        $allTasks = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.users_id')
            ->select('tasks.*', 'users.name as usname')
            ->get();

        return $allTasks;
    }


    public function addTask()
    {
      
        $allUsers = DB::table('users')
                ->get();
    
        return view('users.add_task', compact('allUsers'));

    }



    public function createTask(Request $request)
    {
        $myTask = $request->all();

       /*  $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required',
            'users_id' => 'required',
        ]); */


        DB::table('tasks')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'users_id' => $request->users_id
        ]);

        return redirect('home_all_tasks')->with('message', 'Tarefa adicionada com sucesso');

        file_put_contents("requestTask.txt", print_r($myTask, true));
    }
}
