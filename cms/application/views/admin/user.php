<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
    Add
</button>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/user/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input name="nama" class="form-control" type="text" placeholder="Enter your Nama" required />
                        <label for="inputNama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="username" class="form-control" type="text" placeholder="Enter your Username" required />
                        <label for="inputUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" class="form-control" type="password" placeholder="Enter your Password" required />
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="level" class="form-control" required>
                            <option value="" selected disabled>-Pilih Level-</option>
                            <option value="Admin">Admin</option>
                            <option value="Kontributor">Kontributor</option>
                        </select>
                        <label for="inputLevel">Level</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputImage" class="form-label">Image Profile:</label>
                        <input type="file" name="image" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table User</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Recent Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $u) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($u->image != NULL) {
                                        echo "<img src='" . base_url('assets/images/upload/') . $u->image . "'>";
                                    } else {
                                        echo "<img src='" . base_url('assets/images/upload/default/default.png') . "'>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $u->username ?>
                                </td>
                                <td>
                                    <?= $u->nama ?>
                                </td>
                                <td>
                                    <?= $u->level ?>
                                </td>
                                <td>
                                    <?php
                                    if ($u->recent_login == NULL) {
                                        echo "Belum Login";
                                    } else {
                                        echo DateTime::createFromFormat('Y-m-d H:i:s', $u->recent_login)->format('H:i');
                                        echo " WIB<br>";
                                        echo DateTime::createFromFormat('Y-m-d H:i:s', $u->recent_login)->format('d-M-y');
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#edit<?= $u->id_user ?>"><i class="ti-pencil-alt text-primary"></i></button>
                                    <button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#hapus<?= $u->id_user ?>"><i class="ti-trash text-danger"></i></button>
                                    <div class="modal fade" id="edit<?= $u->id_user ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('admin/user/update/' . $u->id_user) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input name="nama" class="form-control" type="text" value="<?= $u->nama ?>" placeholder="Enter your Nama" required />
                                                            <label for="inputNama">Nama</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input name="username" class="form-control" type="text" value="<?= $u->username ?>" placeholder="Enter your Username" required readonly />
                                                            <label disabled for="inputUsername">Username</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <select class="form-control text-dark" required>
                                                                <option selected disabled>
                                                                    <?= $u->level ?>
                                                                </option>
                                                            </select>
                                                            <label for="inputLevel">Level</label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="inputImage" class="form-label">Image Profile:</label>
                                                            <input type="file" name="imagee" class="form-control form-control-lg">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input class="btn btn-primary" type="submit" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="hapus<?= $u->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Ingin Menghapus User Ini</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                    <a href="<?= site_url('admin/user/delete/' . $u->id_user); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>