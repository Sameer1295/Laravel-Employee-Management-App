@extends('layouts.app')

@section('content')
    <h2>Update payroll</h2>
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
    <form action="{{ route('payroll.update',$payroll->id ) }}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="employee">Employee:</label>
            <select class="col-sm-8 form-control" name="employee_id" id="employee_id">
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    @if($payroll->employee_id == $employee->id)
                        <option value="{{$employee->id}}" selected="selected">{{$employee->name}}</option>
                    @else
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endif
                @endforeach    
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="employer">Employer:</label>
            <select class="col-sm-8 form-control" name="employer_id" id="employer_id">
                <option value="">Select Employer</option>
                @foreach($employers as $employer)
                    @if($payroll->employer_id == $employer->id)
                        <option value="{{$employer->id}}" selected="selected">{{$employer->name}}</option>
                    @else
                        <option value="{{$employer->id}}">{{$employer->name}}</option>
                    @endif
                @endforeach    
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="joining_date">Joining date</label>
            <input type="date" name="joining_date" value="{{$payroll->joining_date}}" id="joining_date" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="leaving_date">Leavning date</label>
            <input type="date" name="leaving_date" value="{{$payroll->leaving_date}}" id="leaving_date" class="col-sm-8 form-control">
        </div>
        <button class="btn btn-primary" type="submit">Update Payroll</button>
    </form>
@endsection