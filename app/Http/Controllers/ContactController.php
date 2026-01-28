<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $groups = Group::orderBy('name')->get();

        $contactsQuery = Contact::query()->with('group');

        $selectedGroup = null;
        if ($request->filled('group_id')) {
            $selectedGroup = Group::find($request->group_id);
            if ($selectedGroup) {
                $contactsQuery = $selectedGroup->contacts()->with('group');
            }
        }

        if ($request->filled('q')) {
            $term = $request->q;
            $contactsQuery->where('name', 'like', '%' . $term . '%');
        }

        $contacts = $contactsQuery->orderBy('name')->get();

        return view('contacts.index', compact('contacts', 'groups', 'selectedGroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::orderBy('name')->get();

        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'group_id' => ['nullable', 'exists:groups,id'],
        ]);

        Contact::create($validated);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::with('group')->findOrFail($id);
        $groups = Group::orderBy('name')->get();

        return view('contacts.edit', compact('contact', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'group_id' => ['nullable', 'exists:groups,id'],
        ]);

        $contact->update($validated);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
