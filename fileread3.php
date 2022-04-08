<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILE READ 2 2022-03-29</title>
</head>
<body>

    <form method="post" action="addlocation.php">
        Location: <input type="text" name="flocation">
        Latitude: <input type="text" name="flat">
        Longitude: <input type="text" name="flong">
        <input type="submit" name="submit">
    </form>

    <?php 
    include 'ts_lib.php';
    //Counter murni buat ngeskip baris pertama dari data file
    $counter = 0;

    //Buat header table
    echo "<table border>";
    echo "<tr>";
    echo "<th>Location</th>";
    echo "<th>Latitude</th>";
    echo "<th>Longitude</th>";
    echo "<th>Distance</th>";
    echo "</tr>";

    //Buka file locations.csv
    $myfile = fopen("locations.csv", "r");

    //arraayayyyyyayyay
    $dataarray = array();

    //!feof = Selama belum end of file
    while(!feof($myfile)) {
        //Setiap loop counter nambah 1
        $counter++;
        //Baca sebaris data
        $dataread = fgets($myfile);
        //Pecah data jadi array dengan separator ","
        $datasplit = explode(",",$dataread);
        //Ngilangin " 
        $lat = str_replace('"','',$datasplit[1]);
        $long = str_replace('"','',$datasplit[2]);
        //Convert int buat ngitung distance
        $intlat = (int)$lat;
        $intlong = (int)$long;
        

        //Baris pertama file yang dibuka tidak diinclude di hasil, jadinya buat ngeskip pake ini.
        if ($counter == 1) {
            continue;
        }

        //Buat masukin data ke array
        $data = array(
            "loc" => $datasplit[0],
            "lat" => $lat,
            "long" => $long,
            "dist" => jarak($intlat, $intlong));
        array_push($dataarray, $data);

        // //Print hasil dahh
        // echo "<tr>";
        // echo "<td>" . $datasplit[0] . "</td>";
        // echo "<td>" . str_replace('"','',$datasplit[1]) . "</td>"; //Contoh ae nyoba pake ltrim, cuma bisa dari kiri
        // echo "<td>" . str_replace('"','',$datasplit[2]) . "</td>"; //Contoh sing pake str_replace. Bisa pake rtrim() juga kali?
        // echo "<td>" . jarak($intlat, $intlong) . "</td>";
        // echo "</tr>";
    }

    //Memasukkan array yang belum disort ke $colJarak kemudian baru disort

    $colJarak = array_column($dataarray, "dist");
    array_multisort($colJarak, SORT_ASC, $dataarray);

    for($i=0; $i<count($dataarray); $i++) {
        echo "<tr>";
        echo "<td>" . $dataarray[$i]['loc']. "</td>";
        echo "<td>" . $dataarray[$i]['lat'] . "</td>";
        echo "<td>" . $dataarray[$i]['long'] . "</td>"; 
        echo "<td>" . $dataarray[$i]['dist'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    //Jangan lupa close file :)
    fclose($myfile); 
    
    echo "<pre>";
    print_r($dataarray);
    echo "</pre>";
    ?>
</body>
</html>