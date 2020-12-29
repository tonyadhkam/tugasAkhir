  <!-- ################################################################################################ -->
  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/info">Info</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Profile - Cahaya Travel</h6>
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
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1>Cahaya Travelindo</h1>
      <br>
      <div class="text-center">
      <img class="img-thumbnail" style="background-image:url('<?php echo base_url();?>assets/images/demo/backgrounds/cahayatravel.png'); width: 620px; height: 200px;">
      <br>
      <br>
      <br>
      </div>
      <h5><b>Profile Perusahaan :</b></h5>
      <p>Biro Perjalanan Wisata CAHAYA TRAVELINDO Tour & Travel adalah perusahaan yang bergerak dalam bidang jasa pariwisata. CAHAYA TRAVELINDO Tour & Travel 
      memiliki kantor pusat  dan kantor cabang yang terletak di :<br>
       1. AKBP Suroko 408 Tuban (Kantor Pusat - Tuban) <br>
       2. Jl. Margo Basuki IV/15 dan Jl Tata Surya 6 Malang (Kantor Malang) <br>
       3. Jl. Singomenggolo 4 Ganting, Gedangan Sidoarjo (Kantor Sidoarjo)</p>
      <p>Kurang lebih hampir 6 tahun CAHAYA Travelindo Tour & Travel hadir dan ikut serta di dalam memajukan dunia pariwisata Indonesia khususnya pariwisata di Propinsi Jawa Timur.</p>
      <p>Hingga saat ini CAHAYA Travelindo Tour & Travel banyak sekali menangani program perjalanan wisata mulai dari kalangan sekolah, mahasiswa, perusahaan hingga instansi-instansi pemerintahan, dengan tujuan wisata domestik.</p>
      <p>CAHAYA TRAVELINDO Tour & Travel ditangani oleh tenaga yang professional di bidangnya, dimana akan berusaha untuk tetap menjaga komitmen dalam mengutamakan kepuasan dan kepercayaan Anda, serta memberikan pelayanan terbaik dengan harga yang terjangkau.</p>
      <br>
      <br>
      <h5><b>Visi Perusahaan :</b></h5>
      <p>CAHAYA TRAVELINDO Tour & Travel di dalam melayani customer mempunyai visi yaitu <i>“Memberikan standarisasi service pariwisata dengan mengutamakan kepuasan pelanggan”</i>.</p>
      <br>
      <br>
      <h5><b>Salam Penutup :</b></h5>
      <p>Besar harapan kami untuk dapat bekerjasama dan melayani Anda dengan sebaik-baiknya. Terima kasih atas kepercayaan anda untuk dapat menggunakan jasa kami.</p>
      <p> CAHAYA TRAVELINDO  Tour & Travel berharap dapat bekerjasama dengan anda dalam perjalanan wisata (tour) yang telah diprogram dan siap memberikan pelayanan terbaik dalam perjalanan wisata anda bersama biro perjalanan kami.</p>
      <p>Tidak lupa, segenap Karyawan dan Crew  CAHAYA TRAVELINDO Tour & Travel mengucapkan terimakasih atas kepercayaan anda menggunakan biro perjalanan kami.</p>
      <!-- ################################################################################################ -->
    
</div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
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
