<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkoutController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar os dados da requisição
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'exercise_id' => 'required|exists:exercises,id',
                'repetitions' => 'required|integer',
                'weight' => 'required|numeric',
                'break_time' => 'required|integer',
                'day' => 'required|in:SEGUNDA,TERÇA,QUARTA,QUINTA,SEXTA,SÁBADO,DOMINGO',
                'observations' => 'nullable|string',
                'time' => 'required|integer',
            ]);

            // Verificar se já existe um treino cadastrado para o mesmo dia
            $existingWorkout = Workout::where([
                'student_id' => $request->input('student_id'),
                'exercise_id' => $request->input('exercise_id'),
                'day' => $request->input('day'),
            ])->first();

            if ($existingWorkout) {
                return response()->json(['error' => 'Já existe um treino cadastrado para o mesmo dia.'], Response::HTTP_CONFLICT);
            }

            // Criar o treino
            $workout = Workout::create($request->all());

            // Resposta de sucesso
            return response()->json($workout, Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }


}
