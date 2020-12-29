  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="">Daftar Paket</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Daftar Paket - Cahaya Travel</h6>
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
      <h6 class="heading">Paket Wisata Cahaya Travelindo</h6>
      <br>
      <p>Pilihan paket wisata untuk anda</p>
      <!-- <p>Dokumentasi Pengguna Jasa Tour & Travel Cahaya Travelindo</p> -->
    </div>
    <div class="search d-flex flex-row justify-content-center p-2">
        <div class="search-kategori m-3 w-50">
            <p>Cari Kategori Paket</p>
            <select name="kategori_paket" id="kategori_paket" class="form-control">
                <option value="all" selected>Cari Berdasarkan Kategori</option>  
                <?php foreach ($dataKategori as $row) { ?>
                    <option value="<?php echo $row->kategori;?>"><?php echo $row->kategori ?></option>  
                <?php } ?>
            </select>
        </div>
        <div class="search-seat m-3 w-50">
            <p>Cari Kapasitas Seat</p>
            <select name="kapasitas_seat" id="kapasitas_seat" class="form-control">
                <option value="all" selected>Cari Berdasarkan Seat</option>  
                <?php foreach ($dataSeat as $row) { ?>
                    <option value="<?php echo $row->set_peserta;?>"><?php echo $row->set_peserta ?></option>  
                <?php } ?>
            </select>
        </div>
    </div>
    <br>
    <br>
    <div class="content">
        <div class="row" id="MyCards">
            <?php foreach ($dataPaketWisata as $row) { ?>
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
        $('#paket_id').change(() => {
            var value = $("#paket_id").val();
            passedArray.forEach(e => {
                if (value == e.id_paket_wisata) {
                    $('#kapasitas_seat').val(e.set_peserta)
                    $('#harga_paket').val(e.harga_paket);
                    $('#nm_paket_wisata').val(e.objek_wisata);
                    jml_bayar = e.harga_paket
                    kapasitas_seat = e.set_peserta
                    $('#total_bayar').val(jml_bayar)
                }
            })
        })
        var kategori = 'all';
        var seat = 'all';
        $('#kategori_paket').change(function() {
            kategori =$(this).val();
            var $select = $(this);
            if ($select.val() == 'all') {
                $('.filter-card').show();
            } else {
                $('.filter-card').each(function() {
                    if (seat == 'all') {
                        if ($(this).data('kategori') == $select.val()) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else {
                        if ($(this).data('kategori') == $select.val() && $(this).data('seat') == seat) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
            }
        });
        
        $('#kapasitas_seat').change(function() {
            seat = $(this).val();
            var $select = $(this);
            if ($select.val() == 'all') {
                $('.filter-card').show();
            } else {
                $('.filter-card').each(function() {
                    if (kategori == 'all') {
                        if ($(this).data('seat') == $select.val()) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else {
                        if ($(this).data('seat') == $select.val() && $(this).data('kategori') == kategori) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
            }
        });
    })
</script>