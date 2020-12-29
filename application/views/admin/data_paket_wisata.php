<div class="container">
    
    <?php
    $notif = $this->session->flashdata('notif');
    $alert = $this->session->flashdata('alert');
    if (!empty($notif)) { ?>
        <div class="alert <?=$alert; ?> align-self-start">
            <?= $notif; ?>
        </div>
    <?php } ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Paket Wisata</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddwisata">Tambah Paket</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Set Peserta</th>
                            <th>Harga Paket</th>
                            <th>Objek Wisata</th>
                            <th>Deskripsi Paket</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Actions</th>
                            <th style="display: none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataPaketWisata)) {
                                foreach ($dataPaketWisata as $paket) {
                        ?>
                            <tr>
                                <td><?=$paket->id_paket_wisata?></td>
                                <td><?=$paket->nama_paket?></td>
                                <td><?=$paket->set_peserta?></td>
                                <td><?=rupiah($paket->harga_paket)?></td>
                                <td><?=$paket->objek_wisata?></td>
                                <td><?=$paket->desc_paket_wisata?></td>
                                <td><?=$paket->kategori?></td>
                                <td>
                                    <img id="gambar" style="width: 50px" src="<?php echo base_url() ?>upload/<?php echo $paket->gambar; ?>" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus paket wisata?');" name="delete" href="<?php echo base_url();?>admin/data_paket_wisata/delete/<?=$paket->id_paket_wisata?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                
                                <td style="display: none"><?=$paket->harga_paket?></td>
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
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="modalAddwisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Paket Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" enctype="multipart/form-data" action="<?php echo base_url();?>admin/data_paket_wisata" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="objek_wisata">Nama Paket</label>
                                    <input type="text" name="objek_wisata" class="form-control"
                                        id="objek_wisata"
                                        placeholder="Masukan Nama Paket">
                                </div>
                                <div class="form-group">
                                    <label for="set_peserta">Set Peserta</label>
                                    <input type="number" name="set_peserta" class="form-control"
                                        id="set_peserta"
                                        placeholder="Masukan Set Peserta">
                                </div>
                                <div class="form-group">
                                    <label for="harga_paket">Harga Paket</label>
                                    <input type="number" name="harga_paket" class="form-control"
                                        id="harga_paket"
                                        placeholder="Masukan Harga Paket">
                                </div>
                                <div class="form-group">
                                    <label for="wisata">Objek Wisata</label>
                                    <textarea class="form-control" name="wisata" id="wisata" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="desc_paket">Deskripsi Paket</label>
                                    <textarea class="form-control" name="desc_paket" id="desc_paket" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="siswa"> Siswa (Sekolah)</option>
                                        <option value="umum"> Umum (Instansi) </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modalEditwisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Paket Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" enctype="multipart/form-data" action="" method="post">
                        <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_objek_wisata">Nama Paket</label>
                                    <input type="text" name="e_objek_wisata" class="form-control"
                                        id="e_objek_wisata"
                                        placeholder="Masukan Objek Wisata">
                                    <input type="text" name="e_id_paket_wisata" class="form-control" style="display: none"
                                        id="e_id_paket_wisata">
                                </div>
                                <div class="form-group">
                                    <label for="e_set_peserta">Set Peserta</label>
                                    <input type="number" name="e_set_peserta" class="form-control"
                                        id="e_set_peserta"
                                        placeholder="Masukan Set Peserta">
                                </div>
                                <div class="form-group">
                                    <label for="e_harga_paket">Harga Paket</label>
                                    <input type="number" name="e_harga_paket" class="form-control"
                                        id="e_harga_paket"
                                        placeholder="Masukan Harga Paket">
                                </div>
                                <div class="form-group">
                                    <label for="e_wisata">Objek Wisata</label>
                                    <textarea class="form-control" name="e_wisata" id="e_wisata" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_desc_paket">Deskripsi Paket</label>
                                    <textarea class="form-control" name="e_desc_paket" id="e_desc_paket" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_kategori">Kategori</label>
                                    <select class="form-control" name="e_kategori" id="e_kategori">
                                        <option value="siswa"> Siswa (Sekolah)</option>
                                        <option value="umum"> Umum (Instansi) </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="e_gambar">Gambar</label>
                                    <input type="file" name="e_gambar">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="edit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    CKEDITOR.replace('desc_paket');
    CKEDITOR.replace('e_desc_paket');
    $('.btnEdit').on('click', function() {
        $('#modalEditwisata').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).html();
        }).get();
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_paket_wisata/');
        $('#e_id_paket_wisata').val(data[0])
        $('#e_objek_wisata').val(data[1])
        $('#e_set_peserta').val(data[2])
        $('#e_harga_paket').val(data[9])
        $('#e_wisata').val(data[4])
        CKEDITOR.instances['e_desc_paket'].setData(data[5]);
        $('#e_kategori').val(data[6])
        $('#e_gambar').val(data[7])
        
    });
    $( document ).ready(function() {
        $('#dataTable').DataTable();
        <?php if (!empty($notif)) { ?>
            let alert = $('.alert');
            setTimeout(() => {
                alert.css('display', 'none');
            }, 3000);
        <?php } ?>
    });
</script>