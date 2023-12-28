<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Workout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentReportController extends Controller
{
    public function export(Request $request)
    {
        $studentId = $request->query('id_do_estudante');
        $student = Student::find($studentId);

        if (!$student) {
            return response()->json(['error' => 'Estudante não encontrado'], Response::HTTP_NOT_FOUND);
        }


        $workouts = Workout::with('exercise')
            ->where('student_id', $studentId)
            ->orderBy('day')
            ->orderBy('created_at')
            ->get();


        $workoutsByDay = $workouts->groupBy('day');

        $pdf = PDF::loadView('pdfs.workout', [
            'student' => $student,
            'workoutsByDay' => $workoutsByDay,
        ]);

        return $pdf->stream('relatorio_treino.pdf');
    }
}
