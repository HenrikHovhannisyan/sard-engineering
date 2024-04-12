<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(5);

        return view('admin.pages.partners.index', compact('partners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.partners.create');
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
            $destinationPath = 'uploaded/partner/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Partner::create($input);

        return redirect()->route('partners.index')
            ->with('success', 'partner created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Partner $partner
     * @return Factory|View
     */
    public function show(Partner $partner)
    {
        return view('admin.pages.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Partner $partner
     * @return Factory|View
     */
    public function edit(Partner $partner)
    {
        return view('admin.pages.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(Request $request, Partner $partner)
    {
        $input = $request->all();

        if ($img = $request->file('image')) {
            if ($partner->image && file_exists(public_path('uploaded/partner/' . $partner->image))) {
                unlink(public_path('uploaded/image/' . $partner->image));
            }

            $destinationPath = 'uploaded/image/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $partner->update($input);

        return redirect()->route('partners.index')
            ->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        if ($partner->image && file_exists(public_path('uploaded/partner/' . $partner->image))) {
            unlink(public_path('uploaded/partner/' . $partner->image));
        }

        $partner->delete();

        return redirect()->route('partners.index')
            ->with('success', 'Partner deleted successfully');
    }
}
