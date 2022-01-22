@extends('layouts.app')

@section('content')
    @if($payrolls->count())
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <div class="row my-2">
                <h2 class="col-md-6">All Payroll</h2>
                <form action="{{route('payroll_export')}}" class="col-md-6" action="post">
                    <button type="submit"class="btn btn-primary">export</button>
                </form>
            </div>
            <div class="row">
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
                        @foreach($payrolls as $payroll)
                            <tr>
                                <td>{{$payroll->id}}</td>
                                <td>{{$payroll->emps}}</td>
                                <td>{{$payroll->name}}</td>
                                <td>
                                    <a href="{{route('payroll.show', $payroll->id) }}" class="btn btn-success" role="button">View</a>
                                    <a href="{{route('payroll.edit', $payroll->id) }}" class="btn btn-warning" role="button">Edit</a>
                                    <form action="{{ route('payroll.destroy', $payroll->id)}}" method="post">  
                                        @csrf  
                                        @method('DELETE')  
                                    <button class="btn btn-danger my-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>  
                                    </form>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    @else
        <div class="alert alert-danger">No payroll found.</div>
    @endif
@endsection