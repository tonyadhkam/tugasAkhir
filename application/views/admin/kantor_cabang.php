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
            <h6 class="m-0 font-weight-bold text-primary">Data Kantor Cabang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddKantor">Tambah Kantor Cabang</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kantor Cabang</th>
                            <th>Kota Kantor Cabang</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataKantor)) {
                                foreach ($dataKantor as $kantor) {
                                    echo '
                                
                                    <tr>
                                        <td>'.$kantor->id_kantor_cabang.'</td>
                                        <td>'.$kantor->nama_kota.'</td>
                                        <td>
                                        <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                        <a href="'.base_url().'admin/kantor_cabang/delete/'.$kantor->id_kantor_cabang.'" class="btn btn-danger" onclick="return deleteconfig()"><i class="fa fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    ';
                                }
                            } else {
                                echo '
                                    <tr>
                                        <td colspan="3">Data Kosong</td>
                                    <tr>
                                ';
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="modalAddKantor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kota Kantor Cabang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/kantor_cabang" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="nama_kota" class="form-control"
                                        id="nama_kota"
                                        placeholder="Masukan kota kantor cabang">
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
    <div class="modal fade" id="modalEditKantor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kota Kantor Cabang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="e_nama_kota" class="form-control"
                                        id="e_nama_kota"
                                        placeholder="Masukan kota kantor cabang">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="edit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

</div>
<script>
    $('.btnEdit').on('click', function() {
        $('#modalEditKantor').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/kantor_cabang/'+data[0]);
        
        $('#e_nama_kota').val(data[1])
        
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

     function deleteconfig(){
        var tujuan=$(this).attr('id');
        var hapusin=confirm("Apakah Anda yakin ingin menghapus data kota kantor cabang?");
        if(hapusin==true){
            window.location.href=tujuan;
        }
        else{
            alert("Data Batal dihapus");
        }
        return hapusin;
    }
</script>