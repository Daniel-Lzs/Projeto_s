<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Character extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "nome",
        "idade",
        "historia",
        "habilidades",
        "user_create_id",
        "user_edit_id",
    ];

    public function userCreateId()
    {
        return $this->belongsTo(User::class, "user_create_id")->first();
    }

    public function userEditId()
    {
        return $this->belongsTo(User::class, "user_edit_id")->first();
    }

    public function getUserCreateName()
    {
        $user = $this->userCreateId();
        if($user)
        {
            $user_name = $user->name;
            return $user_name;
        }
        else
        {
            return "Erro";
        }
    }

    public function getUserEditName()
    {
        $user = $this->userEditID();
        if($user)
        {
            $user_name = $user->name;
            return $user_name;
        }
        else
        {
            return "";
        }
    }
}
