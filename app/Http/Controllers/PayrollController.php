<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payroll;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PayrollsExport;

class PayrollController extends Controller
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
        $payrolls = DB::table('payrolls')
        ->join('employees', 'payrolls.employee_id', '=', 'employees.id')
        ->join('employers', 'payrolls.employer_id', '=', 'employers.id')
        ->select('payrolls.*','employees.name as emps','employers.name')
        ->get();
        return view('payroll.index',[
            'payrolls' => $payrolls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employers = DB::select('select * from employers');
        $employees = DB::select('select * from employees');
        return view('payroll.create',[
            'employers' => $employers,
            'employees' => $employees
        ]);
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
            'employee_id' => 'required|integer',
            'employer_id' => 'required|integer',
            'joining_date' => 'required',
            'leaving_date' => 'required'
        ]);
        //dd($request->all());
        Payroll::create($request->all());

        return redirect()->route('payroll.index')->with('success','Payroll added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payroll = Payroll::find($id);

        return view('payroll.show',['payroll'=>$payroll]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payroll = Payroll::find($id);
        $employers = DB::select('select * from employers');
        $employees = DB::select('select * from employees');
        return view('payroll.edit',[
            'payroll' => $payroll,
            'employers' => $employers,
            'employees' => $employees
        ]);    
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
        $request->validate([
            'employee_id' => 'required|integer',
            'employer_id' => 'required|integer',
            'joining_date' => 'required',
            'leaving_date' => 'required'
        ]);
        $payroll = Payroll::find($id);

        $payroll->update($request->all());

        return redirect()->route('payroll.index')->with('success','Payroll updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();
        return redirect()->route('payroll.index')
            ->with('success', 'Payroll deleted successfully');
    }

    public function emp(){
        $payrolls = Payroll::all();

        return view('payroll.pays',['payrolls'=>$payrolls]);
    }
    public function export() 
    {
        return Excel::download(new PayrollsExport, 'payrolls.xlsx');

    }
}
