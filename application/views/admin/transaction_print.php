<section class="content">
  <div class="row">
    <div class="col-lg-12">
		<div class="card">
		  <a href="#" class="btn btn-info"><strong>Report Table of Tour Transaction</strong></a>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
          <p>Cetak Berdasarkan Status Transaksi : </p>
          <select id="filter-laporan" name="filter" class="form-control">
                <option value="all" selected>All</option>
                <option value="selesai">Selesai</option>
                <option value="Proses">Proses</option>
                <option value="Menunggu Validasi Paket">Menunggu Validasi Paket</option>
                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                <option value="dibatalkan">Dibatalkan</option>
          </select>
          <table class="table table-bordered" id="trx-print-table" style="width:100%" cellspacing="0">
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
                            <th>Harga Paket</th>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (!empty($trx)) {
                                foreach ($trx as $paket) {
                                    $i++;
                        ?>
                            <tr class="show">
                                <td><?=$paket->kd_transaksi?></td>
                                <td><?=$paket->id_paket_wisata?></td>
                                <td><?=$paket->nm_paket_wisata?></td>
                                <td><?=$paket->nama?></td>
                                <td><?=$paket->titik_jemput?></td>
                                <td><?=$paket->nama_kota?></td>
                                <td><?=$paket->booking_date?></td>
                                <td><?=$paket->tour_date?></td>
                                <td><?=$paket->jml_peserta?></td>
                                <td>Rp. <?=number_format($paket->total_harga)?></td>
                                <td><?=$paket->kategori?></td>
                                <td>
                                    <?php if($paket->status=='Menunggu Validasi Paket'){
                                        echo "<a class='btn btn-success btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Menunggu Pembayaran'){
                                        echo "<a class='btn btn-warning btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Menunggu Verifikasi'){
                                        echo "<a class='btn btn-info btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Proses'){
                                        echo "<a class='btn btn-primary btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Selesai'){
                                        echo "<a class='btn btn-success btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Dibatalkan'){
                                        echo "<a class='btn btn-danger btn-sm text-light'>$paket->status</a>";
                                    } ?>
                                </td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            <tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- ./col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script>
	$(document).ready(function() {
        let filterLaporan = $('#filter-laporan').val();
        $('#filter-laporan').change((e) => {
            var input, filter, table, tr, td, i;
            input = $("#filter-laporan").val();
            filter = input.toUpperCase();
            table = document.getElementById("trx-print-table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[11];
                $(tr[i]).addClass("show");
                $(tr[i]).removeClass("hidden");
                
                if (filter == "ALL") {
                    tr[i].style.display = "";
                } else {
                    if (td) {
                        if (td.innerText.toUpperCase() == filter) {
                            $(tr[i]).addClass("show");
                            $(tr[i]).removeClass("hidden");
                        } else {
                            $(tr[i]).addClass("hidden");
                            $(tr[i]).removeClass("show");
                        }
                    }       
                }
            }  
        })

        // DATE
        const date = new Date()
        const dateTimeFormat = new Intl.DateTimeFormat('id', { year: 'numeric', month: 'long', day: '2-digit' }) 
        const [{ value: day },,{ value: month },,{ value: year }] = dateTimeFormat .formatToParts(date ) 
        
        var tanggal = <?php echo json_encode($tanggal); ?>;
        var nama = "(HERY INDARNO)"
        var tempat_tanggal = "<p style='font-size: 20px; color: black; position: absolute; right:5%; margin-top: 3rem'>Tuban " +`${day} ${month} ${year }` +"</p>"
        var author = "<p style='font-size: 20px; color: black; position: absolute; right:5%; margin-top: 13rem'>" +nama+"</p>"
        var trx_print_table = $('#trx-print-table').DataTable({
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-default',
                    title: 'Laporan Transaksi CV. Cahaya Travel '+ tanggal+"<br>",
                    exportOptions: {
                        rows: '.show'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn btn-default',
                    title: 'Laporan Transaksi CV. Cahaya Travel '+ tanggal+"<br>",
                    exportOptions: {
                        rows: '.show'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-default',
                    title: 'Laporan Transaksi CV. Cahaya Travel '+ tanggal+"<br>",
                    exportOptions: {
                        rows: '.show'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-default',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    title: 'Laporan Transaksi CV. Cahaya Travel',
                    exportOptions: {
                        rows: '.show'
                    },
                    customize: function ( doc ) {
                        doc.content.splice( 1, 0, {
                            margin: [ 0, 0, 0, 12 ],
                            alignment: 'center',
                            text: "Per Tanggal : " + tanggal
                        } );
                        var tempat_tanggal = {
                            text: "Tuban, " +`${day} ${month} ${year }`,
                            alignment: 'right',
                            fontSize: 10,
                            margin: [0, 30]
                        };
                        var author = {
                            text: nama,
                            alignment: 'right',
                            fontSize: 10,
                            margin: [0, 50]
                        }
                        doc.content.push(tempat_tanggal, author);
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    title: 'Laporan Transaksi CV. Cahaya Travel '+ tanggal,
                    exportOptions: {
                        rows: '.show'
                    },
                    customize: function(win) {
                        $(win.document.body).append(tempat_tanggal);
                        $(win.document.body).append(author);
                    }
                }
            ],
        });
	});
</script>
