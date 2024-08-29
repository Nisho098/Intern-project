@extends("backend.dashboard.layouts.app")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #6c757d; color: #fff;">
                    <h3 class="mb-0">Add New Designation</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('designations.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="designationTitle" class="form-label">Designation Title</label>
                            <input type="text" class="form-control" id="designationTitle" name="title" placeholder="Enter Designation Title" required>
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter Salary" required>
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