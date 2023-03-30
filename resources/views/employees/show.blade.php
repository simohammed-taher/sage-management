@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Employee Details</h1>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $employee->id }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>{{ $employee->position }}</td>
                        </tr>
                        <tr>
                            <th>Hire Date</th>
                            <td>{{ $employee->hire_date }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
