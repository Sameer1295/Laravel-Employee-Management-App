@extends('layouts.app')

@section('content')
    @if($employers->count())
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
                        <th scope="col">Address</th>
                        <th scope="col">Mobile no</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employers as $employer)
                        <tr>
                            <td>{{$employer->id}}</td>
                            <td>{{$employer->name}}</td>
                            <td>{{$employer->address}}</td>
                            <td>{{$employer->mobile_number}}</td>
                            <td>
                                <a href="{{route('employer.show', $employer->id) }}" class="btn btn-success" role="button">View</a>
                                <a href="{{route('employer.edit', $employer->id) }}" class="btn btn-warning" role="button">Edit</a>
                                <form action="{{ route('employer.destroy', $employer->id)}}" method="post">  
                                    @csrf  
                                    @method('DELETE')  
                                <button class="btn btn-danger my-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>  
                                </form>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{route('employer_export')}}" action="post">
            <button type="submit"class="btn btn-primary">export</button>
            </form>
        
    @else
        <div class="alert alert-danger">No employees found.</div>
    @endif
@endsection