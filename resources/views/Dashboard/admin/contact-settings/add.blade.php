@extends('Layout.layouttwo')

@section('AdminContent')
<div class="container mt-4">
  <div class="form-container" style="background:#fff;border:1px solid #a41414;padding:20px;border-radius:10px;">
    <h1 class="text-center" style="font-size:23px;font-weight:bolder;">Add Contact Setting</h1>

    @if($errors->any())
      <div class="alert alert-danger mt-3">
        <ul class="mb-0">
          @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('Dashboard.admin.contact-settings.store') }}" method="POST">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Note (optional)</label>
          <input type="text" name="note" class="form-control" value="{{ old('note') }}">
        </div>

        <div class="col-md-12 mb-3">
          <label class="form-label">Address</label>
          <textarea name="address" rows="3" class="form-control" required>{{ old('address') }}</textarea>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Phones (one per line)</label>
          <textarea name="phones" rows="6" class="form-control" placeholder="0092-21-2772944&#10;2772945&#10;...">{{ old('phones') }}</textarea>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Emails (one per line)</label>
          <textarea name="emails" rows="6" class="form-control" placeholder="example@domain.com&#10;info@domain.com">{{ old('emails') }}</textarea>
        </div>
      </div>

      <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('Dashboard.admin.contact-settings.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit"  style="background-color:#1d3a7d ;color:white;" class="btn  ms-2">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
