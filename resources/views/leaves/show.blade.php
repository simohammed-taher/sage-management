@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Leave Details</h1>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $leave->id }}</td>
                        </tr>
                        <tr>
                            <th>Employee</th>
                            <td>{{ $leave->employee->first_name }} {{ $leave->employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>{{ $leave->start_date }}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                            <td>{{ $leave->end_date }}</td>
                        </tr>
                        <tr>
                            <th>Reason</th>
                            <td>{{ $leave->reason }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('leaves.destroy', $leave->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
