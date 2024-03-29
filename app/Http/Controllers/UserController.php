<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeEmailToUser;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'date_birth' => 'required|date',
                'cpf' => 'required|unique:users|max:14',
                'password' => 'required|min:8|max:32',
                'plan_id' => 'required|exists:plans,id',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'date_birth' => $request->input('date_birth'),
                'cpf' => $request->input('cpf'),
                'password' => Hash::make($request->input('password')),
                'plan_id' => $request->input('plan_id'),
            ]);

            $plan = Plan::find($user->plan_id);


            Mail::send('emails.welcome_email', ['user' => $user, 'plan' => $plan], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                        ->subject('Bem-vindo(a) ao Nosso Sistema!');
            });

            // Resposta de sucesso
            return response()->json($user, 201);
        }
        catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

    }
}
