<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;

class EmployeeController extends Controller
{
    //using auth middleware to protect routes
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        
        return view('employee.index',[
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'education' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'date_of_birth' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'uan_number' => 'required',
            'esic_number' => 'required',
            'adhaar_number' => 'required',
            'pan_number' => 'required',
            'blood_group' => 'required',
            'body_mark' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required'
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success','Employee added successfully');
    
        // dd($request->all());
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee',$employee);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'education' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'date_of_birth' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'uan_number' => 'required',
            'esic_number' => 'required',
            'adhaar_number' => 'required',
            'pan_number' => 'required',
            'blood_group' => 'required',
            'body_mark' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required'
        ]);
        $employee = Employee::find($id);
        
        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully');
    }

    public function employeeIds()
    {
        $employees = Employee::all();
        
        return $employees;
    }
    public function emps(){
        $employees = Employee::find(2);

        return view('employee.emp',['employees'=>$employees]);
    }

    public function export() 
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');

    }
}
