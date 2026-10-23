@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    :root {
        --brand-primary: #638d3f;
        --brand-primary-hover: #517533;
        --brand-primary-light: #7ca954;
        --brand-primary-soft: rgba(99, 141, 63, 0.12);
        --brand-primary-glow: rgba(99, 141, 63, 0.22);
        --dark-card: #181d19;
        --text-dark: #1e293b;
        --text-muted: #64748b;
        --bg-glass: rgba(255, 255, 255, 0.85);
        --border-glass: rgba(255, 255, 255, 0.4);
    }

    body.dark-mode {
        background-color: #0f1410 !important;
        color: #f1f5f9 !important;
    }
    body.dark-mode .stat-card,
    body.dark-mode .custom-table-card,
    body.dark-mode .ai-rec-card,
    body.dark-mode .smart-alert-card,
    body.dark-mode .timeline-card {
        background: #181d19 !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
        color: #f1f5f9 !important;
    }
    body.dark-mode .stat-value,
    body.dark-mode .card-title,
    body.dark-mode .table td {
        color: #f1f5f9 !important;
    }
    body.dark-mode .table th,
    body.dark-mode .table thead.bg-light {
        background-color: #1f2620 !important;
        color: #94a3b8 !important;
    }
    body.dark-mode .table td {
        border-bottom-color: rgba(255, 255, 255, 0.05) !important;
    }

    .dashboard-header-bg {
        background: linear-gradient(135deg, #192218 0%, #253324 100%);
        border-radius: 20px;
        color: #ffffff;
        padding: 36px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(99, 141, 63, 0.25);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .dashboard-header-bg::before {
        content: "";
        position: absolute;
        top: -80px;
        right: -80px;
        width: 260px;
        height: 260px;
        background: radial-gradient(circle, var(--brand-primary-glow) 0%, rgba(99, 141, 63, 0) 70%);
        border-radius: 50%;
        z-index: 1;
    }

    .text-brand-accent {
        color: #8ac05d !important;
    }

    .stat-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 28px var(--brand-primary-glow);
        border-color: rgba(99, 141, 63, 0.35);
    }

    .stat-card .card-body {
        padding: 24px;
        position: relative;
        z-index: 2;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1.1;
        margin-bottom: 6px;
    }

    .stat-title {
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .stat-detail {
        font-size: 0.78rem;
        font-weight: 600;
        margin-top: 10px;
        display: inline-block;
    }
    .stat-detail.positive { color: #059669; }

    .custom-table-card {
        border-radius: 18px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.05);
        background: #ffffff;
    }

    .custom-table-card .card-header {
        background-color: transparent;
        border-bottom: 1px solid #f1f5f9;
        padding: 22px 26px;
    }

    .custom-table-card .card-title {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 1.1rem;
        margin: 0;
    }

    .table th {
        border-top: none;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.6px;
        padding: 14px 20px;
    }

    .table td {
        vertical-align: middle;
        font-weight: 500;
        color: #334155;
        padding: 16px 20px;
        border-bottom: 1px solid #f8fafc;
    }

    .btn-outline-brand {
        color: var(--brand-primary);
        border: 1.5px solid var(--brand-primary);
        background: transparent;
        font-weight: 600;
        font-size: 0.82rem;
        transition: all 0.2s ease;
    }

    .btn-outline-brand:hover {
        background-color: var(--brand-primary);
        color: #ffffff !important;
        box-shadow: 0 4px 12px var(--brand-primary-glow);
    }

    .avatar-circle {
        background: var(--brand-primary-soft);
        color: var(--brand-primary);
        font-weight: 700;
    }

    .badge-status-approved, .badge-active {
        background-color: rgba(16, 185, 129, 0.12);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }
    .badge-status-pending {
        background-color: rgba(245, 158, 11, 0.12);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.25);
    }
    .badge-status-rejected {
        background-color: rgba(239, 68, 68, 0.12);
        color: #dc2626;
        border: 1px solid rgba(239, 68, 68, 0.25);
    }

    @keyframes pulseGlow {
        0% { box-shadow: 0 0 0 0 rgba(138, 192, 93, 0.4); }
        70% { box-shadow: 0 0 0 12px rgba(138, 192, 93, 0); }
        100% { box-shadow: 0 0 0 0 rgba(138, 192, 93, 0); }
    }

    .ai-sparkle-badge {
        display: inline-flex;
        align-items: center;
        background: rgba(138, 192, 93, 0.15);
        color: #8ac05d;
        border: 1px solid rgba(138, 192, 93, 0.3);
        padding: 6px 14px;
        border-radius: 50rem;
        font-size: 0.8rem;
        font-weight: 600;
        animation: pulseGlow 2.5s infinite;
    }

    .ai-assistant-card {
        background: linear-gradient(135deg, rgba(25, 34, 24, 0.95), rgba(37, 51, 36, 0.95));
        border: 1px solid rgba(138, 192, 93, 0.3);
        border-radius: 16px;
        color: #ffffff;
        padding: 20px 24px;
    }

    .ai-rec-card {
        background: #ffffff;
        border: 1px solid rgba(99, 141, 63, 0.2);
        border-radius: 16px;
        padding: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }
    .ai-rec-card:hover {
        border-color: var(--brand-primary);
        box-shadow: 0 8px 22px var(--brand-primary-glow);
    }

    .funnel-step {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        position: relative;
        transition: all 0.2s ease;
    }
    .funnel-step:hover {
        background: var(--brand-primary-soft);
        border-color: var(--brand-primary);
    }
    body.dark-mode .funnel-step {
        background: #1f2620;
        border-color: rgba(255,255,255,0.08);
    }

    .floating-ai-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #638d3f, #82b554);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 10px 25px var(--brand-primary-glow);
        z-index: 1050;
        cursor: pointer;
        transition: transform 0.2s ease;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    .floating-ai-btn:hover {
        transform: scale(1.08);
    }
</style>

<div class="content-body">
    <div class="container-fluid px-3 px-md-4">

        <div class="dashboard-header-bg mb-4">
            <div class="row align-items-center position-relative z-index-2">
                <div class="col-lg-7 mb-3 mb-lg-0">
                    <h2 class="mb-1 fw-bold text-white fs-2">
                        Welcome back, <span class="text-brand-accent">{{ $user->firstname ?? 'Admin' }}{{ $isAdmin ? ' (Admin)' : '' }}</span> 👋
                    </h2>
                    <p class="mb-0 text-white-50 fs-6">Your recruitment performance overview powered by advanced AI insights.</p>
                </div>
                <div class="col-lg-5">
                    <div class="ai-assistant-card shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <div class="ai-sparkle-badge me-2">
                                <i class="fas fa-wand-magic-sparkles me-1"></i> Recruitment Insight
                            </div>
                        </div>
                        <p class="mb-0 text-white-50 small lh-sm">
                            "Your platform received <strong>{{ $totalApplications }}</strong> applications. Keep tracking candidate metrics to streamline your hiring workflow."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-end align-items-center mb-4 gap-2">
            <button id="darkModeToggle" class="btn btn-sm btn-outline-brand rounded-pill px-3 py-2">
                <i class="fas fa-moon me-1"></i> Dark Mode
            </button>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-brand rounded-pill px-3 py-2 position-relative" data-bs-toggle="dropdown">
                    <i class="fas fa-bell me-1"></i> Alerts
                    @if(($pendingJobsCount + $pendingApplicationsCount) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-sm p-3" style="width: 280px; border-radius: 12px;">
                    <h6 class="fw-bold mb-2 text-dark fs-7">Smart Notifications</h6>
                    <div class="small text-muted mb-2">• {{ $pendingApplicationsCount }} applications waiting for review</div>
                    <div class="small text-muted mb-2">• {{ $pendingJobsCount }} jobs pending approval</div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-brand rounded-pill px-3 py-2">
                <i class="fas fa-download me-1"></i> Export Report
            </button>
        </div>

        <div class="row g-3 g-md-4 mb-4">
            <div class="col-xl col-lg-4 col-md-6 col-sm-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="stat-value counter" data-target="{{ $activeJobs }}">0</div>
                        <div class="stat-title">Active Jobs</div>
                        <div class="stat-detail positive"><i class="fas fa-briefcase me-1"></i>Total: {{ $totalJobs }} Jobs</div>
                    </div>
                </div>
            </div>

            <div class="col-xl col-lg-4 col-md-6 col-sm-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="stat-value counter" data-target="{{ $totalApplications }}">0</div>
                        <div class="stat-title">Total Applications</div>
                        <div class="stat-detail positive"><i class="fas fa-users me-1"></i>Candidate Submissions</div>
                    </div>
                </div>
            </div>

            <div class="col-xl col-lg-4 col-md-6 col-sm-6">
             <div class="card stat-card h-100">
    <div class="card-body">
        <div class="stat-value counter" data-target="{{ $stats['jobViews'] }}">
            0
        </div>

        <div class="stat-title">
            Job Views
        </div>

        <div class="stat-detail text-muted">
            Candidate traffic
        </div>
    </div>
</div>
            </div>

            <div class="col-xl col-lg-4 col-md-6 col-sm-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="stat-value counter" data-target="{{ $shortlisted }}">0</div>
                        <div class="stat-title">Shortlisted</div>
                        <div class="stat-detail text-muted">Ready for final review</div>
                    </div>
                </div>
            </div>

            <div class="col-xl col-lg-4 col-md-6 col-sm-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="stat-value counter" data-target="{{ $successRate }}">0</div>
                        <div class="stat-title">Success Rate %</div>
                        <div class="stat-detail positive"><i class="fas fa-check me-1"></i>Successful placements</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-8">
                <div class="card custom-table-card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title">Recruitment Performance Overview (Applications per Day)</h4>
                    </div>
                    <div class="card-body">
                        <div style="height: 300px; width: 100%;">
                            <canvas id="recruitmentPerformanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card custom-table-card h-100">
                    <div class="card-header">
                        <h4 class="card-title">Smart Alerts</h4>
                    </div>
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="p-3 rounded-12 bg-light border-start border-4 border-warning">
                            <div class="fw-bold text-dark small mb-1">Pending Applications</div>
                            <p class="text-muted small mb-0">{{ $pendingApplicationsCount }} applications are waiting for initial screening review.</p>
                        </div>
                        <div class="p-3 rounded-12 bg-light border-start border-4 border-danger">
                            <div class="fw-bold text-dark small mb-1">Pending Jobs</div>
                            <p class="text-muted small mb-0">{{ $pendingJobsCount }} jobs are currently awaiting administrative approval.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="card custom-table-card">
                    <div class="card-header d-flex align-items-center flex-wrap gap-2">
                        <div class="ai-sparkle-badge me-2"><i class="fas fa-wand-magic-sparkles me-1"></i></div>
                        <h4 class="card-title">AI Hiring Recommendations</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            @forelse($aiRecommendations as $recJob)
                                <div class="col-md-6">
                                    <div class="ai-rec-card h-100">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
                                            <span class="fw-bold text-dark fs-6">🔥 {{ $recJob->position }}</span>
                                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">{{ $recJob->applications_count }} Applicants</span>
                                        </div>
                                        <p class="text-muted small mb-3">AI Recommendation: "High candidate engagement detected for this position. Review qualified applications promptly to secure top talent."</p>
                                        {{-- <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">Review Candidates</a> --}}
                                        <a href="{{ route('Dashboard.admin.jobs.application') }}"
   class="btn btn-sm btn-outline-brand rounded-pill px-3">
    Review Candidates
</a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-muted text-center py-3">No AI recommendations available at the moment.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-7">
                <div class="card custom-table-card h-100">
                    <div class="card-header">
                        <h4 class="card-title">Hiring Pipeline Funnel</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                            <div class="funnel-step">
                                <div class="d-flex justify-content-between fw-bold text-dark small mb-1">
                                    <span>Total Jobs</span>
                                    <span>{{ $totalJobs }}</span>
                                </div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 100%;"></div></div>
                            </div>
                            <div class="text-center text-muted small"><i class="fas fa-arrow-down"></i></div>
                            <div class="funnel-step">
                                <div class="d-flex justify-content-between fw-bold text-dark small mb-1">
                                    <span>Applications</span>
                                    <span>{{ $totalApplications }}</span>
                                </div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 75%;"></div></div>
                            </div>
                            <div class="text-center text-muted small"><i class="fas fa-arrow-down"></i></div>
                            <div class="funnel-step">
                                <div class="d-flex justify-content-between fw-bold text-dark small mb-1">
                                    <span>Shortlisted</span>
                                    <span>{{ $shortlisted }}</span>
                                </div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 45%;"></div></div>
                            </div>
                            <div class="text-center text-muted small"><i class="fas fa-arrow-down"></i></div>
                            <div class="funnel-step">
                                <div class="d-flex justify-content-between fw-bold text-dark small mb-1">
                                    <span>Selected</span>
                                    <span>{{ $selected }}</span>
                                </div>
                                <div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 25%;"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="card custom-table-card h-100">
                    <div class="card-header">
                        <h4 class="card-title">Live Activity Timeline</h4>
                    </div>
                    <div class="card-body">
                        <div class="timeline-feed d-flex flex-column gap-3">
                            @foreach($latestApplications as $app)
                                <div class="d-flex align-items-start border-bottom pb-3">
                                    <div class="avatar-circle rounded-circle me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($app->full_name ?? 'C', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark small">{{ $app->full_name ?? 'Candidate' }} applied for {{ $app->job->position  ?? 'a position' }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;"><i class="far fa-clock me-1"></i>{{ $app->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($latestJobs as $jobItem)
                                <div class="d-flex align-items-start border-bottom pb-3">
                                    <div class="avatar-circle rounded-circle me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background: rgba(5, 150, 105, 0.12); color: #059669;">JB</div>
                                    <div>
                                        <div class="fw-bold text-dark small">New vacancy posted: {{ $jobItem->title }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;"><i class="far fa-clock me-1"></i>{{ $jobItem->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="card custom-table-card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title">Top Performing Vacancies</h4>
                        <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">View All Vacancies</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">Job Title</th>
                                        <th>Applications</th>
                                        <th class="text-end pe-4">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($topJobs as $job)
                                        <tr>
                                            <td class="ps-4 fw-bold text-dark">{{ $job->position}}</td>
                                            <td>{{ $job->applications_count }} Applications</td>
                                            <td class="text-end pe-4">
                                                @php
                                                    $badgeClass = 'badge-status-pending';
                                                    if(strtolower($job->approval_status) == 'approved') $badgeClass = 'badge-active';
                                                    if(strtolower($job->approval_status) == 'rejected') $badgeClass = 'badge-status-rejected';
                                                @endphp
                                                <span class="badge rounded-pill {{ $badgeClass }} px-3 py-2">{{ ucfirst($job->approval_status) }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted">No vacancies found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="floating-ai-btn" id="floatingAiBtn" title="Ask AI Assistant">
    <i class="fas fa-robot"></i>
</div>


<div id="aiChatBox" style="
display:none;
position:fixed;
bottom:100px;
right:30px;
width:350px;
background:#fff;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,.2);
z-index:9999;
">

<div style="
background:#638d3f;
color:white;
padding:15px;
border-radius:15px 15px 0 0;
font-weight:bold;
">
🤖 AI Recruitment Assistant
</div>


<div id="aiMessages" style="
height:220px;
padding:15px;
overflow:auto;
font-size:14px;
">

Hello 👋
I can help you with recruitment data.

</div>


<div style="padding:10px">

<input
id="aiInput"
class="form-control"
placeholder="Ask about jobs...">


<button
onclick="askAI()"
class="btn btn-success mt-2 w-100">
Send
</button>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            if(document.body.classList.contains('dark-mode')) {
                darkModeToggle.innerHTML = '<i class="fas fa-sun me-1"></i> Light Mode';
            } else {
                darkModeToggle.innerHTML = '<i class="fas fa-moon me-1"></i> Dark Mode';
            }
        });

        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            let count = 0;
            const speed = target > 0 ? target / 50 : 1;
            const updateCount = () => {
                count += speed;
                if(count < target) {
                    counter.innerText = Math.ceil(count).toLocaleString();
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            updateCount();
        });

        const ctx = document.getElementById('recruitmentPerformanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [
                    {
                        label: 'Applications Received',
                        data: @json($chartValues),
                        borderColor: '#638d3f',
                        backgroundColor: 'rgba(99, 141, 63, 0.15)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                },
                scales: {
                    y: { grid: { color: 'rgba(0,0,0,0.04)' } },
                    x: { grid: { display: false } }
                }
            }
        });
    });


    // new aii
    document.getElementById('floatingAiBtn')
.addEventListener('click',function(){

    let chat = document.getElementById('aiChatBox');

    if(chat.style.display === "none")
    {
        chat.style.display="block";
    }
    else
    {
        chat.style.display="none";
    }

});

function askAI(){

let message = document.getElementById('aiInput').value;


fetch("{{ route('dashboard.ai.chat') }}",
{
method:"POST",

headers:{
'Content-Type':'application/json',
'X-CSRF-TOKEN':'{{ csrf_token() }}'
},


body:JSON.stringify({
message:message
})

})


.then(res=>res.json())

.then(data=>{


let chat=document.getElementById('aiMessages');


chat.innerHTML += 
`
<div style="margin-top:10px">
<b>You:</b> ${message}
</div>

<div style="margin-top:10px;color:#638d3f">
<b>AI:</b> ${data.message}
</div>
`;


document.getElementById('aiInput').value="";


});

}

</script>

@endsection
