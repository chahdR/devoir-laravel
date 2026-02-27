r{{-- Student Edit View - Form to edit an existing student --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Edit Student</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Edit Student Information</h5>
                </div>
                <div class="card-body">
                    {{-- Form to update existing student --}}
                    {{-- Using PUT method for update --}}
                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        {{-- CSRF token for security --}}
                        @csrf
                        {{-- Method spoofing for PUT --}}
                        @method('PUT')

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
                            {{-- Error message for name --}}
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}">
                            {{-- Error message for email --}}
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Note/Grade Field --}}
                        <div class="mb-3">
                            <label for="note" class="form-label">Note (Grade out of 20)</label>
                            <input type="number" name="note" id="note" class="form-control" value="{{ $student->note }}" min="0" max="20">
                            {{-- Error message for note --}}
                            @error('note')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit and Cancel Buttons --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-warning">Update Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
