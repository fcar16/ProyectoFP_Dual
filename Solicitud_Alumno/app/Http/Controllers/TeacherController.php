<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherController
{
    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password); // Encriptar la contraseña
        $teacher->save();
        return redirect()->route('teachers.index');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $teacher = Teacher::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->save();
        return redirect()->route('teachers.show', $teacher->id);
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }


}
