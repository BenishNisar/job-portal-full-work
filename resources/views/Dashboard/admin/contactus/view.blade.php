@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    .view-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 40px auto;
    }

    .view-card h2 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #b10937;
    }

    .view-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .view-row label {
        font-weight: bold;
        color: #333;
        width: 35%;
    }

    .view-row span {
        color: #555;
        width: 60%;
        word-break: break-word;
    }

    .btn-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .back-btn {
        padding: 8px 16px;
        background-color: #86092b;
        color: white;
        text-decoration: none;
        border-radius: 50px;
        transition: background 0.3s;
    }

    .back-btn:hover {
        background-color: #b10937;
        color: white;
    }

    @media (max-width: 768px) {
        .view-row {
            flex-direction: column;
        }
        .view-row label, .view-row span {
            width: 100%;
        }
    }
</style>

<div class="view-card">
    <h2>View Contact Details</h2>

    <div class="view-row">
        <label>ID:</label>
        <span>{{ $contact->id }}</span>
    </div>

    <div class="view-row">
        <label>Name:</label>
        <span>{{ $contact->name }}</span>
    </div>

    <div class="view-row">
        <label>Email:</label>
        <span>{{ $contact->email }}</span>
    </div>

    <div class="view-row">
        <label>Country:</label>
        <span>{{ $contact->country }}</span>
    </div>

    <div class="view-row">
        <label>Phone:</label>
        <span>{{ $contact->phone }}</span>
    </div>

    <div class="view-row">
        <label>Message:</label>
        <span>{{ $contact->message }}</span>
    </div>

    <div class="btn-container">
        <a href="{{ route('Dashboard.admin.contactus.index') }}" class="back-btn">
            Back to Contact List
        </a>
    </div>
</div>

@endsection
