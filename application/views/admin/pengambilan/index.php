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
          <li class="breadcrumb-item active" aria-current="page">
            Pengambilan kacamata
          </li>
        </ol>
      </nav>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Masukan Nota"
              aria-label="Masukan Nota"
              aria-describedby="button-addon2"
              id="noNota"
            />
            <button class="btn btn-success" type="button" id="button-addon2" onclick="pengambilan()">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4ZM2 8C2 4.68629 4.68629 2 8 2C11.3137 2 14 4.68629 14 8C14 9.29583 13.5892 10.4957 12.8907 11.4765L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L11.4765 12.8907C10.4957 13.5892 9.29583 14 8 14C4.68629 14 2 11.3137 2 8Z"
                  fill="white"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-end">
        <div class="col-12">
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th class="d-on" scope="col">Nota</th>
                <th scope="col">Frame</th>
                <th scope="col">Lensa</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Sisa</th>
                <th scope="col">Status</th>
                <th scope="col">Pembayaran</th>
              </tr>
            </thead>
            <tbody id="last">
             
            </tbody>
          </table>
        </div>
        <div class="col-md-2">
          <button style="width: 100%" type="submit" class="btn btn-success" onclick="selesai()">
            Selesai
          </button>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <!-- <script>
      document
        .getElementById("button-addon2")
        .addEventListener("click", function () {
          document.querySelector(".opacity-0").classList.remove("opacity-0");
        });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?=base_url();?>assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script
      src="<?php echo base_url().'assets/js/custom.js'?>"></script>
      <script>
        function pengambilan(){
            noNota = $('#noNota').val();
            var formData = {
                no_nota: noNota,
            };
            $.ajax({
                url : "pengambilan/search",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(data)
                {
                    if(data.length > 0){
                        let dataTable1 = '';
                        $.each(data, function(key, value){
                            if(value.status_pengambilan == '1'){
                              status = 'Telah diambil';
                            }else{
                              status = 'Belum diambil'
                            }
                            dataTable1 +=`<tr><td><input type="hidden" id="transaksiId" value=`+value.id+`>`+value.nota+`</td><td>`+value.nama_frame+`</td><td>`+value.jenis_lensa+`</td><td>`+value.tanggal+`</td><td>`+value.sisa+`</td><td>`+status+`</td><td>` 
                            + `<div class="form-floating">`
                                + `<select class="form-select" id="pembayaran" aria-label="Floating label select example">`
                                + `<option selected value="1">Cash</option>
                                <option value="2">Qris</option>
                                <option value="2">EDC</option>
                                <option value="2">Transfer</option>
                                </select>
                                <label for="floatingSelect">Pembayaran melalui</label>`
                                + `</div></td></tr>`;
                            
                        });
                        $('#myTable tbody').append(dataTable1); 
                    }else{
                        alert('Data tidak ditemukan');
                    }
                 
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Data tidak ditemukan');
                }
            });
        }

        function selesai(){
          id = $('#transaksiId').val();
          Swal({
            title: 'Anda yakin?',
            text: "Data transaksi ini telah selesai!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Selesai data!'
          }).then((result) => {
              if(result.value) {
                  $.ajax({
                      url : "<?=base_url('admin/pengambilan/selesai/')?>/"+id,
                      type: "POST",
                      success: function(data)
                      {
                          // reload_ajax();
                          alert('Telah Selesai');
                          window.location.reload();
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error deleting data');
                      }
                  });
              }
          });
        }
      </script>
  </body>
</html>