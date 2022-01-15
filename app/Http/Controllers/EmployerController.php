<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployersExport;

class EmployerController extends Controller
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
        $employers = Employer::all();
        
        return view('employer.index',[
            'employers' => $employers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.create');
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
            'mobile_number' => 'required',
            'address' => 'required',
            'pf_number' => 'required',
            'esic_number' => 'required',
            'gst_number' => 'required'
        ]);

        Employer::create($request->all());

        return redirect()->route('employer.index')->with('success','Employer added successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employer = Employer::find($id);
        return view('employer.show')->with('employer',$employer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = Employer::find($id);
        return view('employer.edit')->with('employer',$employer);
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
            'name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'pf_number' => 'required',
            'esic_number' => 'required',
            'gst_number' => 'required'
        ]);

        $employer = Employer::find($id);
    
        $employer->update($request->all());

        return redirect()->route('employer.index')->with('success','Employer details updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);
        $employer->delete();
        return redirect()->route('employer.index')
            ->with('success', 'Employer deleted successfully');
    }

    public function employerIds()
    {
        $employers = Employer::all();
        
        return $employers;
    }
    public function export() 
    {
        return Excel::download(new EmployersExport, 'employers.xlsx');

    }
}
