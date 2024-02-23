<?php 

$title = "lap_beli_range_date".date('d-m-Y');;

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<style  type='text/css'>
    .num {
        mso-number-format:General;
    }
    .text{
        mso-number-format:"\@";/*force text*/
    }
</style>

        <h3>Laporan Bulanan</h3>
        <table>
            <tr>
                <td>Tangal</td><td>Total Transaksi</td><td>Total Pengambilan</td><td>Total Bank</td><td>Pengeluaran Optik</td><td>Pengeluaran Ibu</td><td>Jumlah</td>
            </tr>
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $dari = 2024-01-01;
                $sampai = 2024-01-30;
                
                while (strtotime($dari) <= strtotime($sampai)) {
                    $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
                ?>
                <tr>
                    <td><?php echo $dari ?></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
            <?php
                }
            ?>