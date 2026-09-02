@extends("Layout.layouttwo")
@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Discipline</a></li>
            </ol>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Dashboard.admin.disciplines.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xl-8">

                    <div class="card h-auto">
                        <div class="card-body">
                            <h4 class="mb-4">Hero Section</h4>

                            <div class="mb-3">
                                <label class="form-label">Breadcrumb Title</label>
                                <input type="text" name="breadcrumb_title" class="form-control" value="{{ old('breadcrumb_title') }}" placeholder="Enter breadcrumb title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Title <span class="text-danger">*</span></label>
                                <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title') }}" placeholder="Enter hero title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Highlight</label>
                                <input type="text" name="hero_highlight" class="form-control" value="{{ old('hero_highlight') }}" placeholder="Enter hero highlight">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Description</label>
                                <textarea name="hero_description" class="form-control" rows="5" placeholder="Enter hero description">{{ old('hero_description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="filter cm-content-box box-primary">
    <div class="content-title SlideToolHeader">
        <div class="cpa">Menu Section</div>
        <div class="tools">
            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
        </div>
    </div>
    <div class="cm-content-body form excerpt">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label">Menu Group</label>
                    <input type="text" name="menu_group" class="form-control" value="{{ old('menu_group') }}" placeholder="Example: Technology">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Menu Title</label>
                    <input type="text" name="menu_title" class="form-control" value="{{ old('menu_title') }}" placeholder="Example: IT & Software">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Menu Icon</label>
                    <input type="text" name="menu_icon" class="form-control" value="{{ old('menu_icon') }}" placeholder="Example: fas fa-laptop-code">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Example: it-software">
                </div>
            </div>
        </div>
    </div>
</div>

                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">Hero Buttons</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Hero Button 1 Text</label>
                                        <input type="text" name="hero_button_1_text" class="form-control" value="{{ old('hero_button_1_text') }}" placeholder="Enter button 1 text">
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Hero Button 1 Link</label>
                                        <input type="text" name="hero_button_1_link" class="form-control" value="{{ old('hero_button_1_link') }}" placeholder="Enter button 1 link">
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Hero Button 2 Text</label>
                                        <input type="text" name="hero_button_2_text" class="form-control" value="{{ old('hero_button_2_text') }}" placeholder="Enter button 2 text">
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Hero Button 2 Link</label>
                                        <input type="text" name="hero_button_2_link" class="form-control" value="{{ old('hero_button_2_link') }}" placeholder="Enter button 2 link">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">Expertise Section</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Expertise Title</label>
                                    <input type="text" name="expertise_title" class="form-control" value="{{ old('expertise_title') }}" placeholder="Enter expertise title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Expertise Highlight</label>
                                    <input type="text" name="expertise_highlight" class="form-control" value="{{ old('expertise_highlight') }}" placeholder="Enter expertise highlight">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Expertise Description</label>
                                    <textarea name="expertise_description" class="form-control" rows="4" placeholder="Enter expertise description">{{ old('expertise_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
{{--
                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">Left Card Section</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Left Card Icon</label>
                                    <input type="text" name="left_card_icon" class="form-control" value="{{ old('left_card_icon') }}" placeholder="Example: fas fa-crown">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Left Card Title</label>
                                    <input type="text" name="left_card_title" class="form-control" value="{{ old('left_card_title') }}" placeholder="Enter left card title">
                                </div>
                            </div>
                        </div>
                    </div> --}}
<div class="filter cm-content-box box-primary">
    <div class="content-title SlideToolHeader">
        <div class="cpa">Left Card Section</div>
        <div class="tools">
            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
        </div>
    </div>
    <div class="cm-content-body form excerpt">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Left Card Icon</label>
                <input type="text" name="left_card_icon" class="form-control" value="{{ old('left_card_icon') }}" placeholder="Example: fas fa-crown">
            </div>

            <div class="mb-3">
                <label class="form-label">Left Card Title</label>
                <input type="text" name="left_card_title" class="form-control" value="{{ old('left_card_title') }}" placeholder="Enter left card title">
            </div>

            <div class="mb-3">
                <label class="form-label">Left Role 1</label>
                <input type="text" name="left_role_1" class="form-control" value="{{ old('left_role_1') }}" placeholder="Enter left role 1">
            </div>

            <div class="mb-3">
                <label class="form-label">Left Role 2</label>
                <input type="text" name="left_role_2" class="form-control" value="{{ old('left_role_2') }}" placeholder="Enter left role 2">
            </div>

            <div class="mb-0">
                <label class="form-label">Left Role 3</label>
                <input type="text" name="left_role_3" class="form-control" value="{{ old('left_role_3') }}" placeholder="Enter left role 3">
            </div>
        </div>
    </div>
</div>
                    {{-- <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">Right Card Section</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Right Card Title</label>
                                    <input type="text" name="right_card_title" class="form-control" value="{{ old('right_card_title') }}" placeholder="Enter right card title">
                                </div>
                            </div>
                        </div>
                    </div> --}}
{{-- right --}}
<div class="filter cm-content-box box-primary">
    <div class="content-title SlideToolHeader">
        <div class="cpa">Right Card Section</div>
        <div class="tools">
            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
        </div>
    </div>
    <div class="cm-content-body form excerpt">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Right Card Title</label>
                <input type="text" name="right_card_title" class="form-control" value="{{ old('right_card_title') }}" placeholder="Enter right card title">
            </div>

            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 1</label>
                    <input type="text" name="right_role_1" class="form-control" value="{{ old('right_role_1') }}" placeholder="Enter right role 1">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 2</label>
                    <input type="text" name="right_role_2" class="form-control" value="{{ old('right_role_2') }}" placeholder="Enter right role 2">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 3</label>
                    <input type="text" name="right_role_3" class="form-control" value="{{ old('right_role_3') }}" placeholder="Enter right role 3">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 4</label>
                    <input type="text" name="right_role_4" class="form-control" value="{{ old('right_role_4') }}" placeholder="Enter right role 4">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 5</label>
                    <input type="text" name="right_role_5" class="form-control" value="{{ old('right_role_5') }}" placeholder="Enter right role 5">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 6</label>
                    <input type="text" name="right_role_6" class="form-control" value="{{ old('right_role_6') }}" placeholder="Enter right role 6">
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Right Role 7</label>
                    <input type="text" name="right_role_7" class="form-control" value="{{ old('right_role_7') }}" placeholder="Enter right role 7">
                </div>

                <div class="col-xl-6 mb-0">
                    <label class="form-label">Right Role 8</label>
                    <input type="text" name="right_role_8" class="form-control" value="{{ old('right_role_8') }}" placeholder="Enter right role 8">
                </div>
            </div>
        </div>
    </div>
</div>


                    <div class="filter cm-content-box box-primary">
                        <div class="content-title SlideToolHeader">
                            <div class="cpa">CTA Section</div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">CTA Title</label>
                                    <input type="text" name="cta_title" class="form-control" value="{{ old('cta_title') }}" placeholder="Enter CTA title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">CTA Description</label>
                                    <input type="text" name="cta_description" class="form-control" value="{{ old('cta_description') }}" placeholder="Enter CTA description">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">CTA Phone</label>
                                    <input type="text" name="cta_phone" class="form-control" value="{{ old('cta_phone') }}" placeholder="Enter CTA phone">
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">CTA Button 1 Text</label>
                                        <input type="text" name="cta_button_1_text" class="form-control" value="{{ old('cta_button_1_text') }}" placeholder="Enter CTA button 1 text">
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">CTA Button 2 Text</label>
                                        <input type="text" name="cta_button_2_text" class="form-control" value="{{ old('cta_button_2_text') }}" placeholder="Enter CTA button 2 text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4">
                    <div class="right-sidebar-sticky">

                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">Published</div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content form excerpt">
                                <div class="card-body py-3">
                                    <ul class="list-style-1 block">
                                        <li>
                                            <div>
                                                <label class="form-label mb-0 me-2">
                                                    <i class="fa-solid fa-key"></i>
                                                    Status:
                                                </label>
                                                <span class="font-w500">Published</span>
                                            </div>
                                        </li>
                                        <li class="border-bottom-0">
                                            <div>
                                                <label class="form-label mb-0 me-2">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                    Date:
                                                </label>
                                                <span class="font-w500">{{ now()->format('d m Y H:i:s') }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer border-top text-end py-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                                </div>
                            </div>
                        </div>

                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">Featured Image</div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div class="cm-content-body publish-content form excerpt">
                                <div class="card-body">
                                    <div class="avatar-upload d-flex align-items-center">
                                        <div class="position-relative">
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('{{ asset('images/no-img-avatar.png') }}'); background-size: cover; background-position: center;">
                                                </div>
                                            </div>
                                            <div class="change-btn d-flex align-items-center flex-wrap">
                                                <input type="file" name="hero_image" class="form-control d-none" id="imageUpload" accept=".png, .jpg, .jpeg, .webp">
                                                <label for="imageUpload" class="btn btn-sm btn-primary light ms-0">Select Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted d-block mt-2">This image will be used as hero image.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        if (imageUpload) {
            imageUpload.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        imagePreview.style.backgroundImage = `url('${event.target.result}')`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

@endsection
