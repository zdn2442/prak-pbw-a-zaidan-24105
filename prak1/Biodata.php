<?php

    function statusKelulusan(float $ipk) : string {
        if ($ipk >= 3.50) return 'Sangat memuaskan';
        if ($ipk >= 3.00) return 'Memuaskan';
        return 'Perlu peningkatan';
    }

    // function setSemester($semester) : string {
    //     if ($semester == 1) return 'Anjay maba';
    //     if ($semester == 2) return 'Wah sudah bukan maba';
    //     if ($semester == 3) return 'ketar ketir';
    //     if ($semester == 4) return 'katanya nyantai, nyatanya dibantai';
    //     if ($semester == 5) return 'bjir pada magang duluan';
    //     if ($semester == 6) return 'soro soro jikanda mencari magang';
    //     if ($semester == 7) return 'alamak semrpo cik';
    //     if ($semester == 8) return 'yey dikit lagi lulus';
    // }

    $mahasigma = [
        'nim '=> '3883838',
        'nama '=> 'Waltz',
        'prodi '=> 'Teknik Informatika',
        'semester '=> '1',
        'kelas '=> 'A',
        'ipk '=> '3.45',
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Mahasigma</h1>
    <ul>
        <?php
            foreach ($mahasigma as $key => $value) :
        ?>
        <li>
            <?= ucfirst($key) ?><?=htmlspecialchars((string) $value) ?>
        </li>
        <?php endforeach;?>
    </ul>
    <p>Predikat: <?= statusKelulusan($mahasigma['ipk '])?></p>
    <!-- <p>Keadaan semester sekarang : <?= setSemester($mahasigma['semester '])?></p> -->
</body>
</html>