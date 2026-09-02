@extends("Layout.layouttwo")
@section("AdminContent")
<div class="content-body">

    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4">
            <h3 class="mb-0 me-auto">Edit Company</h3>
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form action="{{ route('Dashboard.admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">User<span class="text-danger scale5 ms-2">*</span></label>
                                    <select name="user_id" class="nice-select default-select wide form-control" required>
                                        <option value="">Select User</option>
                                        @foreach($users as $user)
                                          <option value="{{ $user->id }}" @selected(old('user_id', $company->user_id) == $user->id)>
    {{ $user->firstname }} {{ $user->lastname }} | {{ $user->email }} | {{ $user->role->role_name ?? 'No Role' }}
</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Company Name<span class="text-danger scale5 ms-2">*</span></label>
                                    <input type="text" name="company_name" value="{{ old('company_name', $company->company_name) }}" class="form-control" placeholder="Company Name" required>
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control" placeholder="Email">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="form-control" placeholder="Phone">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" value="{{ old('website', $company->website) }}" class="form-control" placeholder="Website">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Industry</label>
                                    <input type="text" name="industry" value="{{ old('industry', $company->industry) }}" class="form-control" placeholder="Industry">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Company Size</label>
                                    <input type="text" name="company_size" value="{{ old('company_size', $company->company_size) }}" class="form-control" placeholder="Company Size">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" value="{{ old('country', $company->country) }}" class="form-control" placeholder="Country">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" value="{{ old('city', $company->city) }}" class="form-control" placeholder="City">
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Status<span class="text-danger scale5 ms-2">*</span></label>
                                    <select name="status" class="nice-select default-select wide form-control" required>
                                        <option value="active" @selected(old('status', $company->status) == 'active')>Active</option>
                                        <option value="inactive" @selected(old('status', $company->status) == 'inactive')>Inactive</option>
                                    </select>
                                </div>

                                <div class="col-xl-12 mb-4">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="4" placeholder="Address">{{ old('address', $company->address) }}</textarea>
                                </div>

                                <div class="col-xl-12 mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="6" placeholder="Description">{{ old('description', $company->description) }}</textarea>
                                </div>

                                <div class="col-xl-6 col-md-6 mb-4">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                @if($company->logo)
                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <label class="form-label">Current Logo</label>
                                        <div>
                                            <img src="{{ asset('uploads/companies/' . $company->logo) }}" alt="Company Logo" width="90" class="img-fluid rounded">
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div>
                                <a href="{{ route('Dashboard.admin.companies.index') }}" class="btn btn-danger light me-3">Close</a>
                                <button type="submit" class="btn btn-primary">Update Company</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection