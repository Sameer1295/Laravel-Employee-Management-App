@extends('layouts.app')

@section('content')
    @if($employees->count())
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
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
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->designation}}</td>
                            <td>{{$employee->mobile_number}}</td>
                            <td>
                                <a href="{{route('employee.show', $employee->id) }}" class="btn btn-success" role="button">View</a>
                                <a href="{{route('employee.edit', $employee->id) }}" class="btn btn-warning" role="button">Edit</a>
                                <form action="{{ route('employee.destroy', $employee->id)}}" method="post">  
                                    @csrf  
                                    @method('DELETE')  
                                <button class="btn btn-danger my-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>  
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{route('employee_export')}}" action="post">
            <button type="submit"class="btn btn-primary">export</button>
            </form>
            
    @else
        <div class="alert alert-danger">No employees found.</div>
    @endif
@endsection