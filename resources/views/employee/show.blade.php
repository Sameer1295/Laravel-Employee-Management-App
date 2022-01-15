@extends('layouts.app')

@section('content')
    @if($employee->count())
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                
            </div>
        @endif
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Mobile no</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->designation}}</td>
                            <td>{{$employee->mobile_number}}</td>
                            <td>
                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning" role="button">Edit</a>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
            
        
    @else
        <div class="alert alert-danger">No employees found.</div>
    @endif
@endsection