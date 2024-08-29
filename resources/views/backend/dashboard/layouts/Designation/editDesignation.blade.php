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
                    <h3 class="mb-0">Edit Designation</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('designations.update', $designation->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="designation_id" value="{{ $designation->id }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Designation Title" required value="{{ $designation->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary " required value="{{ $designation->salary }}">
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