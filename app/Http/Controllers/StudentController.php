<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:students',
                'date_birth' => 'required|date_format:Y-m-d',
                'cpf' => [
                    'required',
                    'string',
                    'unique:students',
                    'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
                ],
                'contact' => 'required|string|max:20',
                'cep' => 'nullable|string|max:20',
                'street' => 'nullable|string|max:30',
                'state' => 'nullable|string|max:2',
                'neighborhood' => 'nullable|string|max:50',
                'city' => 'nullable|string|max:50',
                'number' => 'nullable|string|max:30',
            ]);

            $user = $request->user();

            if ($this->checkLimit($user)) {
                return response()->json(['error' => 'Limite de cadastro atingido'], Response::HTTP_FORBIDDEN);
            }

            $student = Student::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'date_birth' => $request->input('date_birth'),
                'cpf' => $request->input('cpf'),
                'contact' => $request->input('contact'),
                'cep' => $request->input('cep'),
                'street' => $request->input('street'),
                'state' => $request->input('state'),
                'neighborhood' => $request->input('neighborhood'),
                'city' => $request->input('city'),
                'number' => $request->input('number'),
                'user_id' => $user->id,
            ]);

            return response()->json($student, Response::HTTP_CREATED);
        } catch (\Exception $exception) {

            return response()->json(['error' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    private function checkLimit($user)
    {

        $user->load('students');

        $amountStudents = $user->students->count();
        $userPlan = $user->plan->description;
        $planLimit = $user->plan->limit;

        return $planLimit !== null && $amountStudents >= $planLimit;
    }


}
