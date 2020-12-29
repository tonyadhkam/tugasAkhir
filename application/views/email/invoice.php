<!DOCTYPE html>
<html>
<head>
    <style>
        .email-alamat {
            padding: 0 2rem 0 2rem;
        }
        table.table-invoice {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table-invoice td, .table-invoice th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table-invoice tr:nth-child(even), .table-invoice thead {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <div class="es-wrapper-color">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p10r es-p10l" style="background-color: rgb(25, 25, 25); --darkreader-inline-bgcolor:#18191a;" esd-general-paddings-checked="false" data-darkreader-inline-bgcolor bgcolor="#191919" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image" align="center"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" esd-general-paddings-checked="false" style="background-color: #032055; --darkreader-inline-bgcolor:#703800;" data-darkreader-inline-bgcolor bgcolor="#ffcc99" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p15b" align="center">
                                                                                        <div class="esd-text">
                                                                                            <h2 style="color: #fff; --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color><span style="font-size:30px;"><strong>INVOICE</strong></span><br></h2>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10l" align="center">
                                                                                        <p style="color: #fff;" data-darkreader-inline-color>Halo <?=$namaPenerima?>, Terimakasih telah selesai melakukan pembayaran paket <i>tour & travel.</i><br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- Content -->
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p10b es-p10r es-p10l" style="background-color: rgb(248, 248, 248); --darkreader-inline-bgcolor:#1a1c1d;" esd-general-paddings-checked="false" data-darkreader-inline-bgcolor bgcolor="#f8f8f8" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text email-alamat" width="50%" align="left">
                                                                                        <img src="http://cahayatourtravel.com/assets/logo/cahayatravel-new.png" style="width: 100%;" alt="logo-travel">
                                                                                    </td>
                                                                                    <td class="esd-block-text email-alamat" width="50%" align="right">
                                                                                        <p><strong>Pemesanan Paket Wisata</strong></p>
                                                                                        <p><strong>Invoice #: <?=$kd_booking?></strong></p>
                                                                                        <p>Dibuat: <?=$dateToday?></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text email-alamat" width="50%" align="left">
                                                                                        <p>Jln. AKBP Suroko No. 408 Kab. Tuban, Jawa Timur</p>
                                                                                        <p>+62813-3038-0285</p>
                                                                                        <p>cahayactour@gmail.com</p>
                                                                                    </td>
                                                                                    <td class="esd-block-text email-alamat" width="50%" align="right">
                                                                                        <p><?=$namaPenerima?></p>
                                                                                        <p><?=$alamatPenerima?></p>
                                                                                        <p><?=$emailPenerima?></p>
                                                                                    </td>
                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p25t es-p5b es-p20r es-p20l" esd-general-paddings-checked="false" style="background-color: rgb(248, 248, 248); --darkreader-inline-bgcolor:#1a1c1d;" data-darkreader-inline-bgcolor bgcolor="#f8f8f8" align="left">
                                                        <table class="es-right" cellspacing="0" cellpadding="0" style="width:100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="270" align="center">
                                                                        <table width="100%" class="email-alamat" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="center">
                                                                                        <table class="table-invoice">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama Paket</th>
                                                                                                    <th>Kategori Paket</th>
                                                                                                    <th>Total</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td><?=$nama_paket?></td>
                                                                                                    <td><?=$kategori?></td>
                                                                                                    <td><?=$harga?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="border: none;"></td>
                                                                                                    <td><strong>Dibayar:</strong></td>
                                                                                                    <td><strong><?=$harga?></strong></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="border: none;"></td>
                                                                                                    <td><strong>Kekurangan Pembayaran:</strong></td>
                                                                                                    <td><strong><?=$kekurangan?></strong></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="3" style="text-align: center; background-color: #032055 ;color: #fff;"><strong>LUNAS</strong></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                          </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
