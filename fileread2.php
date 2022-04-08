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
        <input type="submit">
    </form>

    <?php 
    include 'ts_lib.php';
    //Counter murni buat ngeskip baris pertama dari data file
    $counter = 0;
    //Buka file locations.csv
    $myfile = fopen("locations.csv", "r");

    //!feof = Selama belum end of file
    while(!feof($myfile)) {
        //Setiap loop counter nambah 1
        $counter++;
        //Baca sebaris data
        $dataread = fgets($myfile);
        //Pecah data jadi array dengan separator ","
        $datasplit = explode(",",$dataread);
        $lat = (int)$datasplit[1];
        $long = (int)$datasplit[2];
        
        //Baris pertama file yang dibuka tidak diinclude di hasil, jadinya buat ngeskip pake ini.
        if ($counter == 1) {
            //Buat header table
            echo "<table border>";
            echo "<tr>";
            echo "<th>Location</th>";
            echo "<th>Latitude</th>";
            echo "<th>Longitude</th>";
            echo "<th>Distance</th>";
            echo "</tr>";
            continue;
        }

        //Print hasil dahh
        echo "<tr>";
        echo "<td>" . $datasplit[0] . "</td>";
        echo "<td>" . ltrim($datasplit[1],'"') . "</td>"; //Contoh ae nyoba pake ltrim, cuma bisa dari kiri
        echo "<td>" . str_replace('"','',$datasplit[2]) . "</td>"; //Contoh sing pake str_replace. Bisa pake rtrim() juga kali?
        echo "<td>" . jarak($lat, $long) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //Jangan lupa close file :)
    fclose($myfile); 
    ?>
</body>
</html>