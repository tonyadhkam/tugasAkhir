  <!-- ################################################################################################ -->
  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/contact">Contact Us</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Contact Us - Cahaya Travel</h6>
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
      <center><h1>Contact Us</h1></center>
      <br>
      <br>
      <div class="one_half" style="margin-right:40px;width:400px;height:250px;"><img style="width:100%;height:100%;" class="inspace-10 borderedbox" src="<?php echo base_url();?>assets/images/demo/gallery/cahaya_travel.jpg" alt=""></div>
      <br>
      <div>
      <h5><b>Alamat Kantor Pusat :</b></h5>
      <br>
      <i class="fa fa-map-marker"></i> AKBP Suroko 408 Kabupaten Tuban, Jawa Timur </li><br><br>
      <i class="fa fa-clock-o"></i> Office Hour : 09.00 - 21.00 </li><br><br>
      <i class="fa fa-phone"></i> +62813-3038-0285</li><br><br>
      <i class="fa fa-envelope-o"></i> cahayactour@gmail.com</li><br><br>
      <br>
      <br>
      <br>
    </div>
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
