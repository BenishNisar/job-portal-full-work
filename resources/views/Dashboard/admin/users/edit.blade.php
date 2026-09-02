@extends("Layout.layouttwo")

@section("AdminContent")
<div class="content-body">

<div class="container-fluid">

    <div class="d-flex align-items-center mb-4">
        <h3 class="mb-0 me-auto">Edit User</h3>
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
                <form action="{{ route('Dashboard.admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">First Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="firstname" value="{{ old('firstname', $user->firstname) }}" class="form-control" placeholder="First Name">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Last Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" class="form-control" placeholder="Last Name">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Email<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email Address">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Phone<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" placeholder="Phone Number">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Mobile Phone</label>
                                <input type="text" name="mobile_phone" value="{{ old('mobile_phone', $user->mobile_phone) }}" class="form-control" placeholder="Mobile Phone">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Gender<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="gender" class="nice-select default-select wide form-control">
                                    <option value="" selected>Choose...</option>
                                    <option value="male" @selected(old('gender', $user->gender) == 'male')>Male</option>
                                    <option value="female" @selected(old('gender', $user->gender) == 'female')>Female</option>
                                    <option value="other" @selected(old('gender', $user->gender) == 'other')>Other</option>
                                </select>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" class="form-control">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">City<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="city" value="{{ old('city', $user->city) }}" class="form-control" placeholder="City">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Country<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="country" value="{{ old('country', $user->country) }}" class="form-control" placeholder="Country">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Zip Code<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="zip_code" value="{{ old('zip_code', $user->zip_code) }}" class="form-control" placeholder="Zip Code">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Organization</label>
                                <input type="text" name="organization" value="{{ old('organization', $user->organization) }}" class="form-control" placeholder="Organization">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Address Line 1</label>
                                <input type="text" name="address_line1" value="{{ old('address_line1', $user->address_line1) }}" class="form-control" placeholder="Address Line 1">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" name="address_line2" value="{{ old('address_line2', $user->address_line2) }}" class="form-control" placeholder="Address Line 2">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_img" class="form-control">
                                @if(!empty($user->profile_img))
                                    <small class="d-block mt-2">Current: {{ $user->profile_img }}</small>
                                @endif
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Role<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="role_id" class="nice-select default-select wide form-control">
                                    <option value="" selected>Choose Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-xl-12 mb-4">
                            <label class="form-label">Status:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" @checked(old('status', $user->status ?? '1') == '1')>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @checked(old('status', $user->status ?? '1') == '0')>
                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('Dashboard.admin.users.index') }}" class="btn btn-danger light me-3">Close</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.tinymce) {
        tinymce.init({
            selector: 'textarea.editor-short',
            height: 250,
            menubar: true,
            plugins: 'lists link table code preview wordcount',
            toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link table | removeformat | code preview'
        });

        tinymce.init({
            selector: 'textarea.editor-long',
            height: 420,
            menubar: true,
            plugins: 'lists link image table code preview wordcount',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | removeformat | code preview'
        });
    } else {
        console.log('TinyMCE not loaded');
    }
});
</script>
@endpush

@endsection
