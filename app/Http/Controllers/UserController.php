<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request)
  {
    // Obtener todos los usuarios de la base de datos
    // $users = User::all();
    $users = User::select("*")->get();

    // Retornar la vista y pasar la variable $users
    return view('users.index', compact('users'));
  }
  
  public function sendEmails(Request $request)
  {
    // Validar que se seleccionen usuarios
    $request->validate([
      'users' => 'required|array',
      'users.*' => 'exists:users,id',
    ]);

    // Obtener los usuarios seleccionados
    // $users = User::whereIn("id", $request->ids)->get();
    $userIds = $request->input('users');
    $users = User::whereIn('id', $userIds)->get();

    // Enviar el correo a cada usuario seleccionado
    foreach ($users as $user) {
      Mail::to($user->email)->send(new UserNotification($user));
    }

    // return back()->with('success', 'Correos electrónicos enviados con éxito.');
    return response()->json(['success'=>'Correos electrónicos enviados con éxito.']);
  }
}
