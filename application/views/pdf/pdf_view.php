<!DOCTYPE html>
<html>

<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable {
      padding: 40px;
      width: 100%;
      border-radius: 5px;
      font-family: Arial, Helvetica, sans-serif;
    }

    .short {
      width: 50px;
    }

    .normal {
      width: 150px;
    }

    table.tablePdf {
      font-family: Arial, Helvetica, sans-serif;
      border: 0px solid #1C6EA4;
      background-color: #EEEEEE;
      width: 100%;
      height: 100px;
      text-align: center;
      border-collapse: collapse;
    }

    table.tablePdf td,
    table.tablePdf th {
      border: 1px solid #AAAAAA;
      padding: 5px 5px;
    }

    table.tablePdf tbody td {
      font-size: 13px;
    }

    table.tablePdf tr:nth-child(even) {
      background: #B6C9F5;
    }

    table.tablePdf thead {
      background: #1C6EA4;
      background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
      background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
      background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    }

    table.tablePdf thead th {
      font-size: 14px;
      font-weight: bold;
      color: #FFFFFF;
      border-left: 2px solid #D0E4F5;
    }

    table.tablePdf thead th:first-child {
      border-left: none;
    }

    table.tablePdf tfoot {
      font-size: 14px;
      font-weight: bold;
      color: #333;
      background: #D0E4F5;
      background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
      background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
      background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
    }

    table.tablePdf tfoot td {
      font-size: 14px;
    }

    table.tablePdf tfoot .links {
      text-align: right;
    }

    table.tablePdf tfoot .links a {
      display: inline-block;
      background: #1C6EA4;
      color: #FFFFFF;
      padding: 2px 8px;
      border-radius: 5px;
    }
    table.tablePdf td, tfoot {
      max-width:100%;
      white-space:nowrap;
    }

    .header-text {
      text-align: center;
    }

    .logo {
      width: 100%;
      left: 0;
      top: 50;
      transform: translateY(50%);
      position: absolute;
    }
    .ttd-manager {
      float:right;
      text-align: center;
      font-size: 18px;
      font-weight: 500;
    }
    .tempat-tanggal {
      margin-top: 4rem;
    }
    .paraf {
      margin-top: 6rem;
    }
    .first {
      width: 50%;
    }
    .second { width:30%; }
    .third { text-align:center; }
  </style>
</head>

<body>
  <div id="outtable">
    <table width="100%">
      <tr>
        <th style="width: 200px">
          <img src="http://cahayatourtravel.com/assets/logo/logo-travel.jpg" alt="logo-travel" style="width: 100%">    
        </th>
        <th style="width: 80%">
          <div class="header-text">
            <h2>Laporan Transaksi CV. Cahaya Travel</h2>
            <h2><?=$filter?></h2>
          </div>
        </th>
      </tr>
    </table>
    <table class="tablePdf">
      <thead>
        <tr>
          <th>KD Transaksi</th>
          <th>ID Paket</th>
          <th>Nama Paket</th>
          <th>Pemesan</th>
          <th>Titik Jemput</th>
          <th>Kantor Cabang</th>
          <th>Tanggal Booking</th>
          <th>Tanggal Tour</th>
          <th>Jumlah Peserta</th>
          <th>Kategori</th>
          <th>Harga Paket</th>
        </tr>
      </thead>
      <tbody>
      <?php
        function rupiah($angka){
          
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
      }
                                if (!empty($laporan)) {
                                    foreach($laporan['result'] as $data) {
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
      <tfoot>
        <tr>
          <td colspan="10">Total Pendapatan</td>
          <td>
          <?php
                                    if (empty($laporan)) {
                                ?>
                                    <span class="total">
                                        Rp. 0
                                    </span>
                                <?php                                        
                                    } else {
                                ?>
                                    <span class="total">
                                        <?=rupiah($laporan['total'])?>
                                    </span>
                                <?php
                                    }
                                ?>
          </td>
        </tr>
      </tfoot>
    </table>
    <table width="100%">
      <tr>
        <td class="first"></td>
        <td class="second"></td>
        <td class="third">
          <p class="tempat-tanggal"><?=$tempatTanggal?></p>
          <p class="paraf">(Hery Indarno)</p>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>