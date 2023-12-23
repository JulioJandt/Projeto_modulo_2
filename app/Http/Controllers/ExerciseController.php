<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ExerciseController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Validação dos dados da requisição
            $request->validate([
                'description' => 'required|max:255|unique:exercises,description,NULL,id,user_id,' . $user->id,
            ]);

            // Cria o exercício e atribui automaticamente o ID do usuário
            $exercise = Exercise::create([
                'description' => $request->input('description'),
                'user_id' => $user->id,
            ]);

            return response()->json($exercise, 201);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
