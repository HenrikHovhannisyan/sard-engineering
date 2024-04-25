<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::latest()->paginate(5);

        return view('admin.pages.contact.index', compact('contact'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);

        $input = $request->all();
        Contact::create($input);

        return redirect()->route('contact.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     * @param Contact $contact
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Contact $contact
     * @return Factory|View
     */
    public function edit(Contact $contact)
    {
        return view('admin.pages.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contact.index')
            ->with('success', 'Contact updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
