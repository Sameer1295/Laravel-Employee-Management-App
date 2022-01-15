@extends('layouts.app')

@section('content')
    @if($employer->count())
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                
            </div>
        @endif
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile no</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$employer->id}}</td>
                            <td>{{$employer->name}}</td>
                            <td>{{$employer->address}}</td>
                            <td>{{$employer->mobile_number}}</td>
                            <td>
                                <a href="{{route('employer.edit',$employer->id)}}" class="btn btn-warning" role="button">Edit</a>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
            
        
    @else
        <div class="alert alert-danger">No employees found.</div>
    @endif
@endsection