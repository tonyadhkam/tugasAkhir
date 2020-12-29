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
            <h6 class="m-0 font-weight-bold text-primary">Data Titik Jemput</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddTitikJemput">Tambah Titik Penjemputan</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kantor Cabang</th>
                            <th>Kota Kantor Cabang</th>
                            <th>ID Titik Jemput Area</th>
                            <th>Titik Jemput Area</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataTitikJemput)) {
                                # code...
                                foreach ($dataTitikJemput as $titikJemput) {
                                    echo '
                                
                                    <tr>
                                        <td>'.$titikJemput->id_kantor_cabang.'</td>
                                        <td>'.$titikJemput->nama_kota.'</td>
                                        <td>'.$titikJemput->id_titik_jemput.'</td>
                                        <td>'.$titikJemput->titik_jemput.'</td>
                                        <td>
                                        <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                        <a href="'.base_url().'admin/titik_penjemputan/delete/'.$titikJemput->id_titik_jemput.'" class="btn btn-danger" onclick="return deleteConfig()"><i class="fa fa-trash"></i> Hapus </a>
                                        </td>
                                    </tr>
                                    ';
                                }
                            } else {
                                echo '
                                    <tr>
                                        <td colspan="5">Data Kosong</td>
                                    <tr>
                                ';
                            }

                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <div class="modal fade" id="modalAddTitikJemput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Titik Jemput</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/titik_penjemputan" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="Kota">Kantor Cabang</label>
                                  <select class="form-control" name="id_kantor_cabang" id="id_kantor_cabang">
                                  <?php foreach ($dataKantorCabang as $row) { ?>
                                    <option value="<?php echo $row->id_kantor_cabang;?>"><?php echo $row->nama_kota ?></option>  
                                  <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="Kota">Cover Area</label>
                                  <input class="form-control" type="text" name="titik_jemput" id="titik_jemput">
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

    <!-- Modal Edit-->
    <div class="modal fade" id="modalEditTitikJemput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Titik Jemput</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="Kota">Kantor Cabang</label>
                                  <select class="form-control" name="kantor_cabang" id="id_kota">
                                  <?php foreach ($dataKantorCabang as $row) { ?>
                                    <option value="<?php echo $row->id_kantor_cabang;?>"><?php echo $row->nama_kota ?></option>  
                                  <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="Kota">Cover Area</label>
                                  <input class="form-control" type="text" name="titik_jemput" id="id_titik_jemput">
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
        $('#modalEditTitikJemput').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/titik_penjemputan/'+data[2]);
        
        $('#id_kota').val(data[0])
        $('#id_titik_jemput').val(data[3])
        
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

    function deleteConfig(){
        var tujuan=$(this).attr('id');
        var hapusin=confirm("Apakah Anda yakin ingin menghapus data titik penjemputan?");
        if(hapusin==true){
            window.location.href=tujuan;
        }
        else{
            alert("Data Batal dihapus");
        }
        return hapusin;
    }
</script>