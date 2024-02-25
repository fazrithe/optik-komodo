<?php 
  $this->load->view('admin/master/head');
?>
  <body>
  <?php 
    $this->load->view('admin/master/navbar');
  ?>


    <div class="container mt-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">
            <a href="pengeluaran.html">Pengeluaran</a>
          </li>

          <li class="breadcrumb-item active" aria-current="page">
            Pengeluaran bulanan
          </li>
        </ol>
      </nav>
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th class="d-on" scope="col">Keterangan</th>
                <th class="d-on" scope="col">Total</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $value) { ?>
              <tr>
                <th scope="row"><input type="hidden" name="id" id="id" value="<?php echo $value->id ?>"><?php echo $value->id ?></th>
                <td><?php echo $value->nama ?></td>

                <td>
                  <input
                    type="number"
                    id="jumlah<?php echo $value->id ?>"
                    name="jumlah"
                    class="form-control"
                    placeholder="Rp. 100.000.000"
                    value="<?php echo $value->jumlah ?>"
                    aria-describedby="passwordHelpInline"
                  />
                </td>
                <td>
                  <button type="submit" class="btn btn-success" onclick="simpan(<?php echo $value->id ?>)">Simpan</button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
      document
        .getElementById("inputState")
        .addEventListener("change", function () {
          var selectedOption = this.value;
          if (selectedOption === "Umum") {
            document
              .getElementById("harga")
              .closest(".mb-3")
              .classList.remove("d-none");
          } else {
            document
              .getElementById("harga")
              .closest(".mb-3")
              .classList.add("d-none");
          }
        });

        function simpan(id){
          jumlah = $('#jumlah'+id).val();
          url = "<?=base_url('admin/pengeluaran/add_bulanan')?>";
          $.ajax({
                url : url,
                type: "POST",
                data: {id: id, jumlah: jumlah},
                dataType: "json",
                success: function(data)
                {
                    window.location.reload();
                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        }
    </script>
  </body>
</html>