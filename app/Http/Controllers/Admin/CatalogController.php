<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Catalog;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::latest()->paginate(5);

        return view('admin.pages.catalogs.index', compact('catalogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.pages.catalogs.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'file' => 'nullable|file|mimes:pdf',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploaded/catalogs/images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($file = $request->file('file')) {
            $destinationPath = 'uploaded/catalogs/files/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }

        Catalog::create($input);

        return redirect()->route('catalogs.index')
            ->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Catalog $catalog
     * @return void
     */
    public function show(Catalog $catalog)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param Catalog $catalog
     * @return Factory|View
     */
    public function edit(Catalog $catalog)
    {
        $brands = Brand::all();
        return view('admin.pages.catalogs.edit', compact('catalog', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Catalog $catalog
     * @return RedirectResponse
     */
    public function update(Request $request, Catalog $catalog)
    {
        $input = $request->all();

        if ($img = $request->file('image')) {
            if ($catalog->image && file_exists(public_path('uploaded/catalogs/images/' . $catalog->image))) {
                unlink(public_path('uploaded/catalogs/images/' . $catalog->image));
            }

            $destinationPath = 'uploaded/catalogs/images';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }

        if ($file = $request->file('file')) {
            if ($catalog->file && file_exists(public_path('uploaded/catalogs/files/' . $catalog->file))) {
                unlink(public_path('uploaded/catalogs/files/' . $catalog->file));
            }

            $destinationPath = 'uploaded/catalogs/files/';
            $profileFile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = $profileFile;
        } else {
            unset($input['file']);
        }

        $catalog->update($input);

        return redirect()->route('catalogs.index')
            ->with('success', 'Catalog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Catalog $catalog
     * @return RedirectResponse
     */
    public function destroy(Catalog $catalog)
    {
        if ($catalog->image && file_exists(public_path('uploaded/catalogs/images/' . $catalog->image))) {
            unlink(public_path('uploaded/catalogs/images/' . $catalog->image));
        }

        if ($catalog->file && file_exists(public_path('uploaded/catalogs/files/' . $catalog->file))) {
            unlink(public_path('uploaded/catalogs/files/' . $catalog->file));
        }

        $catalog->delete();

        return redirect()->route('catalogs.index')
            ->with('success', 'Catalog deleted successfully');
    }

}
