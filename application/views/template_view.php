<!DOCTYPE html>
<!--
Template Name: Bronea
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
    <title>Cahaya Travel - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo base_url();?>assets/cahaya-travel/layout/styles/layout.css" rel="stylesheet" type="text/css"
        media="all">
    <link href="<?php echo base_url();?>assets/cahaya-travel/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom-css.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/cahayatravel-new.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="icon"
      type="image/png"
      href="<?php echo base_url();?>assets/logo/cahayatravel-new.png"/>
</head>

<body id="top">
    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay"
        style="background-image:url('<?php echo base_url();?>assets/images/demo/backgrounds/background-coba.jpg');">

        <div class="wrapper row0">
            <div id="topbar" class="hoc clear">

                <div class="fl_left">
                    <ul class="nospace">
                        <li><a href="<?php echo base_url();?>homepage"><i class="fa fa-lg fa-home"></i></a></li>
                        <li><a href="<?php echo base_url();?>homepage/about" style="color : white">About</a></li>
                        <li><a href="<?php echo base_url();?>homepage/contact" style="color : white">Contact</a></li>
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
                        <li style="color : white"><i class="fa fa-envelope-o"></i> CAHAYACTOUR@GMAIL.COM</li>
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
                    <h1><a href="<?php echo base_url();?>homepage">Cahaya Travelindo</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
                        <li><a href="<?php echo base_url();?>homepage/wisata">Wisata</a></li>
                        <li><a class="drop" href="#">Tour & Travel</a>
                            <ul>
                                <li><a href="<?php echo base_url();?>homepage/paket_customize">Paket Customize</a></li>
                                <li><a href="<?php echo base_url();?>homepage/paket">Paket Wisata</a>
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
        <!-- content -->
        <?php
            function rupiah($angka){
            
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
        
            function rm_rupiah($angka){
                $angka = substr($angka,0,2);
                var_dump("angka", $angka);
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
            if (isset($tampilan)) {
                $this->load->view($tampilan);
            } 
        ?>
    
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="<?php echo base_url();?>assets/cahaya-travel/layout/scripts/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/cahaya-travel/layout/scripts/jquery.backtotop.js"></script>
    <script src="<?php echo base_url();?>assets/cahaya-travel/layout/scripts/jquery.mobilemenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).delegate('#btn-upload-bukti','click',function() {
            var id = $(this).attr("data-id");
            $("#idtransaction").attr("value",id);
        });
        $(document).delegate('#btn-upload-bukti-request','click',function() {
            var id = $(this).attr("data-id");
            $("#idtransaction-request").attr("value",id);
        });
    </script>
</body>

</html>
