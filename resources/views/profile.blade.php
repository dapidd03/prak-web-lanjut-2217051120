<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WLTugas2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #FFC0CB;
        }

        .profile-container {
            text-align: center;
            background: linear-gradient(135deg, #ffffff, #FFDFDD);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .profile-container:hover {
            transform: translateY(-5px);
        }

        .profile-container img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid #C08081;
        }

        .profile-container .info {
            background-color: #E7A1B0;
            margin: 12px 0;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .profile-container .info:hover {
            background-color: #FFC0CB;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="" alt="sipidd">
        <div class="info">
            <strong>Nama:</strong> <?= $nama ?>
        </div>
        <div class="info">
            <strong>Kelas:</strong> <?= $kelas ?>
        </div>
        <div class="info">
            <strong>NPM:</strong> <?= $npm ?>
        </div>
    </div>
</body>

</html>