<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);

        return view('admin.pages.brands.index', compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        Brand::create($input);

        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Brand $brand
     * @return void
     */
    public function show(Brand $brand)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param Brand $brand
     * @return Factory|View
     */
    public function edit(Brand $brand)
    {
        return view('admin.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully');
    }

}
