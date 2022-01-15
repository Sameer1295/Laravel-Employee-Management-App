@extends('layouts.app')

@section('content')
    <h2>Update Employers</h2>
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
    <form action="{{ route('employer.update',$employer->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="name">Employee Name</label>
            <input type="text" name="name" value="{{$employer->name}}" id="name" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" value="{{$employer->mobile_number}}" id="mobile_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="address">Employer Address</label>
            <textarea name="address" id="address" cols="10" rows="3" class="col-sm-8 form-control">{{$employer->address}}</textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="pf_number">PF Number</label>
            <input type="text" name="pf_number" value="{{$employer->pf_number}}" id="pf_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="esic_number">ESIC Number</label>
            <input type="text" name="esic_number" value="{{$employer->esic_number}}" id="esic_number" class="col-sm-8 form-control">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="gst_number">GST Number</label>
            <input type="text" name="gst_number" value="{{$employer->gst_number}}" id="gst_number" class="col-sm-8 form-control">
        </div>
        <button class="btn btn-warning" type="submit">update</button>    
    </form>
@endsection