<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\Subject;
class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('students')->get();

        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
        ]);

        SchoolClass::create($validated);

        return redirect()->route('classes.index')
            ->with('success', 'School class created successfully.');
    }

    public function show(SchoolClass $class)
    {
        $class->load('students', 'subjects');

        $allSubjects = Subject::all();

        return view('classes.show', compact('class', 'allSubjects'));
    }

    public function edit(SchoolClass $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
        ]);

        $class->update($validated);

        return redirect()->route('classes.index')
            ->with('success', 'School class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'School class deleted successfully.');
    }

    public function addSubject(Request $request, SchoolClass $class)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $class->subjects()->syncWithoutDetaching($request->subject_id);

        return back()->with('success', 'Subject assigned to class successfully');
    }
}
