<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class accountController extends Controller
{
//CRUD Account--------------------------------------------------------------------------
    public function index()
    {
        if(Auth::user())
        {
            return redirect()->route("charpage-index");
        }
        else
        {
            return view("account.index");
        }
    }

    public function create()
    {
        return view("account.create");
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6|max:16",
        ],
        [
            "name.required"=>"Nome é obrigatório",
            "email.required"=>"E-mail é obrigatório",
            "email.unique"=>"E-mail indisponível, tente outro!",
            "password.required"=>"Senha é obrigatória",
            "password.min"=>"A senha precisa ter, no mínimo, 6 caracteres",
            "password.max"=>"A senha pode ter, no máximo, 16 caracteres",
        ]);

        $request["password"] = Hash::make($request["password"]);
        User::create($request->all());

        if($request)
        {
            return back()->with("success", "Sua conta foi registrada com sucesso");
        }
        else
        {
            return back()->with("fail", "Ocorreu algum erro no registro de sua conta");
        }
    }

    public function edit($id)
    {
        $user_id = User::where("id", $id)->first();

        if(!empty($user_id))
        {
            return view("account.edit", ["user_id"=>$user_id]);
        }
        else
        {
            return redirect()->route("charpage-index");
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate
        ([
            "name"=>"required",
            "email"=>"required|email|unique:users,email," .auth()->id(),
            "password"=>"required|min:6|max:16",
        ],
        [
            "name.required"=>"Nome é obrigatório",
            "email.required"=>"E-mail é obrigatório",
            "email.unique"=>"E-mail indisponível, tente outro!",
            "password.required"=>"Senha é obrigatória",
            "password.min"=>"A senha precisa ter, no mínimo, 6 caracteres",
            "password.max"=>"A senha pode ter, no máximo, 16 caracteres",
        ]);

        $request->password = Hash::make($request->password);
        $data =
        [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
        ];

        if($data)
        {
            User::where("id", $id)->update($data);
            return back()->with("success", "Sua conta foi editada com sucesso");

        }
        else
        {
            return back()->with("fail", "Ocorreu algum erro na edição da sua conta");
        }
    }

    public function delete()
    {
        return view("account.delete");
    }

    public function destroy($id)
    {
        if($id)
        {
            User::where("id", $id)->delete();
            return redirect()->route("account-index")->with("success", "Sua conta foi excluída com sucesso");
        }
        else
        {
            return redirect()->route("account-index")->with("danger", "Ocorreu um erro ao deletar a sua cinta");
        }

    }

//Login e Logout------------------------------------------------------------------------
    public function login(Request $request)
    {
        $request->validate
        ([
            "email"=>"required",
            "password"=>"required",
        ],
        [
            'email.required'=>"Sem e-mail não dá meu parceiro",
            'password.required'=>"Sem senha dá uma little pegada",
        ]);

        if(Auth::attempt(["email"=>$request->email, "password"=>$request->password]))
        {
            return redirect()->route("charpage-index");
        }
        else
        {
            return back()->with("fail", "E-mail ou Senha inválida");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("account-index");
    }
}
