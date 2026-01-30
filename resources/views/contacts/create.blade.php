@extends('layouts.app')

@section('title', 'Create Contact - Mercury')

@section('content')
    <div class="page-head">
        <div>
            <h1>Create Contact</h1>
            <p>Add a new contact</p>
        </div>
        <a class="btn ghost" href="{{ route('contacts.index') }}">Back</a>
    </div>

    <form class="card form form-grid" method="POST" action="{{ route('contacts.store') }}">
        @csrf
        <label class="field span-2">
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Full name">
            @error('name')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <label class="field">
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com">
            @error('email')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <label class="field">
            <span>Phone</span>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+1 555 123 4567">
            @error('phone')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <label class="field span-2">
            <span>Group (optional)</span>
            <select name="group_id">
                <option value="">No group</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" @selected(old('group_id') == $group->id)>{{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <div class="form-actions span-2">
            <button class="btn" type="submit">Save Contact</button>
            <a class="btn ghost" href="{{ route('contacts.index') }}">Cancel</a>
        </div>
    </form>
@endsection
