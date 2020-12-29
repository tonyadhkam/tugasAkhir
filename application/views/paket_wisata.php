  <!-- ################################################################################################ -->
  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="#">Form Pemesanan</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Form Pemesanan - Cahaya Travel</h6>
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
            <div class="square border mr-2" style="width: 35px; text-align: center">
                <h3>1</h3>
            </div>
            <h3>Paket Wisata</h3>
        </div>
        <br>
        <form action="<?php echo base_url();?>homepage/paket_wisata/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
            <div class="bg-white mt-2 row3 holder-input">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Paket</h4>
                            </div>
                            <div class="col-7">
                                <input class="form-control" type="text" name="id_user" id="id_user" style="display: none">
                                <select class="form-control" name="paket_id" id="paket_id" >
                                    <?php
                                        if ($this->uri->segment(3) == 'customize') {
                                            foreach ($dataPaket as $key ) {
                                    ?>
                                        <option value="<?= $this->uri->segment(4)?>"><?=$key->nm_daftar_paket ?></option>
                                    <?php 
                                            }
                                        } else {
                                            foreach ($dataPaket as $key ) {
                                    ?>
                                        <option value="<?= $key->id_paket_wisata?>"><?=$key->nama_paket ?></option>
                                    <?php }} ?>
                                </select>
                                <input type="text" class="form-control" name="nm_paket_wisata" id="nm_paket_wisata" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Titik Penjemputan</h4>
                            </div>
                            <div class="col-7">
                                <select class="form-control" name="titik_penjemputan" id="titik_penjemputan">
                                    <?php foreach ($dataTitikJemput as $key ) { ?>
                                        <option value="<?= $key->id_titik_jemput?>"><?= $key->titik_jemput ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Kapasitas Seat</h4>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="kapasitas_seat" id="kapasitas_seat" readonly>
                                    </div>
                                    x
                                    <div class="col-5 col-sm-3">
                                    <input type="number" class="form-control form-control-sm" min="1" name="kelipatan_seat" id="kelipatan_seat" value='1'>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Tanggal Keberangkatan</h4>
                            </div>
                            <div class="col-7">
                                <input class="form-control datepicker" data-date-format="yyyy/mm/dd" name="tanggal_keberangkatan">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Jumlah Peserta</h4>
                            </div>
                            <div class="col-3 col-sm-2">
                            <input type="text" class="form-control form-control-sm" name="jml_peserta" id="jml_peserta" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Harga Paket</h4>
                            </div>
                            <div class="col-7">
                            <div class="row">
                                <div class="col-7">
                                    <input type="text" class="form-control form-control-sm" name="harga_paket" id="harga_paket" readonly>
                                </div>
                                / orang
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="d-flex flex-row align-items-center mt-2">
                <div class="square border mr-2" style="width: 35px; text-align: center">
                    <h3>2</h3>
                </div>
                <h3>Data Transaksi</h3>
            </div>
            <br>
            <div class="mt-2">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-8">
                        <div class="row3 holder-input">
                            <div class="col-12">
                                <div class="row align-items-center p-4">
                                    <div class="col-5">
                                        <h4>Total Bayar</h4>
                                    </div>
                                    <div class="col-7">
                                        <input type="text" class="form-control" name="total_bayar" id="total_bayar" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ml-auto ml-sm-0 mt-2 mt-sm-0">
                        <input type="submit" name="add" class="btn btn-info btn-block" id="booking" style="height: 50px;" value="Booking" />
                    </div>
                </div>
            </div>
            
        </form>
    <!-- / main body -->
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
    $( document ).ready(function() {
        <?php if (!empty($notif)) { ?>
            let alert = $('.alert');
            setTimeout(() => {
                alert.css('display', 'none');
            }, 3000);
        <?php } ?>
        <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
            var dataUser = <?php echo json_encode($dataUser); ?>;
            $('#id_user').val(dataUser.id_user);
        <?php } ?>

        var passedArray = <?php echo json_encode($dataPaket); ?>;
        
        

        var jml_bayar;
        var total_bayar;
        var kapasitas_seat;

        $('#kelipatan_seat').change(() => {
            let kelipatan = $('#kelipatan_seat'). val();
            
            let jml_peserta = kapasitas_seat * kelipatan
            $('#total_bayar').val((jml_bayar * jml_peserta))
            $('#jml_peserta').val(jml_peserta)
        })

        let url = (window.location.href).split('/');
        let kategori = url[5]
        let aa = $("#paket_id").val();

        if (kategori == "umum" || kategori == "siswa") {
            var value = $("#paket_id").val();
            passedArray.forEach(e => {
                if (value == e.id_paket_wisata) {
                    $('#kapasitas_seat').val(e.set_peserta)
                    $('#harga_paket').val(e.harga_paket);
                    $('#nm_paket_wisata').val(e.nama_paket);
                    kapasitas_seat = e.set_peserta
                    jml_bayar = e.harga_paket
                    total_bayar = jml_bayar * kapasitas_seat
                    $('#total_bayar').val(total_bayar)
                    $('#jml_peserta').val(e.set_peserta)
                }
            })
        } else {
            passedArray.forEach(e => {
                $('#kapasitas_seat').val(e.seat)
                $('#jml_peserta').val(e.seat);
                $('#harga_paket').val(e.harga_paket);
                $('#nm_paket_wisata').val(e.nm_daftar_paket);
                jml_bayar = e.harga_paket
                kapasitas_seat = e.seat
                total_bayar = jml_bayar * kapasitas_seat
                $('#total_bayar').val(total_bayar)
            })
        }
    })
</script>
