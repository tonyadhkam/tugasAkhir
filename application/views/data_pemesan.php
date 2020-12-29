  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="#">Form Pemesanan</a></li>
        <li><a href="#">Form Identitas Pemesan</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Form Identitas Pemesan - Cahaya Travel</h6>
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
            <h3>Data Pemesan</h3>
        </div>
        <form action="<?php echo base_url();?>homepage/data_pemesan/<?php echo $kategori ?>" method="post">
            <div class="bg-white mt-2 row3 holder-input">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Nama Pemesan</h4>
                            </div>
                            <div class="col-7">
                                <input class="form-control" type="text" name="nama_pemesan" id="nama_pemesan" required>
                                <input class="form-control" type="text" name="id_user" id="id_user" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>NIK</h4>
                            </div>
                            <div class="col-7">
                                <input class="form-control" type="number" name="nik_pemesan" id="nik_pemesan" placeholder="Nomer Induk Kependudukan" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Alamat Penjemputan</h4>
                            </div>
                            <div class="col-7">
                                <textarea class="form-control" name="alamat_pemesan" id="alamat_pemesan" rows="3" placeholder="Alamat Penjemputan" required></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Email Pemesan</h4>
                            </div>
                            <div class="col-7">
                            <input type="email" class="form-control" name="email_pemesan" id="email_pemesan" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>No Yang Dapat Dihubungi</h4>
                            </div>
                            <div class="col-7">
                                <input type="number" class="form-control" name="no_telepon" id="no_telepon" placeholder="+62 xx xxxx xxxxx" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <div class="p-4">
                        <input type="submit" name="add" class="btn btn-info" value="Pesan" />
                        <button class="btn btn-outline-dark">Cancel</button>
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
        var passedArray = <?php echo json_encode($dataUser); ?>;
        $('#id_user').val(passedArray.id_user)
        $('#nama_pemesan').val(passedArray.nm_depan+' '+passedArray.nm_belakang)
        $('#email_pemesan').val(passedArray.email)
        
    })
</script>