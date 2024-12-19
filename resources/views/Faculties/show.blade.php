@extends('layouts.app')

@section('title', 'Faculty Details')

@section('content')
    <h1>Faculty Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $faculty->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $faculty->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $faculty->phone }}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{ $faculty->department }}</td>
        </tr>
        <tr>
            <th>Research Interests</th>
            <td>{{ $faculty->research_interests }}</td>
        </tr>
    </table>

    <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Back</a>
@endsection
