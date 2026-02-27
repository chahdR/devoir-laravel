{{-- Student Create View - Form to add a new student --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Add New Student</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Student Information</h5>
                </div>
                <div class="card-body">
                    {{-- Form to create new student --}}
                    <form method="POST" action="{{ route('students.store') }}">
                        {{-- CSRF token for security --}}
                        @csrf

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            {{-- Error message for name --}}
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            {{-- Error message for email --}}
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Note/Grade Field --}}
                        <div class="mb-3">
                            <label for="note" class="form-label">Note (Grade out of 20)</label>
                            <input type="number" name="note" id="note" class="form-control" value="{{ old('note') }}" min="0" max="20">
                            {{-- Error message for note --}}
                            @error('note')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit and Cancel Buttons --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
