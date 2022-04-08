<?php

function buatkotak($baris, $kolom) {

    //Declare variabel angka per table cell
    $num = 1;
    //Mulai tag <table>
    echo "<table border>";
    //for loop buat baris (vertikal)
    for ($row = 0; $row < $baris; $row++) {
        //Start tag <tr>
        echo "<tr>";
        //for loop buat kolom (horizontal)
        for ($col = 0; $col < $kolom; $col++) {
            //kalau genap bg hitam + teks putih
            if ($num % 2 == 0){
                echo "<td style='background-color:black;color:white'>" . $num . "</td>";
                $num++;
            } else {
                echo "<td style='background-color:white;color:black'>" . $num . "</td>";
                $num++;
            }   
        }
        //End tag <tr>
        echo "</tr>";
    }
    //End tag <table>
    echo "</table>";
}

function jarak($lat, $long) {
    $x1 = -7.56526; //Latitude TS
    $y1 = 110.81423; //Longitude TS
    $x2 = $lat;
    $y2 = $long;
    $result = sqrt(pow($x2-$x1,2)+pow($y2-$y1,2));
    return $result;
}
?>