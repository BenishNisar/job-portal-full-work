@extends("Layout.layouttwo")
@section("AdminContent")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .help-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 40px 30px;
        margin-top: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    .help-title {
        font-size: 28px;
        font-weight: 700;
        color: #283054;
        margin-bottom: 35px;
        text-align: center;
        position: relative;
    }

    .help-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 3px;
        background-color: #b10937;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .help-section {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #eee;
        border-radius: 12px;
        background-color: #f8f9fa;
        transition: 0.3s ease;
    }

    .help-section:hover {
        background-color: #f1f3f5;
    }

    .help-section h3 {
        font-size: 20px;
        color: #b10937;
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .help-section h3 i {
        color: #b10937;
        font-size: 18px;
    }

    .help-section p {
        font-size: 15px;
        color: #333;
        line-height: 1.7;
        margin: 0;
    }

    @media (max-width: 768px) {
        .help-container {
            padding: 25px 20px;
        }

        .help-title {
            font-size: 24px;
        }

        .help-section h3 {
            font-size: 18px;
        }

        .help-section p {
            font-size: 14px;
        }
    }
</style>

<div class="container help-container mt-4">
    <div class="help-title">Need Help? Get to Know Your Dashboard</div>

    <div class="help-section">
        <h3><i class="fas fa-blog"></i> Blogs</h3>
        <p>
            Add blog posts easily. Once added, blogs appear on the frontend and are clickable to view in detail.
            Your blog will show up on the blog listing page and open in a separate blog details page.
        </p>
    </div>

    <div class="help-section">
        <h3><i class="fas fa-user-shield"></i> Users & Roles</h3>
        <p>
            The dashboard uses role-based access. Only registered users can log in. You can create roles to manage
            user permissions, ensuring only authorized users can access specific parts of the dashboard.
        </p>
    </div>

    <div class="help-section">
        <h3><i class="fas fa-tags"></i> Categories</h3>
        <p>
            Categories help organize your blog content. While creating a blog, select a category so it’s easier to
            group and filter. Categories appear with each blog and can help improve user experience.
        </p>
    </div>

    <div class="help-section">
        <h3><i class="fas fa-envelope"></i> Contact Messages</h3>
        <p>
            When a visitor sends a message through the contact form, it’s instantly:
            <br>• Emailed to your admin inbox
            <br>• Stored and visible on the dashboard so you never miss a lead.
        </p>
    </div>

    <div class="help-section">
        <h3><i class="fas fa-chart-line"></i> Dashboard Overview</h3>
        <p>
            Your main dashboard displays insights and shortcuts to all modules: blogs, categories, users, roles,
            and contacts. It’s the command center for managing your law firm's online presence efficiently.
        </p>
    </div>
</div>

@endsection
