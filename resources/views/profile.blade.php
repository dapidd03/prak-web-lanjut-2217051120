<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('image/begron.jpg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md text-center w-full">
        <!-- Displaying photo or default photo -->
        <div class="mb-4">
            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/uploads/img/default-foto.png') }}" 
                alt="User Photo" class="rounded-full mx-auto" width="150">
        </div>

        <!-- Profile Details -->
        <div class="mt-6 space-y-3">
            <div class="bg-gray-200 text-center py-3 rounded-md">
                Nama: {{ $nama }}
            </div>
            <div class="bg-gray-200 text-center py-3 rounded-md">
                NPM: {{ $npm }}
            </div>
            <div class="bg-gray-200 text-center py-3 rounded-md">
                Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}
            </div>
        </div>
    </div>

</body>
</html>
