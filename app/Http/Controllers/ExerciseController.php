<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Workout;
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
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function index()
    {
        try {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Lista os exercícios do usuário ordenados pela descrição
            $exercises = Exercise::where('user_id', $user->id)
                ->orderBy('description')
                ->get(['id', 'description']);

            return response()->json($exercises, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Encontra o exercício pelo ID
            $exercise = Exercise::find($id);

            // Verifica se o exercício existe
            if (!$exercise) {
                return response()->json(['error' => 'Exercício não encontrado.'], 404);
            }

            // Verifica se o exercício pertence ao usuário autenticado
            if ($exercise->user_id !== $user->id) {
                return response()->json(['error' => 'Acesso negado.'], 403);
            }

            // Verifica se há treinos vinculados ao exercício
            if ($exercise->workouts()->exists()) {
                return response()->json(['error' => 'Não é permitido deletar exercício devido a treinos vinculados.'], 409);
            }
            if (Workout::where('exercise_id', $exercise->id)->exists()) {
                return response()->json(['error' => 'Não é permitido deletar exercício devido a treinos vinculados.'], 409);
            }

            // Deleta o exercício
            $exercise->delete();

            return response()->json(null, 204);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
