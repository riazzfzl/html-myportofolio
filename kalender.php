!DOCTYPE html>
<html>
<head>
  <title>Malasngoding.com - Membuat Kalender Menggunakan PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <?php
                $tahun = date('Y');
                $hari = date('j');
 
                for($i=1; $i<=12; $i++){
                    // Dapatkan jumlah hari dalam bulan saat ini
                    $bulan = $i;
                    $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
 
                    // Dapatkan hari pertama dalam bulan ini
                    $hari_pertama = date('w', strtotime($tahun . '-' . $bulan . '-01'));
                    $nama_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                    $nama_hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
 
                    ?>                    
                    <table class="table table-bordered">
                        <thead>
                                <th colspan="7" style="text-align: center;"><?php echo $nama_bulan[$bulan-1] ?> <?php echo $tahun ?></th>
                            <tr>
                                <?php 
                                foreach ($nama_hari as $hari_) {
                                    ?>
                                    <th><?php echo $hari_ ?></th>
                                    <?php
                                }
                                ?>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                for ($x = 0; $x < $hari_pertama; $x++) {
                                    ?>
                                    <td>-</td>
                                    <?php                                    
                                }
 
                                for ($nomor_hari = 1; $nomor_hari <= $jumlah_hari; $nomor_hari++) {
                                    $hari_seminggu = date('w', strtotime($tahun . '-' . $bulan . '-' . $nomor_hari));
                                    if ($nomor_hari == $hari) {
                                       ?>
                                       <td><?php echo $nomor_hari ?></td>
                                       <?php                                          
                                    } else {
                                        ?>
                                       <td><?php echo $nomor_hari ?></td>
                                       <?php 
                                    }
                                    if ($hari_seminggu == 6) {
                                        ?>
                                        <tr></tr>
                                        <?php                                        
                                    }
                                }
 
                                // Output sel kosong setelah hari terakhir dalam bulan
                                for ($x = $hari_seminggu; $x < 6; $x++) {
                                     ?>
                                    <td>-</td>
                                    <?php 
                                }
 
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                }
 
                ?>
            </div>
        </div>
        
    </div>
</body>
</html>