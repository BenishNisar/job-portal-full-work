@extends('Layout.layouttwo')
@section('AdminContent')

@php
  $causes = is_array($condition->causes ?? null) ? $condition->causes : [];
  $symptoms = is_array($condition->symptoms ?? null) ? $condition->symptoms : [];
  $roadmap = is_array($condition->roadmap_steps ?? null) ? $condition->roadmap_steps : [];

  if(count($causes) === 0) $causes = [''];
  if(count($symptoms) === 0) $symptoms = [''];
  if(count($roadmap) === 0) $roadmap = [''];

  $selectedCategoryId = old('condition_category_id', $condition->condition_category_id);
  $selectedSubcategoryId = old('condition_subcategory_id', $condition->condition_subcategory_id);
@endphp

<div class="container py-4">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h3 class="mb-0 fw-bold">Edit Condition</h3>
      <small class="text-muted">Update condition with dynamic causes, symptoms and rehab steps</small>
    </div>
    <a class="btn btn-outline-secondary" href="{{ url('/dashboard/conditions') }}">Back</a>
  </div>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('Dashboard.admin.conditions.update', $condition->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">

        {{-- CATEGORY AND SUBCATEGORY --}}
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label class="fw-bold">Category</label>
            <select class="form-select" name="condition_category_id" id="condition_category_id" required>
              <option value="">Select category</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (string)$selectedCategoryId === (string)$cat->id ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label class="fw-bold">Subcategory</label>
            <select class="form-select" name="condition_subcategory_id" id="condition_subcategory_id" required>
              <option value="">Select subcategory</option>
            </select>
          </div>
        </div>

        {{-- BASIC INFO --}}
        <div class="row g-3 mb-4">
          <div class="col-md-8">
            <label class="fw-bold">Title</label>
            <input class="form-control" name="title" required value="{{ old('title', $condition->title) }}">
          </div>

          <div class="col-md-4">
            <label class="fw-bold">Slug</label>
            <input class="form-control" name="slug" placeholder="auto generate if empty" value="{{ old('slug', $condition->slug) }}">
          </div>

          <div class="col-md-4">
            <label class="fw-bold">Badge Text</label>
            <input class="form-control" name="badge_text" placeholder="Musculoskeletal care" value="{{ old('badge_text', $condition->badge_text) }}">
          </div>

          <div class="col-md-8">
            <label class="fw-bold">Hero Description</label>
            <input class="form-control" name="hero_description" value="{{ old('hero_description', $condition->hero_description) }}">
          </div>

          <div class="col-12">
            <label class="fw-bold">Hero Image</label>
            <input class="form-control" type="file" name="hero_image" accept="image/png,image/jpeg,image/webp">
            @if($condition->hero_image_url)
              <img src="{{ asset($condition->hero_image_url) }}" alt="Hero Image" class="mt-2" style="max-width: 250px;">
            @endif
          </div>
        </div>

        {{-- STATS --}}
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <label class="fw-bold">Estimated Sessions</label>
            <input class="form-control" name="estimated_sessions" value="{{ old('estimated_sessions', $condition->estimated_sessions) }}">
          </div>

          <div class="col-md-3">
            <label class="fw-bold">Stat One</label>
            <input class="form-control" name="stat_one" value="{{ old('stat_one', $condition->stat_one) }}">
          </div>

          <div class="col-md-3">
            <label class="fw-bold">Stat Two</label>
            <input class="form-control" name="stat_two" value="{{ old('stat_two', $condition->stat_two) }}">
          </div>

          <div class="col-md-3">
            <label class="fw-bold">Stat Three</label>
            <input class="form-control" name="stat_three" value="{{ old('stat_three', $condition->stat_three) }}">
          </div>
        </div>

        {{-- CTA --}}
        <div class="row g-3 mb-4">
          <div class="col-md-4">
            <label class="fw-bold">CTA Heading</label>
            <input class="form-control" name="cta_heading" value="{{ old('cta_heading', $condition->cta_heading) }}">
          </div>

          <div class="col-md-4">
            <label class="fw-bold">CTA Text</label>
            <input class="form-control" name="cta_text" value="{{ old('cta_text', $condition->cta_text) }}">
          </div>

          <div class="col-md-4">
            <label class="fw-bold">CTA Button Text</label>
            <input class="form-control" name="cta_button_text" value="{{ old('cta_button_text', $condition->cta_button_text) }}">
          </div>

          <div class="col-12">
            <label class="fw-bold">CTA Button Link</label>
            <input class="form-control" name="cta_button_link" value="{{ old('cta_button_link', $condition->cta_button_link) }}">
          </div>
        </div>

        {{-- DYNAMIC SECTIONS --}}
        <div class="row g-3">

          {{-- CAUSES --}}
          <div class="col-md-4">
            <div class="border rounded p-3">
              <div class="d-flex justify-content-between mb-2">
                <strong>What Causes This</strong>
                <button type="button" class="btn btn-sm btn-outline-primary" data-add="causes">Add</button>
              </div>

              <div id="wrap-causes">
                @foreach(old('causes', $causes) as $val)
                  <div class="d-flex gap-2 mb-2">
                    <input class="form-control" name="causes[]" placeholder="Type cause" value="{{ $val }}">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-remove>×</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          {{-- SYMPTOMS --}}
          <div class="col-md-4">
            <div class="border rounded p-3">
              <div class="d-flex justify-content-between mb-2">
                <strong>Symptoms</strong>
                <button type="button" class="btn btn-sm btn-outline-primary" data-add="symptoms">Add</button>
              </div>

              <div id="wrap-symptoms">
                @foreach(old('symptoms', $symptoms) as $val)
                  <div class="d-flex gap-2 mb-2">
                    <input class="form-control" name="symptoms[]" placeholder="Type symptom" value="{{ $val }}">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-remove>×</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          {{-- ROADMAP --}}
          <div class="col-md-4">
            <div class="border rounded p-3">
              <div class="d-flex justify-content-between mb-2">
                <strong>Rehab Roadmap</strong>
                <button type="button" class="btn btn-sm btn-outline-primary" data-add="roadmap">Add</button>
              </div>

              <div id="wrap-roadmap">
                @foreach(old('roadmap_steps', $roadmap) as $val)
                  <div class="d-flex gap-2 mb-2">
                    <input class="form-control" name="roadmap_steps[]" placeholder="Type step" value="{{ $val }}">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-remove>×</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>

        <div class="form-check mt-4">
          <input class="form-check-input" type="checkbox" name="is_active"
                 {{ old('is_active', $condition->is_active) ? 'checked' : '' }}>
          <label class="form-check-label fw-bold">Active</label>
        </div>

      </div>

      <div class="card-footer bg-white border-0">
        <button class="btn btn-primary px-4">Update</button>
        <a class="btn btn-light px-4" href="{{ url('dashboard/conditions/index') }}">Cancel</a>
      </div>
    </div>

  </form>
</div>

<script>
  const categories = @json($categories);
  const selectedCategoryId = @json($selectedCategoryId);
  const selectedSubcategoryId = @json($selectedSubcategoryId);

  const catSelect = document.getElementById('condition_category_id');
  const subSelect = document.getElementById('condition_subcategory_id');

  function resetSub() {
    subSelect.innerHTML = '<option value="">Select subcategory</option>';
  }

  function fillSub(categoryId, selectedId) {
    resetSub();

    const cat = categories.find(c => String(c.id) === String(categoryId));
    if (!cat || !cat.subcategories || !cat.subcategories.length) return;

    cat.subcategories.forEach(sc => {
      const opt = document.createElement('option');
      opt.value = sc.id;
      opt.textContent = sc.name;

      if (selectedId && String(sc.id) === String(selectedId)) {
        opt.selected = true;
      }

      subSelect.appendChild(opt);
    });
  }

  catSelect.addEventListener('change', function () {
    fillSub(this.value, null);
  });

  document.addEventListener('click', function(e){

    if(e.target.dataset.add){
      const type = e.target.dataset.add;
      let wrap, name, ph;

      if(type === 'causes'){ wrap='wrap-causes'; name='causes[]'; ph='Type cause'; }
      if(type === 'symptoms'){ wrap='wrap-symptoms'; name='symptoms[]'; ph='Type symptom'; }
      if(type === 'roadmap'){ wrap='wrap-roadmap'; name='roadmap_steps[]'; ph='Type step'; }

      const row = document.createElement('div');
      row.className = 'd-flex gap-2 mb-2';
      row.innerHTML = `<input class="form-control" name="${name}" placeholder="${ph}">
                       <button type="button" class="btn btn-outline-danger btn-sm" data-remove>×</button>`;
      document.getElementById(wrap).appendChild(row);
    }

    if(e.target.dataset.remove){
      const parent = e.target.closest('.d-flex');
      const wrap = parent.parentElement;
      if(wrap.children.length > 1) parent.remove();
      else parent.querySelector('input').value='';
    }

  });

  // Preload subcategories on page load
  if (selectedCategoryId) {
    fillSub(selectedCategoryId, selectedSubcategoryId);
  }
</script>

@endsection
