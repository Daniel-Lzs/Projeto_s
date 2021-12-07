<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\charpageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Retorno de Erro nas Routes------------------------------------------------------------

//--------------------------------------------------------------------------------------

//Redirecionamento para o grupo de rotas account----------------------------------------
Route::get("/", function()
{
    return redirect()->route("account-index");
});
//--------------------------------------------------------------------------------------

//Account Route CRUD--------------------------------------------------------------------
Route::prefix("account")->group(function()
{
    Route::get("/", [accountController::class, "index"])->name("account-index");
    Route::get("/create", [accountController::class, "create"])->name("account-create");
    Route::post("/", [accountController::class, "store"])->name("account-store");
    Route::get("/{id}/edit", [accountController::class, "edit"])->where("id", "[0-9]+")->name("account-edit")->middleware("auth");
    Route::put("/{id}", [accountController::class, "update"])->where("id", "[0-9]+")->name("account-update")->middleware("auth");
    Route::get("/delete", [accountController::class, "delete"])->name("account-delete")->middleware("auth");
    Route::delete("/{id}}", [accountController::class, "destroy"])->where("id", "[0-9]+")->name("account-destroy")->middleware("auth");
    //account login and logout----------------------------------------------------------
    Route::post("/login", [accountController::class, "login"])->name("account-login");
    Route::get("/logout", [accountController::class, "logout"])->name("account-logout");
});
//--------------------------------------------------------------------------------------

//Characters Page Routes CRUD------------------------------------------------------------
Route::prefix("charpage")->middleware(["auth"])->group(function()
{
    Route::get("/", [charpageController::class, "index"])->name("charpage-index");
    Route::get("/create", [charpageController::class, "create"])->name("charpage-create");
    Route::post("/", [charpageController::class, "store"])->name("charpage-store");
    Route::get("/{id}", [charpageController::class, "show"])->where("id", "[0-9]+")->name("charpage-show");
    Route::get("/{id}/edit", [charpageController::class, "edit"])->where("id", "[0-9]+")->name("charpage-edit");
    Route::put("/{id}", [charpageController::class, "update"])->where("id", "[0-9]+")->name("charpage-update");
    Route::delete("/{id}", [charpageController::class, "destroy"])->where("id", "[0-9]+")->name("charpage-destroy");
    //characters Create and Edit Routes-------------------------------------------------
    Route::get("/{id}/showcreate", [charpageController::class, "showCreateChar"])->where("id", "[0-9]+")->name("charpage-show-c");
    Route::get("/{id}/showedit", [charpageController::class, "showEditChar"])->where("id", "[0-9]+")->name("charpage-show-e");

});
//--------------------------------------------------------------------------------------

