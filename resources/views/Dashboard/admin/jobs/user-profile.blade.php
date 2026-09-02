@extends("Layout.layouttwo")
@section("AdminContent")
<div class="content-body">

    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4">
            <h3 class="me-auto">User Profile</h3>
            <div>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-envelope"></i></a>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
                <a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 flex-wrap align-items-start">
                        <div class="col-md-8">
                            <div class="user d-sm-flex d-block pe-md-5 pe-0">
                                <img
                                    src="{{ !empty($user->profile_img) ? asset('uploads/users/' . $user->profile_img) : asset('Dashboard_assets/images/profile/pic1.jpg') }}"
                                    alt="{{ trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) }}"
                                    style="width:90px; height:90px; object-fit:cover; border-radius:12px;"
                                >

                                <div class="ms-sm-3 ms-0 me-md-5 md-0">
                                    <h5 class="mb-1">
                                        <a href="javascript:void(0);" class="text-dark">
                                            {{ trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) ?: 'N A' }}
                                        </a>
                                    </h5>

                                    <div class="listline-wrapper mb-2">
                                        <span class="item">
                                            <i class="text-primary far fa-envelope"></i>
                                            {{ $user->email ?? 'N A' }}
                                        </span>

                                        <span class="item">
                                            <i class="text-primary far fa-id-badge"></i>
                                            @if($user->role_id == 1)
                                                Admin
                                            @elseif($user->role_id == 3)
                                                Company
                                            @elseif($user->role_id == 2)
                                                User
                                            @else
                                                N A
                                            @endif
                                        </span>

                                        <span class="item">
                                            <i class="text-primary fas fa-map-marker-alt"></i>
                                            {{ $user->country ?? 'N A' }}
                                        </span>
                                    </div>

                                    <p>{{ $user->organization ?: 'No organization details added yet.' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 text-end">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary me-2">Profile</a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-info">Contact</a>

                            <div class="mt-3">
                                <h6 class="text-start">
                                    Profile Completion
                                    <span class="float-end">
                                        @php
                                            $fields = [
                                                $user->firstname,
                                                $user->lastname,
                                                $user->email,
                                                $user->phone,
                                                $user->mobile_phone,
                                                $user->gender,
                                                $user->date_of_birth,
                                                $user->city,
                                                $user->country,
                                                $user->zip_code,
                                                $user->address_line1,
                                                $user->address_line2,
                                                $user->organization,
                                                $user->profile_img,
                                            ];
                                            $filled = collect($fields)->filter(fn($value) => !empty($value))->count();
                                            $total = count($fields);
                                            $percent = $total > 0 ? round(($filled / $total) * 100) : 0;
                                        @endphp
                                        {{ $percent }}%
                                    </span>
                                </h6>

                                <div class="progress">
                                    <div class="progress-bar bg-danger progress-animated"
                                         style="width: {{ $percent }}%; height:6px;"
                                         role="progressbar">
                                        <span class="sr-only">{{ $percent }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <h4 class="card-title">Description</h4>

                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <ul class="list-style-1">
                                    <li><label class="custom-label-2 mb-0">Full Name :</label>{{ trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Resume Title :</label>{{ $user->organization ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Current Designation :</label>
                                        @if($user->role_id == 1)
                                            Admin
                                        @elseif($user->role_id == 3)
                                            Company
                                        @elseif($user->role_id == 2)
                                            User
                                        @else
                                            N A
                                        @endif
                                    </li>
                                    <li><label class="custom-label-2 mb-0">Annual Salary :</label>N A</li>
                                    <li><label class="custom-label-2 mb-0">Current Company :</label>{{ $user->organization ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Experience :</label>N A</li>
                                    <li><label class="custom-label-2 mb-0">Location :</label>{{ $user->country ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Preferred Location :</label>{{ $user->city ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Qualification :</label>N A</li>
                                    <li><label class="custom-label-2 mb-0">Key Skills :</label>N A</li>
                                </ul>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <ul class="list-style-1">
                                    <li><label class="custom-label-2 mb-0">Languages :</label>N A</li>
                                    <li><label class="custom-label-2 mb-0">Email :</label>{{ $user->email ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Phone :</label>{{ $user->phone ?: ($user->mobile_phone ?: 'N A') }}</li>
                                    <li><label class="custom-label-2 mb-0">Industry :</label>{{ $user->organization ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Date Of Birth :</label>{{ $user->date_of_birth ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Gender :</label>{{ $user->gender ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Marital Status :</label>N A</li>
                                    <li><label class="custom-label-2 mb-0">Permanent Address :</label>{{ $user->address_line1 ?: 'N A' }}</li>
                                    <li><label class="custom-label-2 mb-0">Zip code :</label>{{ $user->zip_code ?: 'N A' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center">
                        <div class="mb-md-2 mb-3 exp-del">
                            <span class="d-block mb-1">
                                <i class="fas fa-circle me-2 op4"></i>
                                Currently Working at <strong>{{ $user->organization ?: 'N A' }}</strong>
                            </span>
                            <span>
                                <i class="fas fa-circle me-2 op4"></i>
                                Based in <strong>{{ $user->city ?: 'N A' }}{{ $user->city && $user->country ? ', ' : '' }}{{ $user->country ?: '' }}</strong>
                            </span>
                        </div>

                        <div>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm me-2 mb-1">
                                <i class="fas fa-download me-2"></i>Download Resume
                            </a>
                            <a href="javascript:void(0);" class="btn btn-warning btn-sm me-2 mb-1">
                                <i class="fas fa-share-alt me-2"></i>Share Profile
                            </a>
                            <a href="javascript:void(0);" class="btn btn-info btn-sm me-2 mb-1">
                                <i class="fas fa-phone-alt me-2"></i>Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection