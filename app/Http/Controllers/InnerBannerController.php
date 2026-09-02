<?php

namespace App\Http\Controllers;
use App\Models\InnerBanner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class InnerBannerController extends Controller
{
    //
public function index()
{
    // id ASC (oldest -> newest). Agar name chahiye to name se orderBy kar lo.
    $banners = InnerBanner::orderBy('id','asc')->paginate(20);
    return view('Dashboard.admin.inner_banner.index', compact('banners'));
}

    public function add()
    {
        return view('Dashboard.admin.inner_banner.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:150',
            'image' => 'required|mimes:jpg,jpeg,png,webp,svg|max:4096', // (svg + some servers => 'image' rule hata diya)
        ]);

        $dir = public_path('inner_banners');
if (!File::exists($dir)) File::makeDirectory($dir, 0775, true);

$file     = $request->file('image');
$ext      = $file->getClientOriginalExtension();
$filename = time().'_'.Str::slug($request->name).'.'.$ext;
$file->move($dir, $filename);

InnerBanner::create([
  'name'  => $request->name,
  'image' => 'inner_banners/'.$filename,
]);


        return redirect()->route('Dashboard.admin.inner_banner.index')
                         ->with('success', 'Inner banner added.');
    }

    public function edit(InnerBanner $inner)  // route param {inner}
    {
        $banner = $inner;
        return view('Dashboard.admin.inner_banner.edit', compact('banner'));
    }

   public function update(Request $request, InnerBanner $inner)  // {inner} route param
{
    $request->validate([
        'name'  => 'required|string|max:150',
        'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:4096',
    ]);

    $banner = $inner;                      // bound model
    $data   = ['name' => $request->name];  // always update name

    if ($request->hasFile('image')) {
        $dir = public_path('inner_banners');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0775, true);
        }

        // delete old file if exists
        if (!empty($banner->image) && File::exists(public_path($banner->image))) {
            @File::delete(public_path($banner->image));
        }

        // save new file
        $file     = $request->file('image');
        $ext      = $file->getClientOriginalExtension();
        $filename = time() . '_' . Str::slug($request->name) . '.' . $ext;
        $file->move($dir, $filename);

        $data['image'] = 'inner_banners/' . $filename;
    }

    $banner->update($data);

    return redirect()
        ->route('Dashboard.admin.inner_banner.index')
        ->with('success', 'Inner banner updated.');
}

public function destroy(InnerBanner $inner)  // {inner} route param
{
    $banner = $inner;

    if (!empty($banner->image) && File::exists(public_path($banner->image))) {
        @File::delete(public_path($banner->image));
    }

    $banner->delete();

    return redirect()
        ->route('Dashboard.admin.inner_banner.index')
        ->with('success', 'Inner banner deleted.');
}

}
