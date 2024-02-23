<html>
    <head>
        <title>Laporan Database</title>
    </head>
    <body>
        <h2>Tanggal Cetak Laporan Transaksi</h2>
        <div>
            <table border="1" style="border-collapse: collapse" width="100%">
                <tr align="center" style="background-color:#29cc29">
                    <td rowspan="2">No</td><td rowspan="2">Nota</td><td colspan="3">Keterangan</td><td rowspan="2">Total Harga</td><td rowspan="2">BPJS</td><td rowspan="2">Uang Muka</td><td rowspan="2">Status Bayar</td><td rowspan="2">Sisa</td>
                </tr>
                <tr align="center" style="background-color:#29cc29">
                    <td>Frame</td><td>Lensa</td><td>Keterangan</td>
                </tr>
                
                <?php 
                $no =1;
                $uangmuka = 0;
                foreach($transaksi as $value){
                    $lensa=$this->db->query("SELECT * from stock_lensa where id=".$value->lensa."")->row();
                    $frame=$this->db->query("SELECT * from stock_frame where id=".$value->frame."")->row();
                echo "<tr align='center'>
                   <td>".$no++."</td><td>".$value->nota."</td><td>".$frame->nama."</td><td>".$lensa->jenis_lensa."</td><td>".$value->keterangan."</td><td>".number_format($value->jumlah)."</td><td>".number_format($value->bpjs)."</td><td>".number_format($value->uang_muka)."</td><td>".$value->pembayaran."</td><td>".$value->sisa."</td>
                </tr>";
                $uangmuka+=$value->uang_muka;
                } ?>
            </table>
            <table>
            <tr border="none" align="right" width="100%">
                    <td width="700px">Total Transaksi (Uang Muka):</td><td><?php echo number_format($uangmuka) ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>