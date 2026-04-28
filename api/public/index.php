<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cuaca</title>
</head>
<body>
    <?php
    // require_once '../classes/Controller.php';

    // $controller = new Controller();
    // // Koordinat contoh: Gedung JTI Polije
    // $lat = -8.157654;
    // $long = 113.722846;

    // $weather = $controller->getWeather($lat, $long);

    // echo "<h2>Data Cuaca (Open-Meteo)</h2>";
    // print_r($weather);
    // if(isset($weather['current_weather'])){
    //     $cw = $weather['current_weather'];

    //     echo "<table>";
    //     echo "<tr><th>Parameter</th><th>Nilai</th></tr>";

    //     echo "<tr><td>Suhu</td><td>{$cw['temperature']} °C</td></tr>";
    //     echo "<tr><td>Kecepatan Angin</td><td>{$cw['windspeed']} km/h</td></tr>";
    //     echo "<tr><td>Arah Angin</td><td>{$cw['winddirection']}°</td></tr>";
    //     echo "<tr><td>Waktu</td><td>{$cw['time']}</td></tr>";

    //     echo "</table>";
    // } else {
    //     echo "Data tidak tersedia";
    // }

    require_once '../classes/ApiService.php';
    $apiService = new ApiService();
    $data = $apiService->getApi(); // Koordinat dummy
    echo print_r($data);
    ?>
</body>
</html>