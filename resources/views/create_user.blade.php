<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffccdd;
            border: 2px solid #ff99bb;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ff3385;
            font-weight: bold;
        }

        input[type="text"] {
            width: 200px; /* Mengatur lebar field lebih kecil */
            padding: 8px; /* Mengurangi padding untuk ukuran field lebih kecil */
            margin-bottom: 15px;
            border: 1px solid #ff66a3;
            border-radius: 5px;
            background-color: #fff0f5;
            color: #ff3385;
            font-size: 14px; /* Ukuran font sedikit lebih kecil */
        }

        input[type="text"]:focus {
            border-color: #ff3385;
            outline: none;
            box-shadow: 0px 0px 5px rgba(255, 51, 133, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff3385;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #e60073;
        }
    </style>
</head>

<body>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>

        <label for="npm">NPM : </label>
        <input type="text" id="npm" name="npm"><br>

        <label for="kelas">Kelas :</label>
        <input type="text" id="kelas" name="kelas"><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>