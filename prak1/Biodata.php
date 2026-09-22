<?php

    $data = array($nim, $nama, $prodi, $semester, $ipk);

    function statusKelulusan() : string {
        if ($ipk >= 3.50) return 'Sangat memuaskan';
        if ($ipk >= 3.00) return 'Memuaskan';
        return 'Perlu peningkatan';
    }

    $mahasigma = [
        'nim '=> '3883838',
        'nama '=> 'Waltz',
        'prodi '=> 'Teknik Informatika',
        'semester '=> '1',
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
</body>
</html>