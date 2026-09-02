<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BackendDisciplinesController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('disciplines')->orderByDesc('id');

        if ($request->filled('title')) {
            $title = $request->title;

            $query->where(function ($q) use ($title) {
                $q->where('hero_title', 'like', '%' . $title . '%')
                  ->orWhere('menu_title', 'like', '%' . $title . '%')
                  ->orWhere('slug', 'like', '%' . $title . '%');
            });
        }

        if ($request->filled('menu_group')) {
            $query->where('menu_group', 'like', '%' . $request->menu_group . '%');
        }

        $disciplines = $query->paginate(10)->withQueryString();

        return view('Dashboard.admin.Disciplines.index', compact('disciplines'));
    }

    public function add()
    {
        return view('Dashboard.admin.Disciplines.add');
    }

    private function getUploadsPath()
    {
        return rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'disciplines';
    }

    private function getImageFullPath($relativePath)
    {
        return rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($relativePath, '/\\'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'breadcrumb_title' => 'nullable|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_highlight' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'menu_group' => 'nullable|string|max:255',
            'menu_title' => 'nullable|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:disciplines,slug',

            'hero_button_1_text' => 'nullable|string|max:255',
            'hero_button_1_link' => 'nullable|string|max:255',
            'hero_button_2_text' => 'nullable|string|max:255',
            'hero_button_2_link' => 'nullable|string|max:255',

            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'expertise_title' => 'nullable|string|max:255',
            'expertise_highlight' => 'nullable|string|max:255',
            'expertise_description' => 'nullable|string',

            'left_card_icon' => 'nullable|string|max:255',
            'left_card_title' => 'nullable|string|max:255',
            'left_role_1' => 'nullable|string|max:255',
            'left_role_2' => 'nullable|string|max:255',
            'left_role_3' => 'nullable|string|max:255',

            'right_card_title' => 'nullable|string|max:255',
            'right_role_1' => 'nullable|string|max:255',
            'right_role_2' => 'nullable|string|max:255',
            'right_role_3' => 'nullable|string|max:255',
            'right_role_4' => 'nullable|string|max:255',
            'right_role_5' => 'nullable|string|max:255',
            'right_role_6' => 'nullable|string|max:255',
            'right_role_7' => 'nullable|string|max:255',
            'right_role_8' => 'nullable|string|max:255',

            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string|max:255',
            'cta_phone' => 'nullable|string|max:100',
            'cta_button_1_text' => 'nullable|string|max:255',
            'cta_button_2_text' => 'nullable|string|max:255',
        ]);

        $heroImage = null;

        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $fileName = time() . '_' . Str::slug($request->hero_title) . '.' . $file->getClientOriginalExtension();

            $destinationPath = $this->getUploadsPath();

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $fileName);

            $heroImage = 'uploads/disciplines/' . $fileName;
        }

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->hero_title);
        $slug = $this->makeUniqueSlug($slug);

        DB::table('disciplines')->insert([
            'breadcrumb_title' => $request->breadcrumb_title ?: null,
            'hero_title' => $request->hero_title,
            'hero_highlight' => $request->hero_highlight ?: null,
            'hero_description' => $request->hero_description ?: null,

            'menu_group' => $request->menu_group ?: null,
            'menu_title' => $request->menu_title ?: $request->hero_title,
            'menu_icon' => $request->menu_icon ?: null,
            'slug' => $slug,

            'hero_button_1_text' => $request->hero_button_1_text ?: null,
            'hero_button_1_link' => $request->hero_button_1_link ?: null,
            'hero_button_2_text' => $request->hero_button_2_text ?: null,
            'hero_button_2_link' => $request->hero_button_2_link ?: null,
            'hero_image' => $heroImage,

            'expertise_title' => $request->expertise_title ?: null,
            'expertise_highlight' => $request->expertise_highlight ?: null,
            'expertise_description' => $request->expertise_description ?: null,

            'left_card_icon' => $request->left_card_icon ?: null,
            'left_card_title' => $request->left_card_title ?: null,
            'left_role_1' => $request->left_role_1 ?: null,
            'left_role_2' => $request->left_role_2 ?: null,
            'left_role_3' => $request->left_role_3 ?: null,

            'right_card_title' => $request->right_card_title ?: null,
            'right_role_1' => $request->right_role_1 ?: null,
            'right_role_2' => $request->right_role_2 ?: null,
            'right_role_3' => $request->right_role_3 ?: null,
            'right_role_4' => $request->right_role_4 ?: null,
            'right_role_5' => $request->right_role_5 ?: null,
            'right_role_6' => $request->right_role_6 ?: null,
            'right_role_7' => $request->right_role_7 ?: null,
            'right_role_8' => $request->right_role_8 ?: null,

            'cta_title' => $request->cta_title ?: null,
            'cta_description' => $request->cta_description ?: null,
            'cta_phone' => $request->cta_phone ?: null,
            'cta_button_1_text' => $request->cta_button_1_text ?: null,
            'cta_button_2_text' => $request->cta_button_2_text ?: null,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('Dashboard.admin.disciplines.index')
            ->with('success', 'Discipline added successfully.');
    }

    public function edit($id)
    {
        $discipline = DB::table('disciplines')->where('id', $id)->first();

        if (!$discipline) {
            abort(404);
        }

        return view('Dashboard.admin.Disciplines.edit', compact('discipline'));
    }

    public function update(Request $request, $id)
    {
        $discipline = DB::table('disciplines')->where('id', $id)->first();

        if (!$discipline) {
            abort(404);
        }

        $request->validate([
            'breadcrumb_title' => 'nullable|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_highlight' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'menu_group' => 'nullable|string|max:255',
            'menu_title' => 'nullable|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:disciplines,slug,' . $id,

            'hero_button_1_text' => 'nullable|string|max:255',
            'hero_button_1_link' => 'nullable|string|max:255',
            'hero_button_2_text' => 'nullable|string|max:255',
            'hero_button_2_link' => 'nullable|string|max:255',

            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'expertise_title' => 'nullable|string|max:255',
            'expertise_highlight' => 'nullable|string|max:255',
            'expertise_description' => 'nullable|string',

            'left_card_icon' => 'nullable|string|max:255',
            'left_card_title' => 'nullable|string|max:255',
            'left_role_1' => 'nullable|string|max:255',
            'left_role_2' => 'nullable|string|max:255',
            'left_role_3' => 'nullable|string|max:255',

            'right_card_title' => 'nullable|string|max:255',
            'right_role_1' => 'nullable|string|max:255',
            'right_role_2' => 'nullable|string|max:255',
            'right_role_3' => 'nullable|string|max:255',
            'right_role_4' => 'nullable|string|max:255',
            'right_role_5' => 'nullable|string|max:255',
            'right_role_6' => 'nullable|string|max:255',
            'right_role_7' => 'nullable|string|max:255',
            'right_role_8' => 'nullable|string|max:255',

            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string|max:255',
            'cta_phone' => 'nullable|string|max:100',
            'cta_button_1_text' => 'nullable|string|max:255',
            'cta_button_2_text' => 'nullable|string|max:255',
        ]);

        $heroImage = $discipline->hero_image;

        if ($request->hasFile('hero_image')) {
            $oldImagePath = !empty($discipline->hero_image) ? $this->getImageFullPath($discipline->hero_image) : null;

            if ($oldImagePath && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $file = $request->file('hero_image');
            $fileName = time() . '_' . Str::slug($request->hero_title) . '.' . $file->getClientOriginalExtension();

            $destinationPath = $this->getUploadsPath();

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $fileName);

            $heroImage = 'uploads/disciplines/' . $fileName;
        }

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->hero_title);
        $slug = $this->makeUniqueSlug($slug, $id);

        DB::table('disciplines')->where('id', $id)->update([
            'breadcrumb_title' => $request->breadcrumb_title ?: null,
            'hero_title' => $request->hero_title,
            'hero_highlight' => $request->hero_highlight ?: null,
            'hero_description' => $request->hero_description ?: null,

            'menu_group' => $request->menu_group ?: null,
            'menu_title' => $request->menu_title ?: $request->hero_title,
            'menu_icon' => $request->menu_icon ?: null,
            'slug' => $slug,

            'hero_button_1_text' => $request->hero_button_1_text ?: null,
            'hero_button_1_link' => $request->hero_button_1_link ?: null,
            'hero_button_2_text' => $request->hero_button_2_text ?: null,
            'hero_button_2_link' => $request->hero_button_2_link ?: null,
            'hero_image' => $heroImage,

            'expertise_title' => $request->expertise_title ?: null,
            'expertise_highlight' => $request->expertise_highlight ?: null,
            'expertise_description' => $request->expertise_description ?: null,

            'left_card_icon' => $request->left_card_icon ?: null,
            'left_card_title' => $request->left_card_title ?: null,
            'left_role_1' => $request->left_role_1 ?: null,
            'left_role_2' => $request->left_role_2 ?: null,
            'left_role_3' => $request->left_role_3 ?: null,

            'right_card_title' => $request->right_card_title ?: null,
            'right_role_1' => $request->right_role_1 ?: null,
            'right_role_2' => $request->right_role_2 ?: null,
            'right_role_3' => $request->right_role_3 ?: null,
            'right_role_4' => $request->right_role_4 ?: null,
            'right_role_5' => $request->right_role_5 ?: null,
            'right_role_6' => $request->right_role_6 ?: null,
            'right_role_7' => $request->right_role_7 ?: null,
            'right_role_8' => $request->right_role_8 ?: null,

            'cta_title' => $request->cta_title ?: null,
            'cta_description' => $request->cta_description ?: null,
            'cta_phone' => $request->cta_phone ?: null,
            'cta_button_1_text' => $request->cta_button_1_text ?: null,
            'cta_button_2_text' => $request->cta_button_2_text ?: null,

            'updated_at' => now(),
        ]);

        return redirect()->route('Dashboard.admin.disciplines.index')
            ->with('success', 'Discipline updated successfully.');
    }

    public function destroy($id)
    {
        $discipline = DB::table('disciplines')->where('id', $id)->first();

        if (!$discipline) {
            abort(404);
        }

        if (!empty($discipline->hero_image)) {
            $oldImagePath = $this->getImageFullPath($discipline->hero_image);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        DB::table('disciplines')->where('id', $id)->delete();

        return redirect()->route('Dashboard.admin.disciplines.index')
            ->with('success', 'Discipline deleted successfully.');
    }

    private function makeUniqueSlug($slug, $ignoreId = null)
    {
        $originalSlug = $slug;
        $count = 1;

        while (
            DB::table('disciplines')
                ->where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . $count;
            $count++;
        }

        return $slug;
    }
}