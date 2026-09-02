@extends('Layout.layouttwo')
@section('AdminContent')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Email</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Inbox</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-xxl-4 email-left-body">
                                <div class="mb-3 mt-4 mt-sm-0">
                                    <div class="p-0">
                                        <a href="javascript:void(0);" class="btn btn-primary btn-block">Application Inbox</a>
                                    </div>

                                    <div class="mail-list rounded mt-4">
                                        <a href="{{ route('Dashboard.admin.email.index') }}" class="list-group-item active">
                                            <i class="fa fa-inbox font-18 align-middle me-2"></i>
                                            Inbox
                                            <span class="badge badge-light badge-sm float-end">{{ $inboxCount }}</span>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                            <i class="fa fa-envelope font-18 align-middle me-2"></i>
                                            New
                                            <span class="badge badge-warning text-white badge-sm float-end">{{ $newCount }}</span>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                            <i class="fa fa-check-circle font-18 align-middle me-2"></i>
                                            Reviewed
                                            <span class="badge badge-success text-white badge-sm float-end">{{ $reviewedCount }}</span>
                                        </a>
                                    </div>

                                    <div class="mail-list rounded overflow-hidden mt-4">
                                        <div class="intro-title d-flex justify-content-between my-0">
                                            <h5>Categories</h5>
                                        </div>

                                        <a href="javascript:void(0);" class="list-group-item">
                                            <span class="icon-warning"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                            Job Applications
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                            <span class="icon-primary"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                            New Candidates
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item">
                                            <span class="icon-success"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                            Reviewed Profiles
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9 col-xxl-8">
                                <div>
                                    <div role="toolbar" class="toolbar ms-1 ms-sm-0 ms-xl-1 d-flex align-items-center">
                                        <div class="btn-group mb-1">
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </div>

                                        <div class="btn-group mb-1">
                                            <a href="{{ route('Dashboard.admin.email.index') }}" class="btn btn-primary light px-3">
                                                <i class="ti-reload"></i>
                                            </a>
                                        </div>

                                        <div class="btn-group mb-1">
                                            <button aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-primary px-3 light dropdown-toggle mx-2" type="button">
                                                More <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="javascript:void(0);" class="dropdown-item">Mark as Unread</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Add to Tasks</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Add Star</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Mute</a>
                                            </div>
                                        </div>

                                        <div class="email-tools-box">
                                            <i class="fa-solid fa-list-ul"></i>
                                        </div>

                                        <form method="GET" action="{{ route('Dashboard.admin.email.index') }}" class="d-none d-sm-block ms-auto">
                                            <div class="input-group search-area ms-auto w-100 d-sm-inline-flex d-none">
                                                <input type="text" name="search" class="form-control" placeholder="Search here" value="{{ $search }}">
                                                <span class="input-group-text">
                                                    <button type="submit" class="btn p-0 border-0 bg-transparent">
                                                        <i class="flaticon-381-search-2"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="email-list mt-3">
                                        @forelse($applications as $application)
                                            <div class="message {{ (int) $application->status === 0 ? 'unread' : '' }}">
                                                <div>
                                                    <div class="d-flex message-single">
                                                        <div class="ps-1 align-self-center">
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input mail-check" id="checkbox{{ $application->id }}">
                                                                <label class="form-check-label" for="checkbox{{ $application->id }}"></label>
                                                            </div>
                                                        </div>

                                                        <div class="ms-2">
                                                            <button class="border-0 bg-transparent align-middle p-0" type="button">
                                                                <i class="fa fa-star {{ (int) $application->status === 0 ? 'text-warning' : '' }}" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <a href="javascript:void(0);" class="col-mail col-mail-2">
                                                        <div class="subject">
                                                            {{ $application->full_name }}
                                                            &nbsp; | &nbsp;
                                                            {{ $application->email }}
                                                            &nbsp; | &nbsp;
                                                            {{ optional($application->job)->position ?? 'Job Application' }}
                                                            @if($application->city)
                                                                &nbsp; | &nbsp; {{ $application->city }}
                                                            @endif
                                                            @if($application->message)
                                                                &nbsp; | &nbsp; {{ \Illuminate\Support\Str::limit($application->message, 70) }}
                                                            @else
                                                                &nbsp; | &nbsp; No message provided by applicant.
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center py-5">
                                                <h5 class="mb-2">No emails found</h5>
                                                <p class="text-muted mb-0">No application messages are available right now.</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    @if($applications->lastPage() > 1)
                                        <div class="row mt-4">
                                            <div class="col-12 ps-3">
                                                <nav>
                                                    <ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg justify-content-center justify-content-xl-start">
                                                        @if ($applications->onFirstPage())
                                                            <li class="page-item page-indicator disabled">
                                                                <span class="page-link"><i class="la la-angle-left"></i></span>
                                                            </li>
                                                        @else
                                                            <li class="page-item page-indicator">
                                                                <a class="page-link" href="{{ $applications->previousPageUrl() }}"><i class="la la-angle-left"></i></a>
                                                            </li>
                                                        @endif

                                                        @for ($i = 1; $i <= $applications->lastPage(); $i++)
                                                            <li class="page-item {{ $applications->currentPage() == $i ? 'active' : '' }}">
                                                                <a class="page-link" href="{{ $applications->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endfor

                                                        @if ($applications->hasMorePages())
                                                            <li class="page-item page-indicator">
                                                                <a class="page-link" href="{{ $applications->nextPageUrl() }}"><i class="la la-angle-right"></i></a>
                                                            </li>
                                                        @else
                                                            <li class="page-item page-indicator disabled">
                                                                <span class="page-link"><i class="la la-angle-right"></i></span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkAll = document.getElementById('checkAll');
    const checkboxes = document.querySelectorAll('.mail-check');

    if (checkAll) {
        checkAll.addEventListener('change', function () {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = checkAll.checked;
            });
        });
    }
});
</script>

@endsection
