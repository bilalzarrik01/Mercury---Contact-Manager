@extends('layouts.app')

@section('title', 'Create Group - Mercury')

@section('content')
    <div class="page-head">
        <div>
            <h1>Create Group</h1>
            <p>Add a new group</p>
        </div>
        <a class="btn ghost" href="{{ route('groups.index') }}">Back</a>
    </div>

    <form class="card form form-narrow" method="POST" action="{{ route('groups.store') }}">
        @csrf
        <label class="field">
            <span>Group name</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Family or Clients">
            @error('name')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <div class="form-actions">
            <button class="btn" type="submit">Save Group</button>
            <a class="btn ghost" href="{{ route('groups.index') }}">Cancel</a>
        </div>
    </form>
@endsection
