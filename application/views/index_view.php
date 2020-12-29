<div class="wrapper">
    <div id="pageintro" class="hoc clear"> 
      
      <article>
        <div>
          <p class="heading">Biro Perjalanan</p>
          <h2 class="heading">Tour and Travel</h2>
          <p>Solusi terbaik dalam menentukan liburan dengan biro jasa tour & travel yang siap melayani dengan setulus hati.</p>
        </div>
        <footer>
          <ul class="nospace inline pushright">
            <li><a class="btn inverse" href="<?php echo base_url();?>homepage/wisata">Wisata</a></li>
            <li><a class="btn inverse" href="<?php echo base_url();?>homepage/paket">Paket Wisata</a></li>
          </ul>
        </footer>
      </article>
      
    </div>
  </div>
  
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Info Profile Cahaya Travelindo</h6>
      <p>Perusahaan biro perjalanan wisata tour & travel</p>
    </div>
    <div class="group">
      <div class="one_half first">
          <article>
              <h6 class="heading font-x1">Profile Cahaya Travelindo</h6>
              <a href="<?php echo base_url();?>homepage/about" title="Lihat lebih detail &raquo;"><i class="btmspace-30 fa fa-4x fa-institution"></i></a>
          </article>
        <p>Biro perjalanan wisata <i>CAHAYA TRAVELINDO Tour & Travel</i> adalah perusahaan yang bergerak dalam bidang jasa pariwisata.</p>
        <p class="btmspace-50">Hampir 6 tahun <i>CAHAYA Travelindo Tour & Travel</i> hadir dan ikut serta di dalam memajukan dunia pariwisata Indonesia khususnya pariwisata di propinsi Jawa Timur.</p>
        <ul class="nospace group">
          <li class="one_half first">
          
          </li>
        </ul>
      </div>
      <div class="one_half"><img class="img-thumbnail" src="assets/logo/cahayatravel-new.png" alt=""></div>
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace group cta">
      <li class="one_third first">
        <article><i class="fa fa-book"></i>
          <h6 class="heading font-x1"><a href="<?php echo base_url();?>homepage/history" title="Lihat History Transaction &raquo;">History Transaction</a></h6>
          <p>Informasi daftar history transaction yang telah anda pesan.</p>
        </article>
      </li>
      <li class="one_third">
        <article><i class="fa fa-comment"></i>
          <h6 class="heading font-x1"><a href="<?php echo base_url();?>homepage/contact" title="Hubungi Kami &raquo;">Contact Us</a></h6>
          <p>Berikan saran dan masukan kepada kami. Silahkan hubungi kami.</p>
        </article>
      </li>
      <li class="one_third">
        <article><i class="fa fa-map-o"></i>
          <h6 class="heading font-x1"><a href="<?php echo base_url();?>homepage/wisata" title="Lihat Daftar Destination Wisata &raquo;">Destination Wisata</a></h6>
          <p>Informasi seputar destination wisata di Indoensia.</p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">Paket Wisata Cahaya Travelindo</h6>
      <br>
      <p>Pilihan paket wisata untuk anda</p>
      <!-- <p>Dokumentasi Pengguna Jasa Tour & Travel Cahaya Travelindo</p> -->
    </div>
      <div class="content">
              <div class="row" id="MyCards">
                  <?php
                  $counter = 0;
                    
                  foreach ($paket_wisata as $row) {
                    if ($counter >= 3) {
                      break;
                    }
                    $counter++;
                    ?>
                      <div data-kategori="<?=$row->kategori?>" data-seat="<?=$row->set_peserta?>" class="col-sm-4 filter-card p-4" >
                          <div class="card" style=" height: 100%">
                              <div class="card-img-holder" style="height: 270px">
                                  <img class="card-img-top" style="height: 100%" src="<?php echo base_url();?>upload/<?=$row->gambar?>"alt="Card image cap">
                              </div>
                              <div class="card-body" style="position: relative; height: 250px">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <h3 class="card-title"><?=$row->nama_paket?></h3>
                                      </div>
                                      <div class="col-sm-6">
                                          <p class="card-text text-secondary pull-right"><?=$row->kategori?></p>
                                      </div>
                                  </div>
                                  <br>
                                  <p class="heading font-x1"><span>Rp. <?=number_format($row->harga_paket)?></span> / Orang</p>
                                  <p class="card-text text-secondary">Kapasitas Seat: <?=$row->set_peserta?></p>
                                  <div class="btn-holder d-flex justify-content-center" style="position: absolute; width: 100%; bottom: 0; right: 0; padding: 15px;">
                                      <button onclick="location.href='<?php echo base_url('homepage/detail_paket/')?><?=$row->id_paket_wisata?>'" class="btn btn-info btn-block">Detail</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php } ?>
              </div>
          </div>
          <br>
          <center>
          <a class="btn inverse" href="<?php echo base_url();?>homepage/paket">See More &raquo;</a>
          </center>
        </div>
      </div>


<div class="wrapper bgded overlay" style="background-image:url('<?php echo base_url();?>assets/images/demo/backgrounds/cobadulu.jpg');">
  <article class="hoc container clear center"> 
    <br>
    <br>
    <div class="sectiontitle" style="margin-bottom:30px;">
    <h6 class="heading">Paket Customize</h6>
    <p>Kini Cahaya Travel menyediakan Paket Customize.</p>
    </div>
    <p><a class="btn inverse" href="<?php echo base_url();?>homepage/paket_customize">Go to Travelling &raquo;</a></p>
  </article>
  <br>
</div>



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
      <center>
          <a class="btn inverse" href="<?php echo base_url();?>homepage/gallery">See More &raquo;</a>
      </center>
    </div>
  </div>


<?php $this->load->view('footer'); ?>



<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
