<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\Student;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verifica si el usuario es un estudiante y le niega el acceso
        if ($user instanceof Student) {
            abort(403, 'Acceso denegado para estudiantes');
        }

        // Verifica si el usuario es un profesor
        if (!$user instanceof Teacher) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}
