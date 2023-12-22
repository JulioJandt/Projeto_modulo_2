<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Plan;
use App\Models\Exercise;
use App\Models\User;

class DashboardController extends Controller
{


        public function index(Request $request)
    {
        try{
            $user = Auth::user();

            $userPlan = Plan::count();
            $amountExercises = Exercise::count();
            $amountStudents = Student::count();
            $userPlan = $user->plan->description;
            $planLimit = $user->plan->limit;

            return [
                'registered_students' => $amountStudents,
                'registered_exercises' => $amountExercises,
                'current_user_plan' => $userPlan,
                'remaining_students' => $planLimit - $amountStudents,

            ];

        }catch(\Exception $exception) {
            return $this->error($exception->getMessage(), 400);
        }











        /*$user = Auth::user();

        // Lógica para obter a quantidade de estudantes cadastrados pelo usuário
        $registeredStudents = $user->students()->count();

        // Lógica para obter a quantidade de exercícios cadastrados pelo usuário
        $registeredExercises = $user->exercises()->count();

        // Lógica para obter o plano do usuário
        $currentUserPlanId = $user->plan_id;
        $currentUserPlan = $this->getPlanName($currentUserPlanId);

        // Lógica para calcular a quantidade restante de estudantes disponíveis
        $remainingStudents = $this->calculateRemainingStudents($user);

        $data = [
            'registered_students' => $registeredStudents,
            'registered_exercises' => $registeredExercises,
            'current_user_plan' => $currentUserPlan,
            'remaining_students' => $remainingStudents,
        ];

        return response()->json($data, 200);
    }

    private function getPlanName($planId)
    {
        // Lógica para mapear IDs de planos para nomes de planos
        switch ($planId) {
            case 1:
                return 'BRONZE';
            case 2:
                return 'PRATA';
            case 3:
                return 'OURO';
            default:
                return 'Desconhecido';
        }
    }

    private function calculateRemainingStudents($user)
    {
        // Lógica para calcular a quantidade restante de estudantes disponíveis
        // Subtrair a quantidade total de estudantes permitidos pelo plano com a quantidade já cadastrada pelo usuário
        $allowedStudents = $user->plan->allowed_students;
        $registeredStudents = $user->students()->count();

        return max(0, $allowedStudents - $registeredStudents);
    */
}
}
