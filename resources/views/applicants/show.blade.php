@extends('layouts.app')

@section('title', 'Applicant Details')

@section('content')
    <h1>Applicant Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $applicant->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $applicant->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $applicant->phone }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $applicant->address }}</td>
        </tr>
        <tr>
            <th>Academic Details</th>
            <td>{{ $applicant->academic_details }}</td>
        </tr>
    </table>

    <a href="{{ route('applicants.index') }}" class="btn btn-secondary">Back</a>
@endsection
