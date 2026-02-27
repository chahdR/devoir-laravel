<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'required|integer|min:0|max:20',
        ]);

        $student = new Student();
        
        $student->name = $request->name;
        $student->email = $request->email;
        $student->note = $request->note;

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
       

        $student = Student::find($id);

        return view('student.edit', compact('student'));
    }

    
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'required|integer|min:0|max:20',
        ]);

       
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->note = $request->note;

        $student->save();


        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
