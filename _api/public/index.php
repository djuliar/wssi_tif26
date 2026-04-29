<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cuaca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Data API Eksternal dari https://weather.ewalabs.com/</h1>
        <?php
            require_once '../classes/Controller.php';

            $controller = new Controller();
            // Koordinat contoh: Gedung JTI Polije
            $lat = -8.157654;
            $long = 113.722846;

            $weather = $controller->getWeather($lat, $long);
            
            if($weather['status'] == 'success') {
                $cw = $weather['data'];
                foreach($cw['forecast'] as $data) { ?>

                    <div class="card col-lg-4">
                        <div class="card-body">
                            <h1 class="card-title"><?= $data['temperature'] ?> °C</h1>
                            <h3 class="card-title"><?= $data['weather'] ?></h3>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $cw['location'] ?></h6>
                            <p class="card-text"><?= $controller->formatTanggalIndonesia($data['local_datetime']) ?></p>
                            <ul>
                                <li>Humidity: <?= $data['humidity']; ?></li>
                                <li>Wind Speed: <?= $data['wind_speed']; ?></li>
                                <li>Wind Direction: <?= $data['wind_direction']; ?></li>
                            </ul>
                        </div>
                    </div>
                <?php }
            } else {
                echo "Data tidak tersedia";
            }
        ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>