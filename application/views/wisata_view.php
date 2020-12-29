  <!-- ################################################################################################ -->
  <div class="wrapper">
    <section id="breadcrumb" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <ul>
        <li><a href="<?php echo base_url();?>homepage">Home</a></li>
        <li><a href="<?php echo base_url();?>homepage/wisata">Wisata</a></li>
      </ul>
      <!-- ################################################################################################ -->
      <h6 class="heading">Wisata - Cahaya Travel</h6>
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
      <h6 class="heading">Info Wisata Cahaya Travelindo</h6>
      <p>Informasi wisata-wisata terbaru yang siap anda kunjungi.</p>
      <!-- <p>Dokumentasi Pengguna Jasa Tour & Travel Cahaya Travelindo</p> -->
    </div>
    <div class="search d-flex flex-row justify-content-center p-2">
        <div class="search-kategori m-3 w-50">
            <p>Cari Nama Wisata</p>
            <input class="form-control" type="text" placeholder="Tekan 'Enter' Untuk Cari Berdasarkan Nama Wisata" name="nama_wisata" id="nama_wisata">
        </div>
        </div>
    <br>
    <br>
    <div class="content">
        <div class="row" id="MyCards">
            <?php foreach ($dataWisata as $row) { ?>
                <div data-nmwisata="<?=$row->nm_wisata?>" class="col-sm-4 filter-card" >
                    <div class="card mb-4" style="height: 250px">
                        <img class="card-img-top" style="height: 100%" src="<?php echo base_url();?>upload/<?=$row->gambar?>"alt="Card image cap">
                    </div>
                        <h3 class="heading"><?=$row->nm_wisata?></h3>
                            <p>Lokasi : <?=$row->tempat_wisata?></p>
                            <p class="minimize"><?=$row->desc?></p>
                            <a style="cursor: pointer" onclick="location.href='<?php echo base_url('homepage/detail_info_wisata/')?><?=$row->id_info_wisata?>'">Read More &raquo;</a>
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
        var nm_wisata = 'all';
        $('#nama_wisata').change(function() {
            nm_wisata =$(this).val();
            var $select = $(this).val().toUpperCase();
            
            if ($select == '') {
                $('.filter-card').show();
            } else {
                $('.filter-card').each(function() {
                    var wisata = $(this).data('nmwisata').toUpperCase();
                    
                    if ($select == '') {
                        if (wisata == $select) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    } else {
                        if (wisata.indexOf($select) != -1) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
            }
        });
        var minimized_elements = $('.filter-card').children();
        
        minimized_elements.each(function(i, el) {
            var t = $(this).text();
            if (t.length < 100) return;
            if (i > 4) {
                $(el).addClass("hidden");
            }
            $(this).html(
                t.slice(0, 100) + '<span>... </span>'
            );
        });
    })
</script>