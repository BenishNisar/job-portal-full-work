@extends("Layout.layouttwo")
@section("AdminContent")
<div class="content-body">
    <div class="container-fluid">
        <div class="d-flex align-items-center mb-4 flex-wrap">
            <h3 class="me-auto">Job List</h3>
            <div>
                <a href="{{ route('Dashboard.admin.jobs.new-job') }}" class="btn btn-custom me-3 rounded-pill px-4 py-2 fw-bold text-white" style="background-color: var(--sparrow-green, #638D3F);">
                    <i class="fas fa-plus me-2"></i>Add New Job
                </a>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-envelope"></i></a>
                <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
                <a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table align-middle" id="example5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Position</th>
                                <th>Type</th>
                                @if(Auth::user()->role_id == 1)
                                    <th>Approval</th>
                                @endif
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($jobs as $index => $job)
                                <tr>
                                    <td>{{ $jobs->firstItem() + $index }}</td>
                                    <td class="fw-bold" style="color: var(--sparrow-dark, #3C4A4F);">{{ $job->position }}</td>
                                    <td class="wspace-no"><span class="badge bg-light text-secondary border rounded-pill px-3 py-1">{{ $job->job_type ?? 'N/A' }}</span></td>

                                    @if(Auth::user()->role_id == 1)
                                        <td style="min-width: 170px;">
                                            <form action="{{ route('Dashboard.admin.jobs.approval.update', $job->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="approval_status" class="form-control rounded-pill px-3 py-1.5" onchange="this.form.submit()">
                                                    <option value="pending" {{ $job->approval_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="approved" {{ $job->approval_status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="rejected" {{ $job->approval_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                </select>
                                            </form>
                                        </td>
                                    @endif

                                    <td class="text-end">
                                        <div class="action-buttons d-flex justify-content-end align-items-center gap-2">
                                            <!-- View Button -->
                                            <a href="{{ route('Dashboard.admin.jobs.view', $job->id) }}" class="btn btn-sm btn-icon rounded-circle text-success bg-success-subtle p-2" title="View" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('Dashboard.admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-icon rounded-circle text-primary bg-primary-subtle p-2" title="Edit" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <!-- Delete Form -->
                                            <form action="{{ route('Dashboard.admin.jobs.delete', $job->id) }}" method="POST" class="mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-icon rounded-circle text-danger bg-danger-subtle p-2 border-0" title="Delete" onclick="return confirm('Are you sure you want to delete this job?')" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ Auth::user()->role_id == 1 ? 5 : 4 }}" class="text-center py-4">
                                        No jobs found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection