@extends('layouts.app')

@section('title', 'Edit Applicant')

@section('content')
    <h1>Edit Applicant</h1>

    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $applicant->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $applicant->email }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $applicant->phone }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control">{{ $applicant->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="academic_details" class="form-label">Academic Details</label>
            <textarea name="academic_details" id="academic_details" class="form-control">{{ $applicant->academic_details }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
