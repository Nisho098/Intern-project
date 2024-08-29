@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('employees.create') }}" class="btn btn-success">Create User</a>
       
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             
        @foreach ($employees as $employee)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->number }}</td>
    <td>{{ $employee->address }}</td>
    <td>{{ $employee->email }}</td>
    <td>
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach

            
        </tbody>
    </table>
</div>
@endsection
