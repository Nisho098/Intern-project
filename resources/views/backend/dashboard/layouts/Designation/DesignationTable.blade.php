@extends('backend.dashboard.layouts.app')

@section('content')
<div class="container mt-5">
    @if(Session::has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Designation List</h3>
                </div>

                <div class="card-body p-4">
                     Create Button 
                    <div class="mb-3">
                        <a href="{{ route('designations.create') }}" class="btn btn-success">Create New Designation</a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">Salary</th>
                               
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($designations as $designation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $designation->title }}</td>
                                    <td>{{ $designation->salary }}</td>
                                   
                                    <td>
                                        <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('designations.destroy', $designation->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Designations Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 