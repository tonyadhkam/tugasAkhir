<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan</h6>
        </div>
        <div class="card-body">
            <div class="filter-laporan mb-4">
                <!-- <div class="container"> -->
                    <div class="row">
                        <div class="col-12">
                            <h6 class="font-weight-bold text-primary">Filter Laporan</h6>
                        </div>
                        <div class="col-12">
                            <form class="user" id="form_add" action="<?php echo base_url();?>admin/laporan" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Awal</label>
                                            <input type="text" class="form-control datepicker startdate" data-date-format="yyyy/mm/dd" autocomplete="off" name="startdate">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Akhir</label>
                                            <input type="text" class="form-control datepicker enddate" data-date-format="yyyy/mm/dd" autocomplete="off" name="enddate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button class="btn btn-primary block filter">
                                            Filter Laporan
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success text-white block cetak" >
                                            Cetak Laporan
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-danger block clear-filter" type="reset">
                                            Clear Filter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>KD Transaksi</th>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Pemesan</th>
                            <th>Titik Jemput</th>
                            <th>Kantor Cabang</th>
                            <th>Tgl Booking</th>
                            <th>Tgl Tour</th>
                            <th>Jumlah Peserta</th>
                            <th>Kategori</th>
                            <th>Harga Paket</th>
                        </tr>
                    </thead>
                    <tfoot style="max-width:100%; white-space:nowrap;">
                        <tr>
                            <td colspan="10" style="text-align: center; font-weight: bold"> Total Pendapatan</td>
                            <td style="font-weight: bold">
                                <?php
                                    if (empty($filterLaporan)) {
                                ?>
                                    <span class="total">
                                        Rp. 0
                                    </span>
                                <?php                                        
                                    } else {
                                ?>
                                    <span class="total">
                                        <?=rupiah($filterLaporan['total'])?>
                                    </span>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                                if (!empty($filterLaporan)) {
                                    foreach($filterLaporan['result'] as $data) {
                            ?>
                                <tr>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->kd_transaksi?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->id_paket_wisata?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->nm_paket_wisata?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->nama?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->titik_jemput?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->nama_kota?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->booking_date?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->tour_date?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->jml_peserta?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=$data->kategori?></td>
                                    <td style="max-width:100%; white-space:nowrap;"><?=rupiah($data->total_harga)?></td>
                                </tr>
                            <?php
                                    }
                                } else {
                            ?>
                                    <tr>
                                        <td colspan="11">Data Kosong</td>
                                    <tr>
                            <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#dataTable').DataTable();
        $( ".datepicker" ).datepicker();
        var startdate = $('.startdate').val(<?= json_encode($startdate)?>);
        var enddate = $('.enddate').val(<?= json_encode($enddate)?>);
        $('.filter').click((e)=>{
            $('#form_add').attr('action', '<?php echo base_url();?>admin/laporan');
            $('#form_add').attr('target', '');
        })
        $('.cetak').click((e)=>{
            $('#form_add').attr('action', '<?php echo base_url();?>admin/cetakLaporan');
            $('#form_add').attr('target', '_blank');
        })
    });
</script>