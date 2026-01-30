@extends('layouts.app')

@section('title', 'Contacts - Mercury')

@section('content')
    <div class="page-head">
        <div>
            <h1>Contacts</h1>
            <p>Search and filter your contacts</p>
        </div>
        <a class="btn" href="{{ route('contacts.create') }}">New Contact</a>
    </div>

    <form class="card filter-bar" method="GET" action="{{ route('contacts.index') }}">
        <label class="field inline-field">
            <span>Group</span>
            <select name="group_id">
                <option value="">All groups</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" @selected(request('group_id') == $group->id)>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <label class="field inline-field">
            <span>Search</span>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by name">
        </label>
        <div class="form-actions inline-actions">
            <button class="btn ghost" type="submit">Filter</button>
            <a class="btn ghost" href="{{ route('contacts.index') }}">Reset</a>
        </div>
    </form>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Group</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone ?? '—' }}</td>
                        <td>{{ $contact->group?->name ?? '—' }}</td>
                        <td class="actions">
                            <a class="link" href="{{ route('contacts.edit', $contact) }}">Edit</a>
                            <form class="inline" action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this contact?');">
                                @csrf
                                @method('DELETE')
                                <button class="link danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty" colspan="5">No contacts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
