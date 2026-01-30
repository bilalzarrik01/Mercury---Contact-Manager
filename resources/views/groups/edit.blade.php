@extends('layouts.app')

@section('title', 'Edit Group - Mercury')

@section('content')
    <div class="page-head">
        <div>
            <h1>Edit Group</h1>
            <p>Update group name</p>
        </div>
        <a class="btn ghost" href="{{ route('groups.index') }}">Back</a>
    </div>

    <form class="card form form-narrow" method="POST" action="{{ route('groups.update', $group) }}">
        @csrf
        @method('PUT')
        <label class="field">
            <span>Group name</span>
            <input type="text" name="name" value="{{ old('name', $group->name) }}">
            @error('name')
                <small class="error">{{ $message }}</small>
            @enderror
        </label>
        <div class="form-actions">
            <button class="btn" type="submit">Update Group</button>
            <a class="btn ghost" href="{{ route('groups.index') }}">Cancel</a>
        </div>
    </form>
@endsection
