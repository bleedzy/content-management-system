<script src="https://cdn.tiny.cloud/1/wg9pewtr3fjinzlew3ysteouyfhlusckii9yuucv7aiuqoic/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
    Add
</button>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('kontributor/konten/save') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Konten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input name="judul" class="form-control" type="text" required placeholder="" />
                        <label for="inputJudul">Judul</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="kategori" class="form-control" required>
                            <option value="" selected disabled>-Pilih Kategori-</option>
                            <?php foreach ($kategori as $kate) { ?>
                                <option value="<?= $kate->id_kategori ?>"><?= $kate->kategori ?></option>
                            <?php } ?>
                        </select>
                        <label for="inputKategori">Kategori</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="isi_konten"></textarea>
                        <label for="inputKonten">Isi Konten</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputImage" class="form-label">Foto :</label>
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
            <h4 class="card-title">Table Konten</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Kreator</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($konten as $k) {
                        ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $k->judul ?>
                                </td>
                                <td>
                                    <?= $k->kategori ?>
                                </td>
                                <td>
                                    <?= DateTime::createFromFormat('Y-m-d', $k->tanggal)->format('d-M-y'); ?>
                                </td>
                                <td>
                                    <?= $k->username ?>
                                </td>
                                <td>
                                    <?php
                                    if ($k->foto != NULL) {
                                        echo '<a href="' . base_url('assets/images/konten/') . $k->foto . '" target="_blank">
                                                <i class="ti-search"> Lihat Gambar</i>
                                            </a>';
                                    } else {
                                        echo 'Tidak Ada Gambar';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($ambil->username == $k->username) {
                                        echo '<button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#edit' . $k->id_konten . '"><i class="ti-pencil-alt text-primary"></i></button>';
                                        echo '<button class="btn btn-outline-secondary btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#hapus' . $k->id_konten . '"><i class="ti-trash text-danger"></i></button>';
                                    } else {
                                        echo "Bukan Milik Anda";
                                    }
                                    ?>
                                    <div class="modal fade" id="edit<?= $k->id_konten ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?= site_url('kontributor/konten/edit/' . $k->id_konten) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Konten</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input name="judul" class="form-control" type="text" value="<?= $k->judul ?>" required placeholder="" />
                                                            <label for="inputJudul">Judul</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <select name="kategori" class="form-control" required>
                                                                <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                                                                <?php foreach ($kategori as $kate) { ?>
                                                                    <option value="<?= $kate->id_kategori ?>"><?= $kate->kategori ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="inputKategori">Kategori</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <textarea name="isi_konten"><?= $k->isi_konten ?></textarea>
                                                            <label for="inputKonten">Isi Konten</label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="inputImage" class="form-label">Foto :</label>
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
                                    <div class="modal fade" id="hapus<?= $k->id_konten ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Ingin Menghapus Konten Ini</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                    <a href="<?= site_url('kontributor/konten/delete/' . $k->id_konten); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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
<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
        menubar: '',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>