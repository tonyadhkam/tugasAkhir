 <!-- ################################################################################################ -->
 <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/paket">Daftar Paket</a></li>
        <li><a href="#">Detail Paket Wisata</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Detail Paket - Cahaya Travel</h6>
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
      <h6 class="heading">DETAIL PAKET WISATA : <?=$paket->nama_paket?></h6>
      <p>Kategori : <?=$paket->kategori?></p>
    </div>
    <div class="group">
      <div class="one_half first">
        <ul class="nospace group">
          <li class="one_half first">
            <article><a href="#"><i class="btmspace-30 fa fa-4x fa-money"></i></a>
              <h6 class="heading font-x1">HARGA : Rp. <?=number_format($paket->harga_paket)?></h6>
              <i>(Harga sewaktu - waktu bisa berubah kapan saja.)</i>
            </article>
          </li>
          <li class="one_half">
            <article><a href="#"><i class="btmspace-30 fa fa-4x fa-user"></i></a>
              <h6 class="heading font-x1">KAPASITAS SEAT : <?=$paket->set_peserta?></h6>
            </article>
          </li>
        </ul>
        <br>
        <h6 class="heading font-x1">Deskripsi Paket : </h6>
        <p><?=$paket->desc_paket_wisata?></p>
        <br>
        <a href="<?=base_url('homepage/paket_wisata/')?><?=$paket->kategori?>/<?=$paket->id_paket_wisata?>" class="btn btn-info btn-lg" style="color:white;">Pesan Sekarang</a>
      </div>
      <div class="one_half">

        <img class="inspace-10 borderedbox" style="width :100%" src="<?php echo base_url();?>upload/<?=$paket->gambar?>" alt="">
      </div><br>
      <br>
      <div class="one_half" style="margin-top:40px;"> 
        <h6 class="heading font-x1">Objek Wisata : </h6>
        <p><?=$paket->objek_wisata?></p>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php $this->load->view('footer'); ?>