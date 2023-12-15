<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validação dos dados da requisição
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'date_birth' => 'required|date',
            'cpf' => 'required|max:14|unique:users',
            'password' => 'required|min:8|max:32',
            'plan_id' => 'required|exists:plans,id',
        ]);

        // Se a validação falhar, retorna um erro 400
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Cria o usuário
        $user = User::create($request->all());

        // Envio de e-mail de boas-vindas
        // (Implemente esta parte com a lógica de envio de e-mail no Laravel)

        // Retorna os dados do usuário (exceto senha e remember_token)
        return response()->json($user->makeHidden(['password', 'remember_token']), 201);
    }
}
