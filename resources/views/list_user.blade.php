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

    /* Table Container */
    .table-container {
        background-color: pink; /* Slightly transparent white */
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px purple; /* Light shadow for 3D effect */
        backdrop-filter: blur(10px); /* Apply a blur effect to the background */
        max-width: 1000px;
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        text-align: left;
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb; /* Gray-200 */
    }

    th {
        background-color: purple; /* Tailwind's blue-500 color */
        color: white;
        font-weight: 600;
    }

    tr:hover {
        background-color: rgba(59, 130, 246, 0.1); /* Light blue hover effect */
    }

    td a {
        color: #3B82F6; /* Tailwind's blue-500 color */
        font-weight: bold;
        text-decoration: none;
    }

    td a:hover {
        color: #2563EB; /* Darker blue on hover */
    }

    td {
        color: #111827; /* Gray-900 */
    }

    th, td {
        text-align: left;
    }

    /* Fine-tuning */
    .table-heading {
        font-size: 1.75rem;
        font-weight: 600;
        color: #111827; /* Gray-900 */
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .btn-container {
        margin-bottom: 1rem;
        display: flex;
        justify-content: flex-end;
    }

    /* Update the button to purple */
    .btn-add-user {
        background-color: #6b21a8; /* Purple */
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-add-user:hover {
        background-color: #581c87; /* Darker purple */
    }
</style>

<div class="table-container">
    <h1 class="table-heading">User List</h1>
    
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add the "Tambah User" button -->
    <div class="btn-container">
        <a href="{{ route('user.create') }}" class="btn-add-user">Tambah User</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Kelas</th>
                <th>Profile</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['ipk'] }}</td>
                <td>{{ $user->kelas->nama_kelas ?? 'N/A' }}</td>
                <td>
                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/uploads/img/default-foto.png') }}" 
                        alt="User Photo" width="50" height="50" class="rounded-full">
                </td>
                <td>
                    <!-- View -->
                    <form action="{{ route('user.show', $user->id) }}" method="GET" style="display:inline-block;">
                        <button type="submit" class="text-red-500" 
                            style="background-color:#f3f4f6; border: 1px solid #ccc; padding: 5px 10px;">View</button>
                    </form>

                    <!-- Edit -->
                    <form action="{{ route('user.edit', $user->id) }}" method="GET" style="display:inline-block;">
                        <button type="submit" class="text-red-500" 
                            style="background-color:#f3f4f6; border: 1px solid #ccc; padding: 5px 10px;">Edit</button>
                    </form>

                    <!-- Delete -->
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" 
                            style="background-color:#f3f4f6; border: 1px solid #ccc; padding: 5px 10px;" 
                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection