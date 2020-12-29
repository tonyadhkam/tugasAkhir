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
            <h6 class="m-0 font-weight-bold text-primary">Data Hotel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddHotel">Tambah Hotel</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Hotel</th>
                            <th>Nama Hotel</th>
                            <th>Deskripsi Hotel</th>
                            <th>Bintang</th>
                            <th>Harga</th>
                            <th>Actions</th>
                            <th style="display: none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataHotel)) {
                                foreach ($dataHotel as $hotel) {
                        ?>
                            <tr>
                                <td><?=$hotel->id_hotel?></td>
                                <td><?=$hotel->nama_hotel?></td>
                                <td><?=$hotel->desc?></td>
                                <td><?=$hotel->bintang?></td>
                                <td><?=rupiah($hotel->harga)?></td>
                                <td>
                                    <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus hotel?');" href="<?php echo base_url();?>admin/data_hotel/delete/<?=$hotel->id_hotel?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                <td style="display: none"><?=$hotel->harga?></td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="5">Data Kosong</td>
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
    <div class="modal fade" id="modalAddHotel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Hotel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/data_hotel" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_hotel">Nama Hotel</label>
                                    <input type="text" name="nama_hotel" class="form-control"
                                        id="nama_hotel"
                                        placeholder="Masukan Nama Hotel">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi Hotel</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Masukan Deskripsi Hotel"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="bintang">Bintang</label>
                                    <select class="form-control" name="bintang" id="bintang">
                                        <option value="0">0</option>
                                        <option value="1">1</option>  
                                        <option value="2">2</option>  
                                        <option value="3">3</option>  
                                        <option value="4">4</option>  
                                        <option value="5">5</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control"
                                        id="harga"
                                        placeholder="Masukan Harga Hotel">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modalEditHotel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Hotel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_nama_hotel">Nama Hotel</label>
                                    <input type="text" name="e_nama_hotel" class="form-control"
                                        id="e_nama_hotel"
                                        placeholder="Masukan Nama Hotel">
                                </div>
                                <div class="form-group">
                                    <label for="e_desc">Deskripsi Hotel</label>
                                    <textarea class="form-control" name="e_desc" id="e_desc" rows="3" placeholder="Masukan Deskripsi Hotel"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_harga">Bintang</label>
                                    <select class="form-control" name="e_bintang" id="e_bintang">
                                        <option value="0">0</option>
                                        <option value="1">1</option>  
                                        <option value="2">2</option>  
                                        <option value="3">3</option>  
                                        <option value="4">4</option>  
                                        <option value="5">5</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="e_harga">Harga</label>
                                    <input type="number" name="e_harga" class="form-control"
                                        id="e_harga"
                                        placeholder="Masukan Harga Hotel">
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
    $('.btnEdit').on('click', function() {
        $('#modalEditHotel').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_hotel/'+data[0]);
        
        $('#e_nama_hotel').val(data[1])
        $('#e_desc').val(data[2])
        $('#e_bintang').val(data[3])
        $('#e_harga').val(data[6])
        
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