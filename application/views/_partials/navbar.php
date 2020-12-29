<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('<?php echo base_url();?>assets/images/demo/backgrounds/background.jpg');"> 
  
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      
      <div class="fl_left">
        <ul class="nospace">
          <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
          <li><a href="<?php echo base_url();?>homepage/info" style="color : white">Info</a></li>
          <li><a href="#" style="color : white">About</a></li>
          <li><a href="#" style="color : white">Contact</a></li>
          <?php
	          if($this->session->userdata('logged_in') == TRUE){
          ?>
          <li style="color : white"><i class="fa fa-user"></i>
          <?php
            echo $_SESSION['username'];
            ?>
          </li>
          <?php
	          }else{
	        ?>
              <li><a href="<?= base_url('login');?>" style="color : white">Log In</a></li>
              <?php
	            }
	            ?>
          
        </ul>
      </div>
      <div class="fl_right">
        <ul class="nospace">
          <li style="color : white"><i class="fa fa-phone"></i> +62813-3038-0285</li>
          <li style="color : white"><i class="fa fa-envelope-o"></i> cahayactour@gmail.comM</li>
          <?php
	          if($this->session->userdata('logged_in') == TRUE){
          ?>
          <li><a href="<?= base_url('homepage/logout');?>" style="color : white">Logout</a></li>
          <?php
	          }else{
          ?>
          <?php
	            }
	            ?>
        </ul>
      </div>
      
    </div>
  </div>
  
  
  
  <div class="wrapper row1">
          <header id="header" class="hoc clear"> 
            <div id="logo" class="fl_left">
                <h1><a href="#">Cahaya Travelindo</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">Wisata</a></li>
                <li><a class="drop" href="#">Tour & Travel</a>
                    <ul>
                    <li><a href="<?php echo base_url();?>homepage/paket_customize/">Paket Customize</a></li>
                    <li><a class="drop" href="#">Paket Wisata</a>
                        <ul>
                        <li><a href="<?php echo base_url();?>homepage/paket_wisata/siswa">Sekolah (Siswa)</a></li>
                        <li><a href="<?php echo base_url();?>homepage/paket_wisata/umum">Instansi (Umum)</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>homepage/gallery">Gallery</a></li>
                <?php
                    if($this->session->userdata('logged_in') == TRUE){
                ?>
                <li><a href="<?php echo base_url();?>homepage/order">Order</a></li>
                <li><a href="<?php echo base_url();?>homepage/history">History</a></li>
                <!-- <li><a href="<?= base_url('homepage/logout');?>" style="color : white">Logout</a></li> -->
                <?php
                    }else{
                ?>
                <?php
                        }
                ?>      
                </ul>
            </nav>
          </header>
        </div>
  
  
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
            <li><a class="btn inverse" href="#">Wisata</a></li>
            <li><a class="btn inverse" href="#">Paket Wisata</a></li>
          </ul>
        </footer>
      </article>
      
    </div>
  </div>
  
</div>
<!-- End Top Background Image Wrapper -->