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
<table width="100%">
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
        $tanggal1 = date('Y-m-d',strtotime('2024-02-01'));
        $tanggal2 = date('Y-m-d',strtotime('2024-02-30'));
    
        while ($tanggal1 <= $tanggal2) {
           
        ?>    

        <tr>
            <td align='center'><?php echo $i;?></td>

            <td><?php echo $tanggal1;?></td>

            <td>
                <?php
                    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."'")->result();
                    $jumT = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT += $value->jumlah;
                        }
                    }
                    echo $jumT;
                ?>
            </td>

            <td></td>

            <td>
            <?php
                    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."' AND pembayaran = 'bank'")->result();
                    $jumT = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT += $value->jumlah;
                        }
                    }
                    echo $jumT;
                ?>
            </td>

            <td>
            <?php
                    $total_transaksi=$this->db->query("SELECT * from transaksi WHERE tanggal = '".$tanggal1."' AND pembayaran = 'bank'")->result();
                    $jumT = 0;
                    foreach($total_transaksi as $value){
                        if($value->tanggal == $tanggal1){
                            $jumT += $value->jumlah;
                        }
                    }
                    echo $jumT;
                ?>
            </td>

            <td></td>

            <td></td>

        </tr>

        <?php  
            $tanggal1 = date('Y-m-d',strtotime('+1 days',strtotime($tanggal1))); 
            $i++; 
        } ?>
        
    </tbody>
</table>

<?php redirect('admin/laporan_transkasi/bulanan','refresh'); ?>