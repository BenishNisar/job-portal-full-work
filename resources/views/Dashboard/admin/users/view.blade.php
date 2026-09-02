@extends("Layout.layouttwo")

@section("AdminContent")
<style>
    .user-profile-card {
        max-width: 700px;
        margin: 30px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
    }

    .user-profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .user-profile-header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
    }

    .user-profile-info h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .user-profile-info span {
        font-size: 14px;
        color: #888;
    }

    .user-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px 30px;
        margin-top: 20px;
    }

    .user-details-grid p {
        margin: 0;
        font-size: 15px;
        line-height: 1.6;
    }

    .user-details-grid strong {
        color: #a41414;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .user-details-grid {
            grid-template-columns: 1fr;
        }

        .user-profile-card {
            padding: 20px;
        }
    }
</style>

<div class="user-profile-card">
    <div class="user-profile-header">
        <img src="{{ asset($user->profile_img ?? 'assets/profile_images/default.png') }}" alt="Profile Image">
        <div class="user-profile-info">
            <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
            <span>{{ $user->email }}</span>
        </div>
    </div>

    <div class="user-details-grid">
        <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
        <p><strong>City:</strong> {{ $user->city }}</p>
        <p><strong>Country:</strong> {{ $user->country }}</p>
        <p><strong>Zip Code:</strong> {{ $user->zip_code }}</p>
        <p><strong>Role:</strong> {{ $user->role->role_name ?? 'N/A' }}</p>
        <p><strong>Organization:</strong> {{ $user->organization }}</p>
    </div>
</div>
@endsection
