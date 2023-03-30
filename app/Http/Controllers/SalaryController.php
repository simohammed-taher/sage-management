<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    // Display a listing of the salaries
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    // Show the form for creating a new salary
    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    // Store a newly created salary in storage
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        Salary::create($request->all());
        return redirect()->route('salaries.index')->with('success', 'Salary created successfully.');
    }

    // Display the specified salary
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    // Show the form for editing the specified salary
    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    // Update the specified salary in storage
    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        $salary->update($request->all());
        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    // Remove the specified salary from storage
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
