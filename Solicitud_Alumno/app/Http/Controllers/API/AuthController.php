<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string|in:teacher,student',
            'dni' => 'required|string|max:255|unique:' . ($request->type === 'teacher' ? 'teachers' : 'students'),
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . ($request->type === 'teacher' ? 'teachers' : 'students'),
            'password' => 'required|string|min:6',
            'group' => 'required_if:type,student|string|in:1-ASIR,2-ASIR,1-DAW,2-DAW,1-DAM,2-DAM',
            'course' => 'required_if:type,student|string|in:24/25,25/26,26/27',
        ]);

        if ($request->type === 'teacher') {
            $user = Teacher::create([
                'dni' => $request->dni,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $token = $user->createToken('TeacherToken')->plainTextToken;
        } else {
            $user = Student::create([
                'dni' => $request->dni,
                'name' => $request->name,
                'email' => $request->email,
                'group' => $request->group,
                'course' => $request->course,
                'password' => bcrypt($request->password),
            ]);
            $token = $user->createToken('StudentToken')->plainTextToken;
        }

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'type' => $request->type
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string|in:teacher,student',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $guard = $request->type === 'teacher' ? 'teacher' : 'student';

        if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
            $user = Auth::guard($guard)->user();
            $token = $user->createToken(ucfirst($request->type) . 'Token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'type' => $request->type
                ]
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}