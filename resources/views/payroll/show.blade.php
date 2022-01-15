@extends('layouts.app')

@section('content')
    @if($payroll->count())
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                
            </div>
        @endif
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Employer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$payroll->id}}</td>
                            <td>
                            {{$payroll->Employee->name}}
                            </td>
                            <td>
                            {{$payroll->Employer->name}}
                            </td>
                            <td>
                                <a href="{{route('payroll.edit',$payroll->id)}}" class="btn btn-warning" role="button">Edit</a>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
            
        
    @else
        <div class="alert alert-danger">No Payroll found.</div>
    @endif
@endsection