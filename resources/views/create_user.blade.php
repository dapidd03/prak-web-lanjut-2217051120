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

    .form-container {
        background-color: rgba(255, 255, 255, 0.85);
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        max-width: 400px;
        width: 100%;
    }

    input[type="text"], select {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        width: 100%;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease-in-out;
    }

    input[type="text"]:focus, select:focus {
        border-color: #4F46E5;
        box-shadow: 0 0 6px rgba(79, 70, 229, 0.4);
        outline: none;
    }

    .submit-button {
        background-color: #3B82F6;
        color: white;
        font-weight: bold;
        padding: 0.75rem;
        border-radius: 8px;
        width: 100%;
        transition: background-color 0.3s ease-in-out;
    }

    .submit-button:hover {
        background-color: #2563EB;
    }

    label {
        font-weight: 500;
        margin-bottom: 0.25rem;
        display: inline-block;
        color: #4B5563;
    }

    .form-heading {
        font-size: 1.75rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 1.5rem;
        text-align: center;
    }
</style>

<div class="form-container">
    <h1 class="form-heading">Create User</h1>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama" required>
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- IPK -->
        <div>
            <label for="ipk">IPK</label>
            <input type="text" id="ipk" name="ipk" value="{{ old('ipk') }}" placeholder="Masukkan IPK" required>
            @error('ipk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kelas -->
        <div>
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Foto-->
        <div>
            <label for="foto">Foto</label><br>
            <input type="file" id="foto" name="foto" value="{{ old('foto') }}">
            @error('foto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit button -->
        <button type="submit" class="submit-button">Submit</button>
    </form>
</div>
@endsection