@extends("Layout.layouttwo")
@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card overflow-hidden">

                    <div class="card-header border-0 pb-0">
                        <div class="w-100">
                         <img
    src="{{ $user->banner_image_url }}"
    alt="Profile Banner"
    class="img-fluid w-100 rounded"
    style="height: 320px; object-fit: cover;"
>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">

                            <div class="col-xl-1 col-lg-2 col-md-2 col-sm-3 text-center text-sm-start mb-3 mb-md-0">
                                <div class="profile-photo">
                              <img
    src="{{ $user->profile_image_url }}"
    class="img-fluid rounded-circle"
    alt="{{ $user->full_name }}"
    style="width: 80px; height: 80px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.12);"
>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-9 mb-3 mb-md-0">
                                <h3 class="mb-1 text-primary">
                                    {{ $user->full_name ?: 'N/A' }}
                                </h3>
                                <p class="mb-1 text-muted">
                                    {{ $user->organization ?: 'Organization not added' }}
                                </p>
                                <span class="text-secondary">
                                    {{ $user->gender ?: 'Profile User' }}
                                </span>
                            </div>

                            <div class="col-xl-4 col-lg-3 col-md-3 mb-3 mb-md-0">
                                <h4 class="mb-1">{{ $user->email ?: 'N/A' }}</h4>
                                <p class="mb-0 text-muted">Email</p>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 text-md-end text-start">
                                <button class="btn btn-light btn-sm rounded-circle px-3 py-2">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Profile Overview</h4>

                        <div class="mb-3">
                            <label class="text-muted d-block mb-1">Phone</label>
                            <strong>{{ $user->phone ?: ($user->mobile_phone ?: 'N/A') }}</strong>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted d-block mb-1">Mobile Phone</label>
                            <strong>{{ $user->mobile_phone ?: 'N/A' }}</strong>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted d-block mb-1">Date of Birth</label>
                            <strong>{{ $user->date_of_birth ?: 'N/A' }}</strong>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted d-block mb-1">Gender</label>
                            <strong>{{ $user->gender ?: 'N/A' }}</strong>
                        </div>

                        <div class="mb-3">
                            <label class="text-muted d-block mb-1">Organization</label>
                            <strong>{{ $user->organization ?: 'N/A' }}</strong>
                        </div>

                        <div class="mb-0">
                            <label class="text-muted d-block mb-1">Role ID</label>
                            <strong>{{ $user->role_id ?: 'N/A' }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="card-title">About Me</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">First Name</label>
                                <strong>{{ $user->firstname ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Last Name</label>
                                <strong>{{ $user->lastname ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Email Address</label>
                                <strong>{{ $user->email ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Country</label>
                                <strong>{{ $user->country ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">City</label>
                                <strong>{{ $user->city ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Zip Code</label>
                                <strong>{{ $user->zip_code ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Address Line 1</label>
                                <strong>{{ $user->address_line1 ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="text-muted d-block mb-1">Address Line 2</label>
                                <strong>{{ $user->address_line2 ?: 'N/A' }}</strong>
                            </div>

                            <div class="col-md-12">
                                <label class="text-muted d-block mb-1">Location</label>
                                <strong>
                                    {{ $user->city ?: '' }}
                                    @if($user->city && $user->country), @endif
                                    {{ $user->country ?: 'N/A' }}
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection