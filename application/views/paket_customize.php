  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/paket_customize">Paket Customize</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Form Paket Customize - Cahaya Travel</h6>
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
            <h3>Paket Customize</h3>
        </div>
        <br>
        <form class="paket_customize" id="form_add" action="<?php echo base_url();?>homepage/paket_customize" method="post">
        <!-- <form method="post"> -->
            <div class="bg-white mt-2 row3 holder-input">
                <div class="row">
                <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Fasilitas Daftar Paket</h4>
                            </div>
                            <div class="col-7">
                                <select class="form-control" name="id_fasilitas" id="id_fasilitas">
                                    <option data-price="0" value="">- Pilih Fasilitas Daftar Paket -</option>
                                    <?php foreach ($dataFasilitas as $key ) { ?>
                                        <option data-price="<?=$key->harga?>" value="<?= $key->id_fasilitas?>"><?=$key->nm_daftar_paket ?> - <?=$key->harga?></option>
                                    <?php } ?>
                                    <input type="text" value="0" id="fasilitas_price" style="display:none;">
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Bus</h4>
                            </div>
                            <div class="col-7">
                                <input class="form-control" type="text" name="id_user" id="id_user" style="display: none">
                                <select class="form-control" name="id_bus" id="id_bus">
                                    <option data-price="0" value="">- Pilih Bus -</option>
                                    <?php foreach ($dataBus as $key ) { ?>
                                        <option data-price="<?=$key->harga?>" value="<?= $key->id_bus?>"><?=$key->desc ?> - Kapasitas <?=$key->seat?> kursi - <?=$key->harga?></option>
                                    <?php } ?>
                                    <input type="text" value="0" id="bus_price" style="display:none;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-5">
                                <h4>Hotel</h4>
                            </div>
                            <div class="col-7">
                                <select class="form-control" name="id_hotel" id="id_hotel">
                                    <option data-price="0" value="">- Pilih Hotel -</option>
                                    <?php foreach ($dataHotel as $key ) { ?>
                                        <option data-price="<?=$key->harga?>" value="<?= $key->id_hotel?>"><?=$key->nama_hotel ?> - Bintang <?=$key->bintang ?> - <?=$key->desc ?> - <?=$key->harga?></option>
                                    <?php } ?>
                                    <input type="text" value="0" id="hotel_price" style="display:none;">
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="row align-items-center p-4">
                            <div class="col-sm-5">
                                <h4>Objek Wisata</h4>
                            </div>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="id_user" id="id_user" style="display: none">
                                <select class="objek_wisata form-control" name="objek_wisata" id="objek_wisata" multiple="multiple">
                                    <?php foreach ($dataObjek as $key ) { ?>
                                        <option data-price="<?=$key->harga?>" value="<?= $key->id_objek?>"><?=$key->nama_wisata ?> - <?=$key->harga?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" value="0" id="id_objek_wisata" name="id_objek_wisata" style="display:none;">
                                <input type="text" value="0" id="objek_price" style="display:none;">
                            </div>
                            <div class="col-sm-7">
                                <br>
                                <b><i>Catatan :</i></b><br>
                                <i>- Paket Tulak (Tanpa Inap) maksimal memilih 4 Objek Wisata.</i><br>
                                <i>- Paket 3 Hari maksimal memilih 7 Objek Wisata.</i><br>
                                <i>- Paket 4 Hari maksimal memilih 9 Objek Wisata.</i><br>
                                <i>- Paket 5 Hari maksimal memilih 11 Objek Wisata.</i>
                            </div>            
                            <div class="col-sm-12 mt-2">
                                <input type="button" name="hitung" id="hitung" class="btn btn-info" style="height: 50px; float:right;" value="Hitung" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
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

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Website by <a href="#">Tony Andhika M, Winda Eka F</a> & <a href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>

<script>
    $(document).ready(function() {
        function sumArry(total, num) {
            return total + num;
        }
        $('.objek_wisata').select2({
            width: '100%',
            placeholder: "  - Pilih Objek Wisata - ",
            allowClear: true
        });
        $('#objek_wisata').on('change', function() {
            var selected = $(this).find('option:selected', this);
            var results = [];
            var id_results = [];
            selected.each(function() {
                results.push($(this).data('price'));
                id_results.push($(this).val());
            });
            var harga_objek = results.reduce(sumArry);
            $("#objek_price").val(harga_objek);
            $("#id_objek_wisata").val(id_results);
        });

        $("#id_bus").each(function () {
            $(this).on("change", function() {
                var id = $("#id_bus option:selected").val();
                var harga_bus = $("#id_bus option:selected").attr("data-price");
                $("#bus_price").val(harga_bus);
                $("#total_bayar").val(0);
            });
        });
        $("#id_hotel").each(function () {
            $(this).on("change", function() {
                var id = $("#id_hotel option:selected").val();
                var harga_hotel = $("#id_hotel option:selected").attr("data-price");
                $("#hotel_price").val(harga_hotel);
                $("#total_bayar").val(0);
            });
        });
        $("#id_fasilitas").each(function () {
            $(this).on("change", function() {
                var id = $("#id_fasilitas option:selected").val();
                var harga_fasilitas = $("#id_fasilitas option:selected").attr("data-price");
                
                
                $("#fasilitas_price").val(harga_fasilitas);
                $("#total_bayar").val(0);
            });
        });

        $("#hitung").click(function(e){
            e.preventDefault();
            var bus_price = parseInt($("#bus_price").val());
            var hotel_price = parseInt($("#hotel_price").val());
            var fasilitas_price = parseInt($("#fasilitas_price").val());
            var objek_price = parseInt($("#objek_price").val());
            var total_akhir = bus_price + hotel_price + fasilitas_price + objek_price;
            $("#total_bayar").val(total_akhir);
        });
    });


</script>