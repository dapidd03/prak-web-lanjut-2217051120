@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('image/begron.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.85);
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        max-width: 600px;
        width: 100%;
        text-align: center;
    }

    h1 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .info {
        font-size: 1.25rem;
        font-weight: 500;
        color: #111827;
        margin-bottom: 1rem;
    }

    .info strong {
        display: block;
        color: #4B5563;
    }

    .user-photo img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin-bottom: 20px;
        border: 5px solid #f3f4f6;
    }

    .kelas {
        font-size: 1rem;
        color: #6B7280;
        margin-top: 10px;
    }
</style>

<div class="container">
    <h1>{{ $title }}</h1>

    <!-- User photo -->
    <div class="user-photo">
        @if ($user->foto)
        <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/uploads/img/default-foto.png') }}" 
        alt="User Photo" width="150" height="150" class="rounded-circle">
        @else
            <p>No photo available</p>
        @endif
    </div>

    <!-- User information -->
    <div class="info">
        <strong>Nama:</strong> {{ $user->nama }}
    </div>

    <div class="info">
        <strong>IPK:</strong> {{ $user->ipk }} 
    </div>

    <div class="info">
        <strong>Kelas:</strong>{{ $kelas->nama_kelas }}
    </div>
</div>
@endsection