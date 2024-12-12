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

    /* Form Container Customization */
    .form-container {
        background-color: rgba(255, 255, 255, 0.85); /* Slightly transparent white */
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px purple; /* Light shadow for 3D effect */
        backdrop-filter: blur(10px); /* Apply a blur effect to the background */
        max-width: 600px;
        width: 100%;
    }

    /* Form Input Customization */
    input[type="text"], select {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        width: 100%;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); /* Slight inner shadow */
        transition: all 0.3s ease-in-out;
    }

    /* On focus, the inputs will glow slightly */
    input[type="text"]:focus, select:focus {
        border-color: purple;
        box-shadow: 0 0 6px rgba(128, 0, 128, 0.4);
        outline: none;
    }

    /* Submit Button Customization */
    .submit-button {
        background-color: #3B82F6; /* Tailwind's blue-500 color */
        color: white;
        font-weight: bold;
        padding: 0.75rem;
        border-radius: 8px;
        width: 100%;
        transition: background-color 0.3s ease-in-out;
    }

    .submit-button:hover {
        background-color: #2563EB; /* Darker blue on hover */
    }

    /* Fine-tuning the text appearance */
    label {
        font-weight: 500;
        margin-bottom: 0.25rem;
        display: inline-block;
        color: #4B5563; /* Gray-600 */
    }

    .form-heading {
        font-size: 1.75rem;
        font-weight: 600;
        color: #111827; /* Gray-900 */
        margin-bottom: 1.5rem;
        text-align: center;
    }

    img {
        border-radius: 8px;
    }
</style>

<div class="form-container">
    <h1 class="form-heading">Edit User</h1>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" required>
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
            <select class="form-select" name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Foto -->
        <div>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" class="form-control">
            @if($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="User Photo" width="100" class="mt-2">
            @endif
            @error('foto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <br>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</div>
@endsection