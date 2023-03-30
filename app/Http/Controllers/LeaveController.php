<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // Display a listing of the leaves
    public function index()
    {
        $leaves = Leave::with('employee')->get();
        return view('leaves.index', compact('leaves'));
    }

    // Show the form for creating a new leave
    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

    // Store a newly created leave in storage
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        Leave::create($request->all());
        return redirect()->route('leaves.index')->with('success', 'Leave created successfully.');
    }

    // Display the specified leave
    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    // Show the form for editing the specified leave
    public function edit(Leave $leave)
    {
        $employees = Employee::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    // Update the specified leave in storage
    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        $leave->update($request->all());
        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully.');
    }

    // Remove the specified leave from storage
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
    }
}
