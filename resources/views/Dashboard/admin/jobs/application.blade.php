
@extends("Layout.layouttwo")
@section("AdminContent")
            <div class="content-body">

<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Job Application</h3>
        <div>
            <a href="{{ route('Dashboard.admin.jobs.apply') }}" class="btn btn-primary me-3">
                <i class="fas fa-plus me-2"></i>Apply Job
            </a>
            <a href="javascript:void(0);" class="icon-btn me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Applied On</th>
                            <th>City</th>
                            <th>CV</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($applications as $index => $app)
                            <tr>
                                <td>{{ $applications->firstItem() + $index }}.</td>

                                <td class="wspace-no">
                                    {{ $app->job->position ?? 'N/A' }}
                                </td>

                                <td>{{ $app->full_name }}</td>
                                <td>{{ $app->email }}</td>
                                <td>{{ $app->phone ?? '-' }}</td>

                                <td>
                                    {{ $app->created_at ? $app->created_at->format('d-m-Y') : '-' }}
                                </td>

                                <td>{{ $app->city ?? '-' }}</td>

                                <td>
                                    @if($app->cv)
                                        <a class="text-warning" href="{{ asset('storage/'.$app->cv) }}" target="_blank" title="View CV">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="action-btn wspace-no text-end">
                                    <span>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#viewModal{{ $app->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </span>

                                    <span>
                                        <form action="{{ route('Dashboard.admin.job-applications.delete', $app->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this application?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent p-0">
                                                <i class="far fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                    </span>
                                </td>
                            </tr>

                            {{-- View Modal --}}
                            <div class="modal fade" id="viewModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Application Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row g-3">

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">Job Position</div>
                                                    <div>{{ $app->job->position ?? 'N/A' }}</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">Company</div>
                                                    <div>{{ $app->job->company_name ?? 'N/A' }}</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">Full Name</div>
                                                    <div>{{ $app->full_name }}</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">Email</div>
                                                    <div>{{ $app->email }}</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">Phone</div>
                                                    <div>{{ $app->phone ?? '-' }}</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="fw-semibold">City</div>
                                                    <div>{{ $app->city ?? '-' }}</div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="fw-semibold">Message</div>
                                                    <div class="border rounded p-2">
                                                        {{ $app->message ?? '-' }}
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="fw-semibold">CV</div>
                                                    @if($app->cv)
                                                        <a href="{{ asset('storage/'.$app->cv) }}" target="_blank">Open CV</a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    No applications found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection


{{-- @extends("Layout.layouttwo")
@section("AdminContent")

 <!-- row -->
			<div class="container-fluid">
				<div class="d-flex align-items-center mb-4 flex-wrap">
					<h3 class="me-auto">Job Application</h3>
					<div>
						<a href="{{ route('Dashboard.admin.jobs.new-job') }}" class="btn btn-primary me-3"><i class="fas fa-plus me-2"></i>Add New Job</a>
						<a href="javascript:void(0);" class="icon-btn me-3"> <i class="fas fa-envelope"></i></a>
						<a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
						<a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive">
							<table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
								<thead>
									<tr>
										<th>No</th>
										<th>Position</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Applied On</th>
										<th>Submitted By</th>
										<th>Status</th>
										<th class="text-end">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td class="wspace-no">Database analyst</td>
										<td>Jordan</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Nicholas</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td class="wspace-no">Network architect</td>
										<td>Asher</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Dominic</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td class="wspace-no">Network architect</td>
										<td>Carter</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Austin</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td class="wspace-no">Systems analyst</td>
										<td>Grayson</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Everett</td>
										<td><span class="badge badge-danger light">Rejected</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>5.</td>
										<td class="wspace-no">Network engineer</td>
										<td>Thomas</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Brooks</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>6.</td>
										<td class="wspace-no">Service desk analyst</td>
										<td>Miles</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Wesley</td>
										<td><span class="badge badge-primary light">Selected</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>7.</td>
										<td>Network Engineer</td>
										<td>Adrian</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Kayden</td>
										<td><span class="badge badge-success light">Success</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>


									<tr>
										<td>8.</td>
										<td class="wspace-no">Database analyst</td>
										<td>Jordan</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Nicholas</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>9.</td>
										<td class="wspace-no">Network architect</td>
										<td>Asher</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Dominic</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>10.</td>
										<td class="wspace-no">Network architect</td>
										<td>Carter</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Austin</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>11.</td>
										<td class="wspace-no">Systems analyst</td>
										<td>Grayson</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Everett</td>
										<td><span class="badge badge-danger light">Rejected</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>12.</td>
										<td class="wspace-no">Network engineer</td>
										<td>Thomas</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Brooks</td>
										<td><span class="badge badge-warning light">Pending</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>13.</td>
										<td class="wspace-no">Service desk analyst</td>
										<td>Miles</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Wesley</td>
										<td><span class="badge badge-primary light">Selected</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
									<tr>
										<td>14.</td>
										<td>Network Engineer</td>
										<td>Adrian</td>
										<td>Jordan@gmail.com</td>
										<td>1234598765</td>
										<td>24-01-2023</td>
										<td>Kayden</td>
										<td><span class="badge badge-success light">Success</span></td>
										<td class="action-btn wspace-no">
											<span>
												<a href="javascript:void(0);"><i class="fas fa-check text-success"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-times text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-eye"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="far fa-trash-alt text-danger"></i></a>
											</span>
											<span>
												<a href="javascript:void(0);"><i class="fas fa-download text-warning"></i></a>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
@endsection --}}
