<div class="container">
    <?php if (!empty($notif)) { ?>
        <div class="alert <?=$alert; ?> align-self-start">
            <?= $notif; ?>
        </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAdmin">Tambah Admin</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Admin</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataAdmin)) {
                                foreach ($dataAdmin as $admin) { 
                        ?>
                            <tr>
                                <td><?= $admin->id_admin ?></td>
                                <td><?= $admin->username ?></td>
                                <td><?= $admin->email ?></td>
                                <td>
                                <button class="btn btn-primary btnEditAdmin"><i class="fa fa-edit"></i> Edit</button>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus admin?');" href="<?php echo base_url();?>admin/doDelete_admin/<?=$admin->id_admin?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="2">Data Kosong</td>
                            <tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUser">Tambah User</button>
                </div>
                <table class="table table-bordered" id="dataTable" style="width:100px" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Foto KTP</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataUser as $user) { ?>
                            <tr>
                                <td class="block"><?= $user->id_user?></td>
                                <td class="block"><?= $user->nm_depan?></td>
                                <td class="block"><?= $user->nm_belakang?></td>
                                <td class="block"><?= $user->username?></td>
                                <td class="block"><?= $user->email?></td>
                                <td class="block">
                                <?php if($user->foto_ktp !='null' || $user->foto_ktp !=''){ ?>
                                        <a href="<?=base_url('upload/KTP/')?><?=$user->foto_ktp?>" target="_blank"><img class="image-responsive" style="width:150px;" src="<?=base_url('upload/KTP/')?><?=$user->foto_ktp?>"/></a>
                                    <?php } else { echo "Belum Transfer"; } ?>
                                </td>
                                <td class="block"><?= $user->is_active?></td>
                                <td class="block">
                                    <div class="d-flex align-items-center flex-row justify-content-center">
                                        <div class="p-2">
                                            <button class="btn btn-primary btnEditUser"><i class="fa fa-edit" title="Edit User?"></i></button>
                                        </div>
                                        <div class="p-2">
                                            <a onclick="return confirm('Apakah anda yakin untuk menghapus user?');" href="<?php echo base_url();?>admin/doDelete_user/<?=$user->id_user?>" class="btn btn-danger" title="Hapus User?"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <div class="p-2">
                                            <?php if ($user->is_active == "active") { ?>
                                                <a onclick="return confirm('Apakah anda yakin untuk memblokir user?');" href="<?php echo base_url();?>admin/doBlokir_user/<?=$user->username?>/1" class="btn btn-secondary" title="Blokir User?"><i class="fa fa-lock"></i></a>
                                            <?php } else { ?>
                                                <a onclick="return confirm('Apakah anda yakin untuk membuka blokir user?');" href="<?php echo base_url();?>admin/doBlokir_user/<?=$user->username?>/0" class="btn btn-info" title="Buka Blokir?"><i class="fa fa-lock-open"></i></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_addAdmin" action="<?php echo base_url();?>admin/doAdd_admin" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usernameAdmin">Username</label>
                                    <input type="text" name="usernameAdmin" class="form-control"
                                        id="usernameAdmin"
                                        placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="emailAdmin">Email</label>
                                    <input type="email" name="emailAdmin" class="form-control"
                                        id="emailAdmin" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="passwordAdmin">Password</label>
                                    <input type="password" name="passwordAdmin" class="form-control"
                                        id="passwordAdmin" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="user" id="form_addUser" action="<?php echo base_url();?>admin/doAdd_user" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Nama Depan</label>
                                    <input type="text" name="nm_depan" class="form-control"
                                        id="nm_depan"
                                        placeholder="Masukan Nama Depan">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nm_belakang">Nama Belakang</label>
                                    <input type="text" name="nm_belakang" class="form-control"
                                        id="nm_belakang" placeholder="Masukkan Nama Belakang">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                        id="username"
                                        placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        id="email" placeholder="except@gmail.com">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="foto_ktp">Foto KTP</label><br>
                                    <input type="file" name="foto_ktp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="password" placeholder="Masukkan Password">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAdminEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="user" id="form_adminEdit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usernameAdminEdit">Username</label>
                                    <input type="text" name="usernameAdminEdit" class="form-control"
                                        id="usernameAdminEdit"
                                        placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="emailAdmin">Email</label>
                                    <input type="email" name="emailAdminEdit" class="form-control"
                                        id="emailAdminEdit" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="passwordAdminEdit">Password</label>
                                    <input type="password" name="passwordAdminEdit" class="form-control"
                                        id="passwordAdminEdit" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalUserEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="user" id="form_userEdit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6" id="names">
                                <div class="form-group">
                                    <label for="namaDepanEdit">Nama Depan</label>
                                    <input type="text" name="namaDepanEdit" class="form-control"
                                        id="namaDepanEdit" placeholder="Nama Depan">
                                </div>
                            </div>
                            <div class="col-lg-6" id="names">
                                <div class="form-group">
                                    <label for="namaBelakangEdit">Nama Belakang</label>
                                    <input type="text" name="namaBelakangEdit" class="form-control"
                                        id="namaBelakangEdit" placeholder="Nama Belakang">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usernameUserEdit">Username</label>
                                    <input type="text" name="usernameUserEdit" class="form-control"
                                        id="usernameUserEdit"
                                        placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="emailUserEdit">Email</label>
                                    <input type="email" name="emailUserEdit" class="form-control"
                                        id="emailUserEdit" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_foto_ktp">Foto KTP</label><br>
                                    <input type="file" name="e_foto_ktp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="passwordUserEdit">Password</label>
                                    <input type="password" name="passwordUserEdit" class="form-control"
                                        id="passwordUserEdit" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save" />
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
    $('.btnEditAdmin').on('click', function() {
        $('#modalAdminEdit').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        let formAction = $('#form_adminEdit');
        formAction = $('#form_adminEdit').attr('action', '<?php echo base_url();?>admin/doEdit_admin/'+data[1]+'/'+data[0]);
        
        $('#namaAdminEdit').val(data[0])
        $('#usernameAdminEdit').val(data[1])
        $('#emailAdminEdit').val(data[2])
    });
    $('.btnEditUser').on('click', function() {
        $('#modalUserEdit').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        let formAction = $('#form_userEdit');
        formAction = $('#form_userEdit').attr('action', '<?php echo base_url();?>admin/doEdit_user/'+data[3]+'/'+data[0]);
        
        $('#namaDepanEdit').val(data[1])
        $('#namaBelakangEdit').val(data[2])
        $('#usernameUserEdit').val(data[3])
        $('#emailUserEdit').val(data[4])
    });
    $( document ).ready(function() {
        <?php if (!empty($notif)) { ?>
            let alert = $('.alert');
            setTimeout(() => {
                alert.css('display', 'none');
            }, 3000);
        <?php } ?>
    });
</script>