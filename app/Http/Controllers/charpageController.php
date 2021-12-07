<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class charpageController extends Controller
{
    public function index()
    {
        $personagens = Character::all();
        return view("charpage.index", ["personagens"=>$personagens]);
    }

    public function create()
    {
        return view("charpage.create");
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            "nome"=>"required|unique:characters",
            "historia"=>"required",
            "habilidades"=>"required",
        ],
        [
            "nome.required"=>"O campo nome é de preenchimento obrigatório",
            "nome.unique"=>"Esse personagem já foi inserido no site",
            "historia.required"=>"O campo historia é de preenchimento obrigatório",
            "habilidades.required"=>"O campo habilidade é de preenchimento obrigatório",
        ]);

        $request["user_create_id"] = Auth::user()->id;
        Character::create($request->all());

        if($request)
        {
            return back()->with("success", "Personagem inserido com sucesso");
        }
        else
        {
            return back()->with("fail", "Ocorreu algum erro no registro do personagem");
        }
    }

    public function show($id)
    {
        $personagem = Character::find($id);
        if(!empty($personagem))
        {
            return view("charpage.show", ["personagem"=>$personagem]);
        }
        else
        {
            return redirect()->route("charpage-index");
        }
    }

    public function edit($id)
    {
        $personagem = Character::find($id);
        if($personagem)
        {
            return view("charpage.edit", ["personagem"=>$personagem]);
        }
        else
        {
            return redirect()->route("charpage-index");
        }
    }

    public function update(Request $request, $id)
    {
        $data =
        [
            "nome" => $request->nome,
            "idade" => $request->idade,
            "historia" => $request->historia,
            "habilidades" => $request->habilidades,
            "user_edit_id" => Auth::user()->id,
        ];

        if($data)
        {
            Character::find($id)->update($data);
            return redirect()->route("charpage-show", ['id'=>$id])->with("success", "Personagem editado com sucesso");
        }
        else
        {
            return back()->with("fail", "Não foi possivel realizar a edição do personagem");
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            Character::find($id)->delete();
            return redirect()->route("charpage-index")->with("success", "Seu personagem foi apagado com sucesso");
        }
        else
        {
            return redirect()->route("charpage-index")->with("fail", "houve um problema ao apagar o seu personagem");
        }
    }

    //Create and edit------------------------------------------------------------------------------
    public function showCreateChar($id)
    {
        if($id)
        {
            $user = User::find($id);
            $user = $user->charactersCreate();
            return view("charpage.show_create_char", ["user"=>$user]);
        }
        else
        {
            return redirect()->route("charpage-index")->with("fail", "houve um problema ao carregar seus personagens");
        }
    }

    public function showEditChar($id)
    {
        if($id)
        {
            $user = User::find($id);
            $user = $user->charactersEdit();
            return view("charpage.show_edit_char", ["user"=>$user]);
        }
        else
        {
            return redirect()->route("charpage-index")->with("fail", "houve um problema ao carregar seus personagens editados");
        }
    }
}
