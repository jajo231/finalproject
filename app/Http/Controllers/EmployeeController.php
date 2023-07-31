<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('name')->get();

        return inertia('Employee/Index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'         => 'string|required',
            'position'  => 'string|required',
            'salary'     => 'integer|required',
            'email'      => 'string|required',
        ]);

        $fileName = null;

        if ($request->img) {
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/img'), $fileName);
            $fields['img'] = $fileName;
        }

        Employee::create($fields);

        return redirect()->route('employees')->banner('Saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return inertia('Employee/Show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return inertia('Employee/Edit', compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'         => 'string|required',
            'position'  => 'string|required',
            'salary'     => 'integer|required',
            'email'      => 'string|required',
        ]);

        $employee->update($request->all());

        $request->session()->flash('flash.banner', 'Updated successfully.');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees')->dangerBanner('Removed.');
    }

    public function toggleActive(Employee $employee)
    {
        $employee->payed = !$employee->payed;
        $employee->save();

        return back();
    }

    public function search($searchKey)
    {
        return inertia('Employee/Index', [
            'employees' => Employee::where('name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function email(Employee $employee, Request $request) {

        Mail::send('emails.mail',['employee'=>$employee], function($message) use($employee) {
        $message->to($employee->email);
        $message->subject('');
    });

    $request->session()->flash('flash.banner', 'Sent.');
    $request->session()->flash('flash.bannerStyle', 'success');

    return back();
    }
}
