<?php 

$title = "lap_beli_range_date".$tgl_mulai.' - '.$tgl_akhir;

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


<b><h4>Laporan Pembelian <?php echo date('M-Y');?></h4></b>
<table width="100%" border="1">
    <thead>
        <tr style='font-weight:bold;'>
            <th>No.</th>

            <th>Tanggal</th>

            <th>Total Transaksi</th>

            <th>Total Pembelian</th>

            <th>Total Bank</th>

            <th>Pengeluaran Optik</th>

            <th>Pengeluaran Ibu</th>

            <th>Jumlah</th>
                        
        </tr>
    </thead>
    <tbody>
        <?php $i=1; 
        date_default_timezone_set('Asia/Jakarta');
        $tanggal1 = date('Y-m-d',strtotime($tgl_mulai));
        $tanggal2 = date('Y-m-d',strtotime($tgl_akhir));
    
        while ($tanggal1 <= $tanggal2) {
           
        ?>    

        <tr>
            <td align='center'><?php echo $i;?></td>

            <td><?php echo $tanggal1;?></td>

            <td>
                <?php
                    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."'")->result();
                    $jumT1 = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT1 += $value->jumlah;
                        }
                    }
                    echo $jumT1;
                ?>
            </td>

            <td></td>

            <td>
            <?php
                    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."' AND pembayaran != 'cash'")->result();
                    $jumT2 = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT2 += $value->jumlah;
                        }
                    }
                    echo $jumT2;
                ?>
            </td>

            <td>
            <?php
                    $total_transaksi=$this->db->query("SELECT * from pengeluaran_harian WHERE tanggal = '".$tanggal1."' AND status = 'ibu'")->result();
                    $jumT3 = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT3 += $value->harga;
                        }
                    }
                    echo $jumT3;
                ?>
            </td>

            <td>
            <?php
                    $total_transaksi=$this->db->query("SELECT * from pengeluaran_harian WHERE tanggal = '".$tanggal1."' AND status = 'optik'")->result();
                    $jumT4 = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT4 += $value->harga;
                        }
                    }
                    echo $jumT4;
                ?>
            </td>

            <td><?php echo $jumT1+$jumT2+$jumT3+$jumT4 ?></td>

        </tr>

        <?php  
            $tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1))); 
            $i++; 
        } ?>
        
    </tbody>
</table>
<?php  
 date_default_timezone_set('Asia/Jakarta');
 $tanggal1 = date('Y-m-d',strtotime($tgl_mulai));
 $tanggal2 = date('Y-m-d',strtotime($tgl_akhir));

 while ($tanggal1 <= $tanggal2) {
    
    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."'")->result();
    $bpjs = 0;
    $jumlahall = 0;
    foreach($total_transaksi as $value){
        if($value->tanggal == $tanggal1){
            $bpjs += $value->bpjs;
            $jumlahall += $value->jumlah;
        }
    }

    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."' AND pembayaran != 'cash'")->result();
    $jumbank = 0;
    foreach($total_transaksi as $value){
        if($value->tanggal == $tanggal1){
            $jumbank += $value->jumlah;
        }
    }

    $tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1))); 
    $i++; 
}
?>
<table border="1">
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>Total Transaksi Menggunakan BPJS</td><td>:</td><td><?php echo $bpjs ?></td>
    </tr>
    <tr>
        <td>Jumlah Keseluruhan</td><td>:</td><td><?php echo $jumlahall ?></td>
    </tr>
    <tr>
        <td>Jumlah Bank</td><td>:</td><td><?php echo $jumbank ?></td>
    </tr>
    <tr>
        <td>Pengeluaran Bulanan</td><td>:</td><td><?php 
        
        $jumbulanan = 0;
        $lapbulanan = $this->db->query("SELECT * from pengeluaran_bulanan")->result();
        foreach($lapbulanan as $val1){
            $jumbulanan += $val1->jumlah;
        }
        echo $jumbulanan ?></td>
    </tr>
</table>

<?php redirect('admin/laporan_transkasi/bulanan','refresh'); ?>