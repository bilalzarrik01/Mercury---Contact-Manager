@extends('layouts.app')

@section('title', 'Dashboard - Mercury')

@section('content')
    <div class="page-head">
        <h1>Dashboard</h1>
        <p>Overview</p>
    </div>

    <div class="card-grid">
        <div class="card">
            <div class="card-label">Groups</div>
            <div class="card-value">{{ $groupCount }}</div>
        </div>
        <div class="card">
            <div class="card-label">Contacts</div>
            <div class="card-value">{{ $contactCount }}</div>
        </div>
        <div class="card">
            <div class="card-label">With Phone</div>
            <div class="card-value">{{ $withPhoneCount }}</div>
        </div>
    </div>
@endsection
