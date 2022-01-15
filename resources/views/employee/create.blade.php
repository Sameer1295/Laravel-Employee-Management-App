@extends('layouts.app')

@section('content')
    <h2>Add Employees</h2>
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
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="name">Employee Name</label>
            <input type="text" name="name" id="name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="gender">Employee Gender</label>
            <select class="col-sm-8 form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="0">Male</option>
                <option value="1">Female</option>    
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="designation">Employee designation</label>
            <input type="text" name="designation" id="designation" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="education">Employee education</label>
            <input type="text" name="education" id="education" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="email">Employee email</label>
            <input type="email" name="email" id="email" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" id="mobile_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="address">Present Address</label>
            <textarea name="present_address" id="present_address" cols="10" rows="3" class="col-sm-8 form-control"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="permanent_address">Permanent Address</label>
            <textarea name="permanent_address" id="permanent_address" cols="10" rows="3" class="col-sm-8 form-control"></textarea>
        </div>
        <div class="form-group row">
            <label for="date_of_birth" class="col-sm-3 col-form-label"> Date of Birth</label>
            <input class="col-sm-8 form-control" type="date" name="date_of_birth" id="date_of_birth">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="mother_name">Mother Name</label>
            <input type="text" name="mother_name" id="mother_name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="father_name">Father Name</label>
            <input type="text" name="father_name" id="father_name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="adhaar_number">Adhaar Number</label>
            <input type="text" name="adhaar_number" id="adhaar_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="pan_number">Pan Number</label>
            <input type="text" name="pan_number" id="pan_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="uan_number">UAN Number</label>
            <input type="text" name="uan_number" id="uan_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="esic_number">ESIC Number</label>
            <input type="text" name="esic_number" id="esic_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="blood_group">Blood group</label>
            <input type="text" name="blood_group" id="blood_group" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="body_mark">Body mark</label>
            <input type="text" name="body_mark" id="body_mark" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="branch_name">Branch Name</label>
            <input type="text" name="branch_name" id="branch_name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="account_number">Account number</label>
            <input type="text" name="account_number" id="account_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="ifsc_code">Ifsc Code</label>
            <input type="text" name="ifsc_code" id="ifsc_code" class="col-sm-8 form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>    
    </form>
@endsection