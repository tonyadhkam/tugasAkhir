<!DOCTYPE html>
<html>

<head>
</head>
<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#555555"></v:fill>
			</v:background>
		<![endif]-->
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
                                                                                            <h2 style="color: #fff; --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color><span style="font-size:30px;"><strong><?=$title?></strong></span><br></h2>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10l" align="center">
                                                                                        <p style="color: #fff;" data-darkreader-inline-color>Halo <?=$name?>, Terimakasih telah melakukan pemesanan paket <i>tour & travel.</i><br></p>
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
                                                    <td class="esd-structure es-p15t es-p10b es-p10r es-p10l" style="background-color: rgb(248, 248, 248); --darkreader-inline-bgcolor:#1a1c1d;" esd-general-paddings-checked="false" data-darkreader-inline-bgcolor bgcolor="#f8f8f8" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="center">
                                                                                        <h2 style="color: rgb(25, 25, 25); --darkreader-inline-color:#dfddd8;" data-darkreader-inline-color>DATA ORDER<br></h2>
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
                                                        <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                        <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" style="width:100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="270" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="center">
                                                                                        <p><span style="font-size:16px;"><strong style="line-height: 150%;">Kode Transaksi : <?=$kd_booking?></strong></span></p>
                                                                                        <p><span style="font-size:16px;"><strong style="line-height: 150%;">Nama : <?=$name?></strong></span></p>
                                                                                        <p><span style="font-size:16px;"><strong style="line-height: 150%;">Email : <?=$email?></strong></span></p>
                                                                                        <p><span style="font-size:16px;"><strong style="line-height: 150%;">Silahkan Transfer Rp.<?=number_format($harga)?> ke No. Rekening Berikut :</strong></span></p>
                                                                                        <?php foreach($rekening as $row): ?>
                                                                                        <p><span style="font-size:16px;"><strong style="line-height: 150%;"><?=$row->rekening_bank?> : <?=$row->rekening_no?> (<?=$row->rekening_nama?>)</strong></span></p>
                                                                                        <?php endforeach; ?>
                                                                                        <br>
                                                                                        <i>(Pembayaran paling lama adalah H-3 sebelum jadwal keberangkatan)</i>
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
                                                <tr>
                                                    <td class="esd-structure es-p25t es-p30b es-p20r es-p20l" esd-general-paddings-checked="false" style="background-color: rgb(248, 248, 248); --darkreader-inline-bgcolor:#1a1c1d;" data-darkreader-inline-bgcolor bgcolor="#f8f8f8" align="left">
                                                        <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10b" align="center">
                                                                                        <h3 style="color: rgb(36, 36, 36); --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color>Jangan lupa konfirmasi</h3>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="center">
                                                                                        <p style="line-height: 150%; color: rgb(36, 36, 36); --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color>Dashboard -> Order</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="270" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10b" align="center">
                                                                                        <h3 style="color: rgb(36, 36, 36); --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color>Setelah melakukan pembayaran</h3>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="center">
                                                                                        <p style="line-height: 150%; color: rgb(36, 36, 36); --darkreader-inline-color:#dbd8d3;" data-darkreader-inline-color>Upload bukti transfer</p>
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
