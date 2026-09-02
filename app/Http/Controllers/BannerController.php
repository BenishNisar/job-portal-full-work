<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
 public function index(Request $request)
{
    $q = $request->get('q');

    $banners = Banner::when($q, function ($query) use ($q) {
            $query->where(function ($qq) use ($q) {
                $qq->where('title', 'like', "%{$q}%")
                   ->orWhere('paragraph', 'like', "%{$q}%");
            });
        })
        ->orderBy('id', 'asc')     // 👈 ascending
        ->paginate(10)
        ->withQueryString();

    return view('Dashboard.admin.banner.index', compact('banners', 'q'));
}


    public function add()
    {
        return view('Dashboard.admin.banner.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:200',
            'paragraph' => 'nullable|string',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Ensure upload dir
        $uploadPath = public_path('uploads/banners');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Save file to /public/uploads/banners
        $file     = $request->file('image');
        $ext      = $file->getClientOriginalExtension();
        $filename = time().'_'.Str::slug(Str::limit($data['title'], 50, '')) . '.' . $ext;
        $file->move($uploadPath, $filename);

        Banner::create([
            'title'      => $data['title'],
            'paragraph'  => $data['paragraph'] ?? null,
            'image_path' => 'uploads/banners/'.$filename,
        ]);

        return redirect()->route('Dashboard.admin.banner.index')
            ->with('success','Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('Dashboard.admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:200',
            'paragraph' => 'nullable|string',
            'image'     => 'sometimes|nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $update = [
            'title'     => $data['title'],
            'paragraph' => $data['paragraph'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $uploadPath = public_path('uploads/banners');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // delete old file
            if ($banner->image_path && File::exists(public_path($banner->image_path))) {
                File::delete(public_path($banner->image_path));
            }

            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time().'_'.Str::slug(Str::limit($data['title'], 50, '')) . '.' . $ext;
            $file->move($uploadPath, $filename);

            $update['image_path'] = 'uploads/banners/'.$filename;
        }

        $banner->update($update);

        return redirect()->route('Dashboard.admin.banner.index')
            ->with('success','Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        // delete image
        if ($banner->image_path && File::exists(public_path($banner->image_path))) {
            File::delete(public_path($banner->image_path));
        }

        $banner->delete();

        return redirect()->route('Dashboard.admin.banner.index')
            ->with('success','Banner deleted successfully.');
    }

}
