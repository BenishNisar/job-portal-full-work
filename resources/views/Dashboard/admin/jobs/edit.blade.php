@extends("Layout.layouttwo")
@section("AdminContent")
            <div class="content-body">

<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h3 class="mb-0 me-auto">Edit Job</h3>
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

                <form action="{{ route('Dashboard.admin.jobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">

{{--
@if(Auth::user()->role_id == 1)
    <div class="col-xl-6 col-md-6 mb-4">
        <label class="form-label">Company Name<span class="text-danger scale5 ms-2">*</span></label>
        <select name="company_id" class="form-control">
            <option value="">Choose Company...</option>
            @foreach($companies as $companyItem)
                <option value="{{ $companyItem->id }}" @selected(old('company_id', $job->company_id) == $companyItem->id)>
                    {{ $companyItem->company_name }}
                </option>
            @endforeach
        </select>
    </div>
@elseif(Auth::user()->role_id == 3)
    <div class="col-xl-6 col-md-6 mb-4">
        <label class="form-label">Company Name</label>
        <input type="text" class="form-control" value="{{ $company->company_name ?? '' }}" readonly>
        <input type="hidden" name="company_id" value="{{ $company->id ?? '' }}">
    </div>
@endif --}}
                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Position<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="position" value="{{ old('position', $job->position) }}" class="form-control" placeholder="Position">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Job Category<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="job_category" class="nice-select default-select wide form-control">
                                    <option value="">Choose...</option>
                                    <option value="QA Analyst" @selected(old('job_category', $job->job_category) == 'QA Analyst')>QA Analyst</option>
                                    <option value="IT Manager" @selected(old('job_category', $job->job_category) == 'IT Manager')>IT Manager</option>
                                    <option value="Systems Analyst" @selected(old('job_category', $job->job_category) == 'Systems Analyst')>Systems Analyst</option>
                                </select>
                            </div>

                            {{-- <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Job Type<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="job_type" class="nice-select default-select wide form-control">
                                    <option value="">Choose...</option>
                                    <option value="Part Time" @selected(old('job_type', $job->job_type) == 'Part Time')>Part Time</option>
                                    <option value="Full Time" @selected(old('job_type', $job->job_type) == 'Full Time')>Full Time</option>
                                    <option value="Freelancer" @selected(old('job_type', $job->job_type) == 'Freelancer')>Freelancer</option>
                                </select>
                            </div> --}}
<div class="col-xl-6 col-md-6 mb-4">

    <label class="form-label">
        Job Type<span class="text-danger scale5 ms-2">*</span>
    </label>

    <select name="job_type" class="nice-select default-select wide form-control">

        <option value="">Choose...</option>

        <option value="Full Time"
        @selected(old('job_type', $job->job_type) == 'Full Time')>
            Full Time
        </option>

        <option value="Part Time"
        @selected(old('job_type', $job->job_type) == 'Part Time')>
            Part Time
        </option>

        <option value="Remote Work"
        @selected(old('job_type', $job->job_type) == 'Remote Work')>
            Remote Work
        </option>

    </select>

</div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">No. of Vacancy<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="vacancy" value="{{ old('vacancy', $job->vacancy) }}" class="form-control" placeholder="Vacancy">
                            </div>

                            {{-- <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Select Experience<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="experience" class="nice-select default-select wide form-control">
                                    <option value="1 yr" @selected(old('experience', $job->experience) == '1 yr')>1 yr</option>
                                    <option value="2 yr" @selected(old('experience', $job->experience) == '2 yr')>2 yr</option>
                                    <option value="3 yr" @selected(old('experience', $job->experience) == '3 yr')>3 yr</option>
                                    <option value="4 yr" @selected(old('experience', $job->experience) == '4 yr')>4 yr</option>
                                </select>
                            </div> --}}
                            <div class="col-xl-6 col-md-6 mb-4">
    <label class="form-label">
        Select Experience<span class="text-danger scale5 ms-2">*</span>
    </label>

    <select name="experience" class="nice-select default-select wide form-control">

        <option value="">Choose...</option>

        <option value="Entry / Graduate"
            @selected(old('experience', $job->experience) == 'Entry / Graduate')>
            Entry / Graduate
        </option>

        <option value="Intermediate"
            @selected(old('experience', $job->experience) == 'Intermediate')>
            Intermediate
        </option>

        <option value="Professional / Senior"
            @selected(old('experience', $job->experience) == 'Professional / Senior')>
            Professional / Senior
        </option>

    </select>
</div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Posted Date<span class="text-danger scale3 ms-2">*</span></label>
                                <div class="input-hasicon">
                                    <input type="date" name="posted_date" value="{{ old('posted_date', $job->posted_date) }}" class="form-control">
                                    <div class="icon"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Last Date To Apply<span class="text-danger scale3 ms-2">*</span></label>
                                <div class="input-hasicon">
                                    <input type="date" name="last_date_to_apply" value="{{ old('last_date_to_apply', $job->last_date_to_apply) }}" class="form-control">
                                    <div class="icon"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Close Date<span class="text-danger scale3 ms-2">*</span></label>
                                <div class="input-hasicon">
                                    <input type="date" name="close_date" value="{{ old('close_date', $job->close_date) }}" class="form-control">
                                    <div class="icon"><i class="far fa-calendar"></i></div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Select Gender<span class="text-danger scale5 ms-2">*</span></label>
                                <select name="gender" class="nice-select default-select wide form-control">
                                    <option value="">Choose...</option>
                                    <option value="Male" @selected(old('gender', $job->gender) == 'Male')>Male</option>
                                    <option value="Female" @selected(old('gender', $job->gender) == 'Female')>Female</option>
                                </select>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Salary From<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="salary_from" value="{{ old('salary_from', $job->salary_from) }}" class="form-control" placeholder="$">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Salary To<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="salary_to" value="{{ old('salary_to', $job->salary_to) }}" class="form-control" placeholder="$">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Enter City<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="city" value="{{ old('city', $job->city) }}" class="form-control" placeholder="City">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Enter State<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="state" value="{{ old('state', $job->state) }}" class="form-control" placeholder="State">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Enter Country<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="country" value="{{ old('country', $job->country) }}" class="form-control" placeholder="Country">
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label">Enter Education Level<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="education_level" value="{{ old('education_level', $job->education_level) }}" class="form-control" placeholder="Education Level">
                            </div>

                            <div class="col-xl-12 mb-4">
                                <label class="form-label">Short Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea name="description" class="form-control editor-short" rows="6">{{ old('description', $job->description) }}</textarea>
                            </div>

                            <div class="col-xl-12 mb-4">
                                <label class="form-label">Long Description<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea name="long_description" class="form-control editor-long" rows="10">{{ old('long_description', $job->long_description) }}</textarea>
                            </div>

                        </div>



<div class="mb-4">

    <label class="form-label">
        Allow Job Applications:
    </label>


    <div class="form-check form-check-inline">

        <input
            class="form-check-input"
            type="radio"
            name="allow_application"
            value="1"
            @checked(old('allow_application', $job->allow_application) == 1)
        >

        <label class="form-check-label">
            Yes
        </label>

    </div>



    <div class="form-check form-check-inline">

        <input
            class="form-check-input"
            type="radio"
            name="allow_application"
            value="0"
            @checked(old('allow_application', $job->allow_application) == 0)
        >

        <label class="form-check-label">
            No
        </label>

    </div>

</div>



                        <div>
                            <label class="form-label me-3">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" @checked(old('status', $job->status) == 1)>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @checked(old('status', $job->status) == 0)>
                                <label class="form-check-label" for="inlineRadio2">In Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('Dashboard.admin.jobs.list') }}" class="btn btn-danger light me-3">Close</a>
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
    }
});
</script>
@endpush

@endsection
