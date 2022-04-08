<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILE READ 2022-03-29</title>
</head>
<body>
    <?php 

    //Include library yang berisi function buatkotak(a,b)
    include 'ts_lib.php';

    //Open file, kalau file tidak ditemukan muncul pesan
    $myfile = fopen("kotaksize.txt", "r") or die("Unable to open file!");
    //!feof = Selama belum End of File
    while(!feof($myfile)) {
        //Baca sebaris data
        $dataread = fgets($myfile);
        //Pecah data jadi array dengan separator '|'
        $datasplit = explode("|",$dataread);
        //Print data dan tabel
        echo "<br>";
        print_r($datasplit);
        buatkotak($datasplit[0],$datasplit[1]);
    }
    //Jangan lupa close file
    fclose($myfile); 
    ?>
</body>
</html>