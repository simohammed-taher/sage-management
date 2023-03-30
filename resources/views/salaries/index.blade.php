@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Salaries</h1>
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add Salary</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Amount
                            </th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaries as $salary)
                            <tr>
                                <td>{{ $salary->id }}</td>
                                <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                                <td>{{ $salary->amount }}</td>
                                <td>{{ $salary->payment_date }}</td>
                                <td>
                                    <a href="{{ route('salaries.edit', $salary->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
