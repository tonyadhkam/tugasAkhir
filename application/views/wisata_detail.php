 <!-- ################################################################################################ -->
 <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/wisata">Wisata</a></li>
        <li><a href="#">Detail Wisata</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Detail Info Wisata - Cahaya Travel</h6>
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
    <div class="sectiontitle">
      <h6 class="heading">NAMA WISATA : <?=$wisata->nm_wisata?></h6>
      <p>Lokasi : <?=$wisata->tempat_wisata?></p>
    </div>
    <div class="group">
      <div class="one_half first" style="width:500px;height:350px;"><img style="width:100%;height:100%;" class="inspace-10 borderedbox" src="<?php echo base_url();?>upload/<?=$wisata->gambar?>" alt=""></div>
      <br>
      <div class="one_half">
      <h5>Description :</h5>
            <i><?=$wisata->desc?></i>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php $this->load->view('footer'); ?>