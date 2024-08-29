@extends("backend.dashboard.layouts.app")

@section("content")
<div class="container mt-5">
    @if(Session::has("success"))
        <div class="alert alert-success">
            {{ Session::get("success") }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #6c757d; color: #fff;">
                    <h3 class="mb-0">Edit User</h3>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('employees.update', $employees->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="employee_id" value="{{ $employees->id }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required value="{{ $employees->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="number" class="form-control" id="number" name="number" placeholder="Enter number " required value="{{ $employees->number }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address " required value="{{ $employees->address }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required value="{{ $employees->email }}">
                        </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
