  <div class="wrapper">
      <section id="breadcrumb" class="hoc clear">
          <!-- ################################################################################################ -->
          <ul>
              <li><a href="<?php echo base_url();?>homepage">Home</a></li>
              <li><a href="#">History Transaksi</a></li>
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
                          <th style="display: none"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                                if (!empty($trx)) {
                                    foreach ($trx as $paket) {
                            ?>
                      <tr>
                          <td style="display: none"><?=$paket->id_transaksi?></td>
                          <td><?=$paket->kd_transaksi?></td>
                          <td><?=$paket->nm_paket_wisata?></td>
                          <td><?=$paket->booking_date?></td>
                          <td><?=$paket->tour_date?></td>
                          <td><?=$paket->jml_peserta?></td>
                          <td>Rp. <?=number_format($paket->total_harga)?></td>
                          <td>
                              <?php if($paket->status=='Selesai'){
                                            echo "<a class='btn btn-success btn-sm text-light'>$paket->status</a>";
                                        } else if($paket->status=='Dibatalkan'){
                                            echo "<a class='btn btn-danger btn-sm text-light'>$paket->status</a>";
                                        } ?>
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
    <
    ? php
    if (!empty($notif)) {
        ? >
        let alert = $('.alert');
        setTimeout(() => {
            alert.css('display', 'none');
        }, 3000); <
        ? php
    } ? >
    var passedArray = < ? php echo json_encode($dataUser); ? > ;
    $('#id_user').val(passedArray.id_user)
    $('#nama_pemesan').val(passedArray.nm_depan + ' ' + passedArray.nm_belakang)
    $('#email_pemesan').val(passedArray.email)

})
  </script>