@extends("Layout.layouttwo")
@section("AdminContent")
<div class="container mt-4">
    <h1 style="font-size: 23px; font-weight:bolder;">Contact</h1>
    {{-- <a class="" href="{{ url('dashboard/admin/role_management/viewrecords') }}">view records</a> --}}

    <form action="{{ route('Dashboard.admin.contactus.store') }}" method="POST">
        @csrf


        <!-- Row 1 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="role_name" class="form-label">Name</label>
                <input type="text" class="form-control rounded-0 uniform-width" name="name" required />
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

             <!-- Row 1 -->
             <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="role_name" class="form-label">Email</label>
                    <input type="text" class="form-control rounded-0 uniform-width" name="email" required />
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                 <!-- Row 1 -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control rounded-0 uniform-width" name="message" rows="4" required>{{ old('message') }}</textarea>

                @error('message')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <!-- Submit and cancel Buttons -->
        <div class="mb-3" style="display: flex; justify-content: flex-end; margin-top: 2vh">
            <a href="{{ url('contactus') }}" class="btn square-button" style="background-color:#6c757d;color:white;margin-right:10px;">Cancel</a>
            <button style="background-color:#b10937;color:white;" type="submit" class="btn square-button">Save</button>
        </div>
    </form>

</div>


@endsection
