@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Payroll</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('payroll.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="employee_id">Employee:</label>
                <select class="col-sm-8 form-control" name="employee_id" id="employee_id">
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach    
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="employer_id">Employer:</label>
                <select class="col-sm-8 form-control" name="employer_id" id="employer_id">
                    <option value="">Select Employer</option>
                    @foreach($employers as $employer)
                    <option value="{{$employer->id}}">{{$employer->name}}</option>
                    @endforeach    
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="joining_date">Joining date</label>
                <input type="date" name="joining_date" id="joining_date" class="col-sm-8 form-control">
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="leaving_date">Leavning date</label>
                <input type="date" name="leaving_date" id="leaving_date" class="col-sm-8 form-control">
            </div>
            <button class="btn btn-primary" type="submit">Add Payroll</button>    
        </form>
        </div>
@endsection