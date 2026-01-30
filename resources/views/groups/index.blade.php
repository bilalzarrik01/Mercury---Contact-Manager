@extends('layouts.app')

@section('title', 'Groups - Mercury')

@section('content')
    <div class="page-head">
        <div>
            <h1>Groups</h1>
            <p>Manage your contact groups</p>
        </div>
        <a class="btn" href="{{ route('groups.create') }}">New Group</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contacts</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->contacts_count }}</td>
                        <td class="actions">
                            <a class="link" href="{{ route('groups.edit', $group) }}">Edit</a>
                            <form class="inline" action="{{ route('groups.destroy', $group) }}" method="POST" onsubmit="return confirm('Delete this group? Contacts will be removed.');">
                                @csrf
                                @method('DELETE')
                                <button class="link danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty" colspan="3">No groups yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
