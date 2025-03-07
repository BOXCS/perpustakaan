{{-- create.blade.php / edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agus Bijj</h1>
    
    <div class="d-flex justify-content-between mb-4">
        <nav>
            <a href="/" class="btn btn-outline-secondary btn-sm">Home</a>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">CRUD</a>
        </nav>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <h4 class="alert-heading">📢 Data berhasil di update!</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Kategori:</strong> {{ $post->kategori_id ?? '' }}</p>
                            <p class="mb-1"><strong>Tanggal:</strong> {{ $post->tanggal ?? '' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Judul:</strong> {{ $post->judul ?? '' }}</p>
                            <p class="mb-1"><strong>Status:</strong> {{ $post->status ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}">
                @csrf
                @if(isset($post)) @method('PUT') @endif

                <div class="row g-3">
                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kategori</label>
                        <input type="number" 
                               name="kategori_id" 
                               class="form-control form-control-sm rounded-1" 
                               value="{{ $post->kategori_id ?? old('kategori_id') }}" 
                               required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal</label>
                        <input type="date" 
                               name="tanggal" 
                               class="form-control form-control-sm rounded-1" 
                               value="{{ $post->tanggal ?? old('tanggal') }}" 
                               required>
                    </div>

                    {{-- Judul --}}
                    <div class="col-12">
                        <label class="form-label fw-bold">Judul</label>
                        <input type="text" 
                               name="judul" 
                               class="form-control form-control-sm rounded-1" 
                               value="{{ $post->judul ?? old('judul') }}" 
                               required>
                    </div>

                    {{-- Isi --}}
                    <div class="col-12">
                        <label class="form-label fw-bold">Isi</label>
                        <textarea name="isi" 
                                  class="form-control form-control-sm rounded-1" 
                                  rows="5"
                                  required>{{ $post->isi ?? old('isi') }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" 
                                class="form-select form-select-sm rounded-1" 
                                required>
                            <option value="1" {{ (isset($post) && $post->status == 1) ? 'selected' : '' }}>Aktif</option>
                            <option value="2" {{ (isset($post) && $post->status == 2) ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-sm px-4 rounded-1">
                        {{ isset($post) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection