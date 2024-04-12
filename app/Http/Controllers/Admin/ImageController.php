<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::latest()->paginate(5);

        return view('admin.pages.images.index', compact('images'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.images.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploaded/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Image::create($input);

        return redirect()->route('images.index')
            ->with('success', 'Image created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Image $image
     * @return Factory|View
     */
    public function show(Image $image)
    {
        return view('admin.pages.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Image $image
     * @return Factory|View
     */
    public function edit(Image $image)
    {
        return view('admin.pages.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Image $image
     * @return RedirectResponse
     */
    public function update(Request $request, Image $image)
    {
        $input = $request->all();

        if ($img = $request->file('image')) {
            if ($image->image && file_exists(public_path('uploaded/image/' . $image->image))) {
                unlink(public_path('uploaded/image/' . $image->image));
            }

            $destinationPath = 'uploaded/image/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $image->update($input);

        return redirect()->route('images.index')
            ->with('success', 'Image updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     * @param Image $image
     * @return RedirectResponse
     */
    public function destroy(Image $image)
    {
        if ($image->image && file_exists(public_path('uploaded/image/' . $image->image))) {
            unlink(public_path('uploaded/image/' . $image->image));
        }

        $image->delete();

        return redirect()->route('images.index')
            ->with('success', 'Image deleted successfully');
    }

}
