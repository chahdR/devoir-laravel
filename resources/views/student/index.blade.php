{{-- Student Index View - Displays all students in a table --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Student Management System</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Add New Student Button --}}
    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            + Add New Student
        </a>
    </div>

    {{-- Students Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Note </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($students->count() > 0)
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                @if($student->note >= 10)
                                    <span class="badge bg-success">{{ $student->note }}/20</span>
                                @else
                                    <span class="badge bg-danger">{{ $student->note }}/20</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No students found. Add your first student!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
