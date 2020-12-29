<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Transaksi Selesai Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi Selesai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalTransaksiSelesai ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaksi Dalam Proses Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Dalam
                                Proses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalTransaksiDalamProses ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-business-time fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Transaksi Menunggu Pembayaran Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi Menunggu
                                Pembayaran</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?= $totalTransaksiMenungguPembayaran ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUser ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Pendapatan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Paket Wisata</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 p-1">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="m-0 card-title text-primary">Paket Laris</h4>
                                    <ul class="list-group list-group-flush" style="height: 85px; overflow-y: auto">
                                        <?php
                                            foreach ($paketLaris as $data) {
                                        ?>
                                            <li class="list-group-item"><?= $data->nama_paket?> - ID (<?=$data->id_paket_wisata?>)</li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-1">
                            <div class="card">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="m-0 card-title text-primary">Paket Tidak Laris</h4>
                                    <ul class="list-group list-group-flush" style="height: 85px; overflow-y: auto">
                                        <?php
                                            foreach ($paketTidakLaris as $data) {
                                        ?>
                                            <li class="list-group-item"><?= $data->nama_paket?> - ID (<?=$data->id_paket_wisata?>)</li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function rupiah(angka) {
        var	number_string = angka.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah
    }
    var ctx = document.getElementById('myAreaChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($dataChart['month']); ?>,
            datasets: [{
                label: 'Keuntungan',
                backgroundColor: 'rgb(78, 115, 223)',
                borderColor: 'rgb(78, 115, 223)',
                data: <?php echo json_encode($dataChart['value']); ?>
            }]
        },

        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(value, index, values) { 
                        return 'Rp ' + rupiah(value.yLabel);
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontSize: 10,
                        callback: function (value, index, values) {
                            return 'Rp ' + rupiah(value); //! panggil function addComas tadi disini
                        }
                    }
                }]
            }

        }
    });
</script>