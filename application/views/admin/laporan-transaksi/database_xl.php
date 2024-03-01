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


<b><h4>Laporan Pembelian <?php echo date('M-Y');?></h4></b>
<table width="100%" border="1">
    <thead>
        <tr style='font-weight:bold;'>
            <th rowspan="2">No.</th>
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">Nota</th>
            <th rowspan="2">Asal Resep</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">No Telepon</th>
            <th rowspan="2">Frame</th>
            <th rowspan="2">Lensa</th>
            <th rowspan="2">Keterangan</th>
            <th colspan="5">Ukuran</th>    
            <th rowspan="2">jumlah</th>
            <th rowspan="2">BPJS</th>
            <th rowspan="2">Uang Muka</th>      
            <th rowspan="2">Status Pembayaran</th>
            <th rowspan="2">Sisa</th>
            <th rowspan="2">Tanggal Selesai Pemasangan</th>
            <th rowspan="2">Status Pembayaran Sisa</th>
            <th rowspan="2">Tanggal Pengambilan</th>
        </tr>
        <tr style='font-weight:bold;'>
            <th>R</th>
            <th>L</th>
            <th>ADD OD</th>
            <th>ADD OS</th>
            <th>PD</th>          
        </tr>
    </thead>
    <tbody>
        <?php
          $no =1;
          $uangmuka = 0;
          $bpjsTotal = 0;
          foreach($transaksi as $value){
        echo "
      <tr>
        <td>".$no++."</td>
        <td>".$value->tanggal."</td>
        <td>".$value->nota."</td>
        <td>".$value->resep."</td>
        <td>".$value->nama_pengguna."</td>
        <td>".$value->alamat."</td>
        <td>".$value->no_telp."</td>
        <td>".$value->nama_frame."</td>
        <td>".$value->jenis_lensa."</td>
        <td>".$value->keterangan."</td>
        <td>".$value->status_r."</td>
        <td>".$value->status_l."</td>
        <td>".$value->status_od."</td>
        <td>".$value->status_os."</td>
        <td>".$value->status_pd."</td>
        <td>".$value->jumlah."</td>
        <td>".$value->bpjs."</td>
        <td>".$value->uang_muka."</td>
        <td>".$value->pembayaran."</td>
        <td>".$value->sisa."</td>
        <td>".$value->tanggal_pengerjaan."</td>
        <td>".$value->pembayaran_sisa."</td>
        <td>".$value->tanggal_pengambilan."</td>
      </tr>";
      $bpjsTotal += $value->bpjs;
       } ?>
    </tbody>
</table>
<table border="0" style="font-size:24px;">
       <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td>BPJS</td><td>:</td><td><?php echo $bpjsTotal ?></td>
       </tr>
</table>

<?php redirect('admin/laporan_transkasi/bulanan','refresh'); ?>