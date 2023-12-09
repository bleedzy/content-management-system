<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
    Add
</button>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/kategori/save') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input name="kategori" class="form-control" type="text" placeholder="Kategori" required />
                        <label for="inputKategori">Kategori</label>
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
            <h4 class="card-title">Table Kategori</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $k) {
                        ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $k->kategori ?>
                                </td>
                                <td>
                                    <form action="<?= site_url('admin/kategori/status/' . $k->id_kategori) ?>" method="post">
                                        <div class="form-check form-switch">
                                            <input <?php
                                                    if ($k->status == 'aktif') {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" onchange="this.form.submit()">
                                            <label class="form-check-label">
                                                <?php
                                                if ($k->status == 'aktif') {
                                                    echo 'Aktif';
                                                } elseif ($k->status == 'nonaktif') {
                                                    echo 'Nonaktif';
                                                } else {
                                                    echo 'Nonaktif';
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#edit<?= $k->id_kategori ?>"><i class="ti-pencil-alt text-primary"></i></button>
                                    <button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#hapus<?= $k->id_kategori ?>"><i class="ti-trash text-danger"></i></button>
                                    <div class="modal fade" id="edit<?= $k->id_kategori ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('admin/kategori/update/' . $k->id_kategori) ?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input name="kategori" value="<?= $k->kategori ?>" class="form-control" type="text" placeholder="Kategori" required />
                                                            <label for="inputKategori">Kategori</label>
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
                                    <div class="modal fade" id="hapus<?= $k->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Ingin Menghapus Kategori Ini</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                    <a href="<?= site_url('admin/kategori/delete/' . $k->id_kategori); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="text-capitalize">Note : Status aktif maka konten dengan kategori tersebut akan ditampilkan pada footbar.</p>
        </div>
    </div>
</div>