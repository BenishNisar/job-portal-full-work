@extends("Layout.layouttwo")

@section("AdminContent")
<div class="content-body">

    <div class="container-fluid">

        <div class="d-flex align-items-center mb-4">
            <h3 class="mb-0 me-auto">New Role</h3>
            <div>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-envelope"></i></a>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
                <a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form action="{{ route('Dashboard.admin.roles.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">
                                        Role Name
                                        <span class="text-danger scale5 ms-2">*</span>
                                    </label>
                                    <input type="text"
                                           name="role_name"
                                           value="{{ old('role_name') }}"
                                           class="form-control"
                                           placeholder="Enter Role Name">
                                    @error('role_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div>
                                <a href="{{ url('dashboard/roles') }}" class="btn btn-danger light me-3">Close</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
