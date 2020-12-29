  <div class="wrapper">
      <section id="breadcrumb" class="hoc clear">
          <!-- ################################################################################################ -->
          <ul>
              <li><a href="<?php echo base_url();?>homepage">Home</a></li>
              <li><a href="#">Data Order</a></li>
          </ul>
          <!-- ################################################################################################ -->
          <h6 class="heading">Data Order - Cahaya Travel</h6>
          <!-- ################################################################################################ -->
      </section>
  </div>
  <!-- ################################################################################################ -->
  </div>
  <!-- End Top Background Image Wrapper -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
      <main class="hoc container clear">
          <!-- main body -->
          <?php
        $notif = $this->session->flashdata('notif');
        $alert = $this->session->flashdata('alert');
        if (!empty($notif)) { ?>
          <div class="alert <?=$alert; ?> align-self-start">
              <?= $notif; ?>
          </div>
          <?php } ?>
          <div class="d-flex flex-row align-items-center">
              <h3>Data Order</h3>
          </div>
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th style="display: none">ID Paket</th>
                          <th>KD Transaksi</th>
                          <th>Nama Paket</th>
                          <th>Tgl Booking</th>
                          <th>Tgl Tour</th>
                          <th>Peserta</th>
                          <th>Total Harga</th>
                          <th>Status</th>
                          <th>Actions</th>
                          <th style="display: none"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                                if (!empty($trx)) {
                                    foreach ($trx as $data_order) {
                            ?>
                      <tr>
                          <td style="display: none"><?=$data_order->id_transaksi?></td>
                          <td><?=$data_order->kd_transaksi?></td>
                          <td><?=$data_order->nm_paket_wisata?></td>
                          <td><?=$data_order->booking_date?></td>
                          <td><?=$data_order->tour_date?></td>
                          <td><?=$data_order->jml_peserta?></td>
                          <td>Rp. <?=number_format($data_order->total_harga)?></td>
                          <td>
                              <?php if($data_order->status=='Menunggu Validasi Paket'){
                                            echo "<a class='btn btn-success btn-sm text-light'>$data_order->status</a>";
                                        } else if($data_order->status=='Menunggu Verifikasi'){
                                            echo "<a class='btn btn-info btn-sm text-light'>$data_order->status</a>";
                                        } else if($data_order->status=='Menunggu Pembayaran'){
                                            echo "<a class='btn btn-warning btn-sm text-light'>$data_order->status</a>";
                                        } else if($data_order->status=='Proses'){
                                            echo "<a class='btn btn-primary btn-sm text-light'>$data_order->status</a>";
                                        } else if($data_order->status=='Dibatalkan'){
                                            echo "<a class='btn btn-danger btn-sm text-light btn-block'>$data_order->status</a>";
                                        } ?>
                          </td>
                          <td>
                              <?php if($data_order->status=='Menunggu Pembayaran'): ?>
                              <a class="btn btn-warning" id="btn-upload-bukti" data-id="<?=$data_order->id_transaksi?>"
                                  data-toggle="modal" data-target="#myBuktiTrfModal" style="color:white;">Upload Bukti</a>
                              <a onclick="return confirm('Apakah anda yakin untuk membatalkan transaksi?');"
                                  href="<?php echo base_url();?>homepage/order_cancel/<?=$data_order->id_transaksi?>"
                                  class="btn btn-danger"><i class="fa fa-close"></i> Batalkan</a>
                              <?php endif; ?>
                          </td>
                      </tr>
                      <?php
                                    }
                                } else {
                            ?>
                      <tr>
                          <td colspan="8">Data Kosong</td>
                      <tr>
                          <?php
                                }
                            ?>
    
                  </tbody>
              </table>
          </div>
          <!-- / main body -->
          <div class="modal fade" tabindex="-1" role="dialog" id="myBuktiTrfModal">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Upload Bukti Transfer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo base_url();?>homepage/orderVerification"
                              enctype="multipart/form-data" method="post">
                              <div class="bg-white mt-2 row3 holder-input">
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="row align-items-center p-4">
                                              <div class="col-5">
                                                  <h4>Pilih Gambar</h4>
                                              </div>
                                              <div class="col-7">
                                                  <input type="hidden" name="idtransaction" id="idtransaction"
                                                      value="" />
                                                  <input required type="file" name="gambar">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer bg-whitesmoke br">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="submit" name="upload" value="UPLOAD" class="btn btn-warning" />
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="clear"></div>
      </main>

      <main class="hoc container clear">
          <!-- main body -->
          <div class="d-flex flex-row align-items-center">
              <h3>Pending Order</h3>
          </div>
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th style="display: none">ID Paket</th>
                          <th style="display: none">ID Paket Wisata</th>
                          <th style="display: none">kategori</th>
                          <th>KD Booking</th>
                          <th>Nama Paket Wisata</th>
                          <th>Booking Date</th>
                          <th>Tour Date</th>
                          <th>Total Harga</th>
                          <th>Kategori</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                                if (!empty($trxr)) {
                                    foreach ($trxr as $paket) {
                            ?>
                      <tr>
                          <td style="display: none"><?=$paket->id_booking?></td>
                          <td style="display: none"><?=$paket->id_paket_wisata?></td>
                          <td style="display: none"><?=$paket->kategori?></td>
                          <td><?=$paket->kd_booking?></td>
                          <td><?=$paket->nm_paket_wisata?></td>
                          <td><?=$paket->booking_date?></td>
                          <td><?=$paket->tour_date?></td>
                          <td>Rp. <?=number_format($paket->total_harga)?></td>
                          <td><?=$paket->kategori?></td>
                          <td>
                              <?php if($paket->status_booking=='pending'): ?>
                              <a class="btn btn-success btnLanjut" style="color:white;">Lanjutkan</a>
                              <a class="btn btn-danger btnBatal" style="color:white;"><i class="fa fa-close"></i> Batalkan</a>
                              <?php endif; ?>
                          </td>
                      </tr>
                      <?php
                                    }
                                } else {
                            ?>
                      <tr>
                          <td colspan="7">Data Kosong</td>
                      <tr>
                          <?php
                                }
                            ?>
    
                  </tbody>
              </table>
          </div>
          <!-- / main body -->
          <div class="modal fade" tabindex="-1" role="dialog" id="myBuktiTrfRequestModal">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Upload Bukti Transfer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo base_url();?>homepage/orderVerificationRequest"
                              enctype="multipart/form-data" method="post">
                              <div class="bg-white mt-2 row3 holder-input">
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="row align-items-center p-4">
                                              <div class="col-5">
                                                  <h4>Pilih Gambar</h4>
                                              </div>
                                              <div class="col-7">
                                                  <input type="hidden" name="idtransaction" id="idtransaction-request"
                                                      value="" />
                                                  <input required type="file" name="gambar">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer bg-whitesmoke br">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="submit" name="upload" value="UPLOAD" class="btn btn-warning" />
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="clear"></div>
      </main>
  </div>
  <br>
  <br>
  <br>
  <br>
  <?php $this->load->view('footer'); ?>

  <script>
$('.datepicker').datepicker({
    uiLibrary: 'bootstrap4'
});

$(document).ready(function() {
    <?php
    if (!empty($notif)) {
        ?>
        let alert = $('.alert');
        setTimeout(() => {
            alert.css('display', 'none');
        }, 3000); <?php
    } ?>
    var passedArray = <?php echo json_encode($trxr); ?> ;
    $('.btnLanjut').on('click', function() {
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        let id_booking = data[0];
        let kategori = data[2];
        let kd_booking = data[3];

        window.location = 'data_pemesan/' + kategori + '/' + id_booking + '/' + kd_booking;
    });


    $('.btnBatal').on('click', function() {
        if (confirm("Apakah anda yakin untuk membatalkan proses pemesanan?")) {
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            let id_paket_wisata = data[1];
            let kategori = data[2];
            let kd_booking = data[3];

            window.location = 'order/delete/' + id_paket_wisata + '/' + kategori + '/' + kd_booking;
        }
    });

    $('#id_user').val(passedArray.id_user)
    $('#nama_pemesan').val(passedArray.nm_depan + ' ' + passedArray.nm_belakang)
    $('#email_pemesan').val(passedArray.email)

})
  </script>