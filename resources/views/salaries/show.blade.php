@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Salary Details</h1>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $salary->id }}</td>
                        </tr>
                        <tr>
                            <th>Employee</th>
                            <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>{{ $salary->amount }}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{ $salary->payment_date }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('salaries.destroy', $salary->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
