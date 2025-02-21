@extends('layout')

@push('styles')
<link rel="stylesheet" href="custom.css">
@endpush


@section('title', 'Home Page')

@section('content')
    @include('header')

    <h1>Welcome to Home Page</h1>
    <p>Main Content Here!</p>

    {{-- Cek Peran Pengguna --}}
    @if($user->isAdmin())
        <p>Admin Panel</p>
    @elseif($user->isEditor())
        <p>Editor Panel</p>
    @else
        <p>User Panel</p>
    @endif

    {{-- Cek Status Pesanan --}}
    @switch($status)
        @case('pending')
            <p>Order Pending</p>
            @break
        @case('completed')
            <p>Order Completed</p>
            @break
        @default
            <p>Unknown Status</p>
    @endswitch
@endsection

@push('scripts')
<script src="app.js"></script>
@endpush
