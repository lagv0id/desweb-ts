<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $myfile = fopen("locations.csv", "a");
    $dataappend = "\n".$_POST['flocation'].',"'.$_POST['flat'].','.$_POST['flong'].'"';
    fwrite($myfile, $dataappend);
    fclose($myfile);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    ?>

</body>
</html>