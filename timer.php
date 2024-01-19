<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/* Mengambil waktu yang sekarang.*/
$date = new DateTime('now');
/* Menjumlahkan waktu dari awal dengan penambahan waktu yang telah ditentukan.*/
$date->add(new DateInterval('P1D'));
/* Menampilkan waktu akhir.*/
echo date('Y-m-d') . ", ".date('H:i:s'). " Sampai dengan " .$date->format('Y-m-d').", ".$date->format('H:i:s');
?>
</body>
</html>