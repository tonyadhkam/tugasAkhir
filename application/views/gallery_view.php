  <!-- ################################################################################################ -->
  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/gallery">Gallery</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Gallery - Cahaya Travel</h6>
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
  <div class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">Gallery Cahaya Travelindo</h6>
      <p>Dokumentasi Pengguna Jasa Tour & Travel Cahaya Travelindo</p>
    </div>
    <ul class="nospace group services">
      <li class="one_third first btmspace-30">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery1.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 2 Palang to Bali.</p>
         </center>
      </li>
      <li class="one_third btmspace-30">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery2.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Umum)</a></h6>
          <p>Paket Family  Gathering Tour to Bali.</p>
         </center>
      </li>
      <li class="one_third btmspace-30">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery3.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Jogja (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 2 Tuban to Jogja.</p>
         </center>
      </li>
      <li class="one_third first">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery4.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Umum)</a></h6>
          <p>Paket Family  Gathering Tour to Bali.</p>
         </center>
      </li>
      <li class="one_third">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery5.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 4 Tuban to Bali.</p>
         </center>
      </li>
      <li class="one_third">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery6.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Jogja (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 2 Tuban to Jogja.</p>
         </center>
      </li>
      <li class="one_third first">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery7.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 4 Tuban to Bali.
      </li>
      <li class="one_third">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery8.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Bali (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 4 Tuban to Bali.</p>
         </center>
      </li>
      <li class="one_third">
        <article class="bgded" style="background-image:url('<?php echo base_url();?>assets/images/demo/gallery/gallery9.jpeg'); height: 250px;">
        </article>
        <br>
         <center>
          <h6 class="heading font-x1"><a href="#">Paket Wisata Jogja (Siswa)</a></h6>
          <p>Paket Study Tour SMP Negeri 2 Tuban to Jogja.</p>
         </center>
      </li>
    </ul>
  </div>
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
