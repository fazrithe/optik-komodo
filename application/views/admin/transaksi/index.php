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
          <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
      </nav>
    </div>
    <div class="container rounded box-card mt-2">
      <div class="row align-items-center justify-content-between">
        <div class="col-4">
          <img class="mb-3" height="140" src="img/logo-black.png" alt="" />
          <img height="40" src="img/BPJS_Kesehatan_logo.svg" alt="" />
        </div>
        <div class="col-6">
          <div class="row justify-content-end mb-3">
            <div class="col-7 d-flex gap-3">
              <div class="form-check">
                <input
                  checked
                  class="form-check-input"
                  type="radio"
                  name="paket"
                  value="bpjs"
                  id="flexRadioDefault1"
                />
                <label class="form-check-label" for="flexRadioDefault1">
                  PAKET BPJS
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="paket"
                  id="flexRadioDefault2"
                  value="non_bpjs"
                />
                <label class="form-check-label" for="flexRadioDefault2">
                  NON PAKET BPJS
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="paket"
                  value="umum"
                  id="flexRadioDefault2"
                />
                <label class="form-check-label" for="flexRadioDefault2">
                  UMUM
                </label>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-5">
              <div class="input-group mb-3">
                <span class="input-group-text" id="nota"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"
                      fill="black"
                    /></svg
                ></span>
                <input
                  value="2024-01-30"
                  type="date"
                  class="form-control"
                  disabled
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container position-relative mt-5">
      <div class="row">
        <div class="col-6">
          <div class="box-card">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Masukan ID"
                aria-label="Masukan ID"
                aria-describedby="button-addon2"
                name="pengguna_id"
              />
              <button class="btn btn-success" type="button" onclick="searchId()">
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
            <form class="row mt-3 g-3 d-none">
              <div class="col-md-6">
                <label for="nota" class="form-label">Nota</label>
                <input type="email" class="form-control" id="nota" />
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label"
                  >Resep Dokter</label
                >
                <input type="text" class="form-control" id="resepDokter" name="resep" />
              </div>
              <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama"
                  name="nama"
                  placeholder=""
                />
              </div>
              <div class="col-md-6">
                <label for="bpjs" class="form-label">No. BPJS</label>
                <input
                  type="text"
                  class="form-control"
                  id="no_bpjs"
                  name="no_bpjs"
                  placeholder=""
                />
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="inputCity" name="alamat" />
              </div>
              <div class="col-md-6">
                <label for="telp" class="form-label">No. Telp</label>
                <input type="text" class="form-control" id="telp" name="no_telp" />
              </div>
            </form>
          </div>
        </div>
        <div class="col-6">
          <div>
            <div class="box-card">
              <h4>Status refraksi</h4>
              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">SPH</th>
                    <th scope="col">CYL</th>
                    <th scope="col">AXIS</th>
                    <th scope="col">V/A</th>
                    <th scope="col">PD</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">OD</th>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="od_s"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="od_c"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="od_x"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="od_v"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="od_p"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">OS</th>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="os_s"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="os_c"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="os_x"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="os_v"
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="os_p"
                      />
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">ADD OD</th>
                    <td colspan="2">
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="status_od"
                      />
                    </td>
                    <th scope="row">
                      ADD <br />
                      OS
                    </th>
                    <td colspan="2">
                      <input
                        type="text"
                        class="form-control"
                        aria-label="Nota"
                        aria-describedby="nota"
                        name="status_os"
                      />
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <form class="row g-3 mt-3">
              <div class="box-card">
                <div class="d-flex">
                  <div class="input-group mb-3">
                  <span class="input-group-text">Lensa</span>
                    <div class="form-floating">
                      <select class="form-select form-frame" name="frame" id="lensa">
                      <?php foreach($frame->result_array() as $value){ ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nama'] ?></option>
                      <?php } ?>
                      </select>
                      <label for="floatingInputGroup1"
                        >Masukan jenis frame</label
                      >
                    </div>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Lensa</span>
                    <div class="form-floating">
                      <select class="form-select form-frame" name="lensa" id="lensa">
                      <?php foreach($lensa->result_array() as $value){ ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['jenis_lensa'] ?></option>
                      <?php } ?>
                      </select>
                      <label for="floatingInputGroup1"
                        >Masukan jenis lensa</label
                      >
                    </div>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Keterangan</span>
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control form-frame"
                        id="frame"
                        placeholder="Username"
                        name="keterangan"
                      />
                      <label for="floatingInputGroup1"
                        >Masukan keterangan lensa</label
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8 box-card mt-5 mb-4 offset-md-4">
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="" />
                </div>
                <div class="mb-3">
                  <label for="bpjs" class="form-label">BPJS</label>
                  <select id="bpjsHitung" class="form-select" nama="bpjs">
                    <option value="330000" selected>Kelas 1 - Rp. 330.000</option>
                    <option value="220000">Kelas 2 - Rp. 220.000</option>
                    <option value="165000">Kelas 3 - Rp. 165.000</option>
                    <option value="0">Umum</option>
                  </select>
                </div>
                <label for="uangMuka" class="form-label">Uang muka</label>
                <input type="text" class="form-control" id="uangMuka" name="uang_muka" value="0" />
                <div class="form-floating mt-3 mb-3">
                  <select
                    class="form-select"
                    id="pembayaran"
                    aria-label="Floating label select example"
                    aria-placeholder="test"
                    name="pembayaran"
                  >
                    <option value="" selected>-</option>

                    <option value="qris">Qris</option>
                    <option value="edc">EDC</option>
                    <option value="transfer">Transfer</option>
                    <option value="cash">Cash</option>
                  </select>
                  <label for="floatingSelect">Pembayaran melalui</label>
                </div>
                <div class="">
                  <label for="sisa" class="form-label">Sisa</label>
                  <input
                    readonly
                    placeholder="170.000"
                    type="text"
                    class="form-control"
                    id="sisa"
                    name="sisa"
                  />
                </div>
                <div class="mb-5 mt-3">
                  <div id="liveAlertPlaceholder"></div>
                  <button
                    style="width: 100%"
                    type="button"
                    class="btn btn-success"
                    id="liveAlertBtn"
                    onclick="selesai()"
                  >
                    Selesai
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script
      src="<?php echo base_url().'assets/js/custom.js'?>"></script>
    <!-- <script>
      document
        .getElementById("button-addon2")
        .addEventListener("click", function () {
          document.querySelector(".d-none").classList.remove("d-none");
        });
      const alertPlaceholder = document.getElementById("liveAlertPlaceholder");
      const appendAlert = (message, type) => {
        const wrapper = document.createElement("div");
        wrapper.innerHTML = [
          `<div class="alert alert-${type} position-absolute bottom-0 start-0 alert-dismissible" role="alert">`,
          `    <div>${message}</div>`,
          '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
          "</div>",
        ].join("");

        alertPlaceholder.append(wrapper);
      };

      const alertTrigger = document.getElementById("liveAlertBtn");
      if (alertTrigger) {
        alertTrigger.addEventListener("click", () => {
          appendAlert("Transaksi berhasil dilakukan!", "success");
        });
      }

    </script> -->

  </body>
</html>
