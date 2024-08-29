@extends("backend.dashboard.layouts.app")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #6c757d; color: #fff;">
                    <h3 class="mb-0">Add New Department</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="managerName" class="form-label">Manager Name</label>
                            <input type="text" class="form-control" id="managerName" name="managerName" placeholder="Enter Manager Name" required>
                        </div>

                       

                       
                       

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
