@extends('Layout.layouttwo')
@section('AdminContent')

<style>
  :root{
    --dash-bg: #f6f8fb;
    --card: #ffffff;
    --text: #0f172a;
    --muted: #64748b;
    --line: rgba(15, 23, 42, 0.08);
    --shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    --shadow2: 0 8px 18px rgba(15, 23, 42, 0.07);
    --radius: 18px;
  }

  .cond-page{
    background: radial-gradient(900px 300px at 10% 0%, rgba(122,149,143,0.14), transparent 55%),
                radial-gradient(700px 260px at 90% 10%, rgba(186,224,219,0.25), transparent 55%),
                var(--dash-bg);
    padding: 22px 0 34px;
    min-height: calc(100vh - 120px);
  }

  .cond-shell{
    max-width: 1200px;
    margin: 0 auto;
  }

  .cond-top{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap: 16px;
    margin-bottom: 14px;
  }

  .cond-title{
    margin: 0;
    font-weight: 800;
    color: var(--text);
    letter-spacing: -0.3px;
  }

  .cond-sub{
    color: var(--muted);
    margin-top: 6px;
    font-size: 14px;
  }

  .cond-actions{
    display:flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .btn-soft{
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 10px 14px;
    font-weight: 600;
  }

  .btn-soft:hover{
    box-shadow: var(--shadow2);
    transform: translateY(-1px);
  }

  .glass-card{
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.9);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow:hidden;
  }

  .glass-head{
    padding: 16px 18px;
    border-bottom: 1px solid var(--line);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    background: linear-gradient(135deg, rgba(186,224,219,0.22), rgba(255,255,255,0.75));
  }

  .head-left{
    display:flex;
    align-items:center;
    gap: 12px;
  }

  .head-badge{
    width: 42px;
    height: 42px;
    border-radius: 14px;
    display:grid;
    place-items:center;
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.9);
  }

  .head-badge i{
    font-size: 18px;
    color: #0f172a;
    opacity: 0.9;
  }

  .head-meta{
    line-height: 1.1;
  }

  .head-meta strong{
    display:block;
    font-size: 15px;
    color: var(--text);
  }

  .head-meta span{
    display:block;
    margin-top: 4px;
    font-size: 13px;
    color: var(--muted);
  }

  .cond-body{
    padding: 18px;
  }

  .section-card{
    border: 1px solid var(--line);
    background: var(--card);
    border-radius: 16px;
    padding: 14px;
  }

  .section-title{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    margin-bottom: 12px;
  }

  .section-title .left{
    display:flex;
    align-items:center;
    gap: 10px;
  }

  .s-icon{
    width: 36px;
    height: 36px;
    border-radius: 12px;
    display:grid;
    place-items:center;
    border: 1px solid var(--line);
    background: rgba(122,149,143,0.08);
  }

  .s-icon i{
    font-size: 16px;
    color: #0f172a;
    opacity: 0.85;
  }

  .section-title h6{
    margin: 0;
    font-weight: 800;
    color: var(--text);
    letter-spacing: -0.2px;
  }

  .section-hint{
    font-size: 12px;
    color: var(--muted);
    margin: 2px 0 0;
  }

  .form-label{
    font-weight: 700;
    color: var(--text);
    margin-bottom: 6px;
  }

  .form-control, .form-select{
    border-radius: 12px;
    border-color: var(--line);
    padding: 12px 12px;
  }

  .form-control:focus, .form-select:focus{
    box-shadow: 0 0 0 4px rgba(186,224,219,0.35);
    border-color: rgba(122,149,143,0.45);
  }

  .helper{
    font-size: 12px;
    color: var(--muted);
    margin-top: 6px;
  }

  .mini-grid{
    display:grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
  }

  @media (max-width: 992px){
    .mini-grid{ grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 576px){
    .mini-grid{ grid-template-columns: 1fr; }
    .cond-top{ flex-direction: column; align-items: stretch; }
    .cond-actions{ justify-content: flex-start; }
  }

  .list-row{
    display:flex;
    gap: 10px;
    align-items:center;
    margin-bottom: 10px;
  }

  .icon-btn{
    width: 42px;
    height: 42px;
    border-radius: 12px;
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.9);
    display:grid;
    place-items:center;
    font-weight: 900;
    color: #0f172a;
  }

  .icon-btn:hover{
    box-shadow: var(--shadow2);
    transform: translateY(-1px);
  }

  .icon-btn.danger{
    background: rgba(239,68,68,0.06);
    border-color: rgba(239,68,68,0.22);
    color: #b91c1c;
  }

  .sticky-footer{
    position: sticky;
    bottom: 14px;
    z-index: 5;
    margin-top: 16px;
  }

  .footer-bar{
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 12px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    box-shadow: var(--shadow2);
  }

  .footer-left{
    display:flex;
    align-items:center;
    gap: 10px;
    color: var(--muted);
    font-size: 13px;
  }

  .pill{
    padding: 8px 10px;
    border-radius: 999px;
    border: 1px solid var(--line);
    background: rgba(186,224,219,0.22);
    color: #0f172a;
    font-weight: 700;
    font-size: 12px;
  }

  .footer-actions{
    display:flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .btn-primaryx{
    border-radius: 12px;
    padding: 10px 16px;
    font-weight: 800;
  }
  .btn-lightx{
    border-radius: 12px;
    padding: 10px 16px;
    border: 1px solid var(--line);
    background: rgba(255,255,255,0.85);
    font-weight: 700;
  }

  .alert{
    border-radius: 14px;
    border: 1px solid var(--line);
  }
</style>

<div class="cond-page">
  <div class="container-fluid px-3 px-lg-4">
    <div class="cond-shell">

      <div class="cond-top">
        <div>
          <h3 class="cond-title">Add Condition</h3>
          <div class="cond-sub">Create condition with dynamic causes, symptoms and rehab steps</div>
        </div>

        <div class="cond-actions">
          <a class="btn btn-soft" href="{{ url('dashboard/conditions') }}">
            <i class="fa-solid fa-arrow-left me-2"></i> Back
          </a>
        </div>
      </div>

      @if($errors->any())
        <div class="alert alert-danger">
          <div class="fw-bold mb-1"><i class="fa-solid fa-triangle-exclamation me-2"></i> Please fix the errors below</div>
          <ul class="mb-0">
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      @endif

<form method="POST" action="{{ route('Dashboard.admin.conditions.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="glass-card">
          <div class="glass-head">
            <div class="head-left">
              <div class="head-badge">
                <i class="fa-solid fa-notes-medical"></i>
              </div>
              <div class="head-meta">
                <strong>Condition Details</strong>
                <span>Fill basic info, stats, CTA and dynamic sections</span>
              </div>
            </div>

            <span class="pill">Dashboard Form</span>
          </div>

          <div class="cond-body">

            <div class="row g-3 mb-3">
              <div class="col-lg-6">
                <label class="form-label">Category</label>
                <select class="form-select" name="condition_category_id" id="condition_category_id" required>
                  <option value="">Select category</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
                <div class="helper">Select category first, then choose subcategory.</div>
              </div>

              <div class="col-lg-6">
                <label class="form-label">Subcategory</label>
                <select class="form-select" name="condition_subcategory_id" id="condition_subcategory_id" required disabled>
                  <option value="">Select subcategory</option>
                </select>
                <div class="helper">Subcategories auto load from selected category.</div>
              </div>
            </div>

            <div class="section-card mb-3">
              <div class="section-title">
                <div class="left">
                  <div class="s-icon"><i class="fa-solid fa-id-card-clip"></i></div>
                  <div>
                    <h6>Basic Information</h6>
                    <div class="section-hint">Title, slug, hero description and image</div>
                  </div>
                </div>
              </div>

              <div class="row g-3">
                <div class="col-lg-8">
                  <label class="form-label">Title</label>
                  <input class="form-control" name="title" required placeholder="e.g., Lower Back Pain">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">Slug</label>
                  <input class="form-control" name="slug" placeholder="auto generate if empty">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">Badge Text</label>
                  <input class="form-control" name="badge_text" placeholder="e.g., Musculoskeletal care">
                </div>

                <div class="col-lg-8">
                  <label class="form-label">Hero Description</label>
                  <input class="form-control" name="hero_description" placeholder="Short one line summary for hero area">
                </div>

                <div class="col-12">
                  {{-- <label class="form-label">Hero Image URL</label>
                  <input class="form-control" name="hero_image_url" placeholder="https://"> --}}
                  <label class="form-label">Hero Image</label>
<input type="file" class="form-control" name="hero_image" accept="image/png,image/jpeg,image/webp">
<div class="helper">Image will be saved in public/assets/images/conditions</div>

                </div>
              </div>
            </div>

            <div class="section-card mb-3">
              <div class="section-title">
                <div class="left">
                  <div class="s-icon"><i class="fa-solid fa-chart-simple"></i></div>
                  <div>
                    <h6>Quick Stats</h6>
                    <div class="section-hint">Shown on condition page highlights</div>
                  </div>
                </div>
              </div>

              <div class="mini-grid">
                <div>
                  <label class="form-label">Estimated Sessions</label>
                  <input class="form-control" name="estimated_sessions" value="4 to 8">
                </div>
                <div>
                  <label class="form-label">Stat One</label>
                  <input class="form-control" name="stat_one" value="Home">
                </div>
                <div>
                  <label class="form-label">Stat Two</label>
                  <input class="form-control" name="stat_two" value="Targeted">
                </div>
                <div>
                  <label class="form-label">Stat Three</label>
                  <input class="form-control" name="stat_three" value="Guided">
                </div>
              </div>
            </div>

            <div class="section-card mb-3">
              <div class="section-title">
                <div class="left">
                  <div class="s-icon"><i class="fa-solid fa-bullhorn"></i></div>
                  <div>
                    <h6>Call To Action</h6>
                    <div class="section-hint">CTA area that drives booking</div>
                  </div>
                </div>
              </div>

              <div class="row g-3">
                <div class="col-lg-4">
                  <label class="form-label">CTA Heading</label>
                  <input class="form-control" name="cta_heading" value="Book your session">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">CTA Text</label>
                  <input class="form-control" name="cta_text" placeholder="Short text under heading">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">CTA Button Text</label>
                  <input class="form-control" name="cta_button_text" value="Book Now">
                </div>

                <div class="col-12">
                  <label class="form-label">CTA Button Link</label>
                  <input class="form-control" name="cta_button_link" value="/submit-medical-history">
                </div>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-lg-4">
                <div class="section-card">
                  <div class="section-title">
                    <div class="left">
                      <div class="s-icon"><i class="fa-solid fa-bolt"></i></div>
                      <div>
                        <h6>What Causes This</h6>
                        <div class="section-hint">Add multiple causes</div>
                      </div>
                    </div>
                    <button type="button" class="icon-btn" data-add="causes" title="Add cause">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>

                  <div id="wrap-causes">
                    <div class="list-row">
                      <input class="form-control" name="causes[]" placeholder="Type cause">
                      <button type="button" class="icon-btn danger" data-remove title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="section-card">
                  <div class="section-title">
                    <div class="left">
                      <div class="s-icon"><i class="fa-solid fa-stethoscope"></i></div>
                      <div>
                        <h6>Symptoms</h6>
                        <div class="section-hint">Add multiple symptoms</div>
                      </div>
                    </div>
                    <button type="button" class="icon-btn" data-add="symptoms" title="Add symptom">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>

                  <div id="wrap-symptoms">
                    <div class="list-row">
                      <input class="form-control" name="symptoms[]" placeholder="Type symptom">
                      <button type="button" class="icon-btn danger" data-remove title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="section-card">
                  <div class="section-title">
                    <div class="left">
                      <div class="s-icon"><i class="fa-solid fa-road"></i></div>
                      <div>
                        <h6>Rehab Roadmap</h6>
                        <div class="section-hint">Step by step rehab plan</div>
                      </div>
                    </div>
                    <button type="button" class="icon-btn" data-add="roadmap" title="Add step">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>

                  <div id="wrap-roadmap">
                    <div class="list-row">
                      <input class="form-control" name="roadmap_steps[]" placeholder="Type step">
                      <button type="button" class="icon-btn danger" data-remove title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="section-card mt-3">
              <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                  <div class="fw-bold" style="color: var(--text);">Status</div>
                  <div class="helper mb-0">Disable to hide this condition from frontend.</div>
                </div>

                <div class="form-check form-switch m-0">
                  <input class="form-check-input" type="checkbox" name="is_active" checked id="is_active">
                  <label class="form-check-label fw-bold" for="is_active">Active</label>
                </div>
              </div>
            </div>

            <div class="sticky-footer">
              <div class="footer-bar">
                <div class="footer-left">
                  <span class="pill"><i class="fa-solid fa-shield-heart me-2"></i>Ready to save</span>
                  <span>Make sure category and subcategory are selected.</span>
                </div>

                <div class="footer-actions">
                  <button class="btn btn-success btn-primaryx">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save Condition
                  </button>
                  <a class="btn btn-lightx" href="{{ url('dashboard/conditions-categories/index') }}">
                    Cancel
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
  document.addEventListener('click', function(e){

    if(e.target.closest('[data-add]')){
      const btn = e.target.closest('[data-add]');
      const type = btn.dataset.add;

      let wrap, name, ph;

      if(type === 'causes'){ wrap='wrap-causes'; name='causes[]'; ph='Type cause'; }
      if(type === 'symptoms'){ wrap='wrap-symptoms'; name='symptoms[]'; ph='Type symptom'; }
      if(type === 'roadmap'){ wrap='wrap-roadmap'; name='roadmap_steps[]'; ph='Type step'; }

      const row = document.createElement('div');
      row.className = 'list-row';
      row.innerHTML = `
        <input class="form-control" name="${name}" placeholder="${ph}">
        <button type="button" class="icon-btn danger" data-remove title="Remove">
          <i class="fa-solid fa-xmark"></i>
        </button>
      `;
      document.getElementById(wrap).appendChild(row);
    }

    if(e.target.closest('[data-remove]')){
      const btn = e.target.closest('[data-remove]');
      const parent = btn.closest('.list-row');
      const wrap = parent.parentElement;

      if(wrap.children.length > 1) parent.remove();
      else parent.querySelector('input').value='';
    }

  });
</script>

<script>
  const categories = @json($categories);
  const catSelect = document.getElementById('condition_category_id');
  const subSelect = document.getElementById('condition_subcategory_id');

  function resetSub() {
    subSelect.innerHTML = '<option value="">Select subcategory</option>';
    subSelect.disabled = true;
  }

  function fillSub(categoryId) {
    const cat = categories.find(c => String(c.id) === String(categoryId));
    resetSub();

    if (!cat || !cat.subcategories || !cat.subcategories.length) return;

    cat.subcategories.forEach(sc => {
      const opt = document.createElement('option');
      opt.value = sc.id;
      opt.textContent = sc.name;
      subSelect.appendChild(opt);
    });

    subSelect.disabled = false;
  }

  catSelect.addEventListener('change', function () {
    fillSub(this.value);
  });
</script>

@endsection
