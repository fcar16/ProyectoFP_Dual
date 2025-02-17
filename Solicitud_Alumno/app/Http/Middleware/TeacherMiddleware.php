<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;

class TeacherMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        if ($user instanceof Student) {
            return response()->json([
                'message' => 'Access denied for students'
            ], 403);
        }


        if (!$user instanceof Teacher) {
            return response()->json([
                'message' => 'Access allowed only for teachers'
            ], 403);
        }

        return $next($request);
    }
}