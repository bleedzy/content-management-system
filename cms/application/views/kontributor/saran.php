<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Konten</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Isi Saran</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($saran as $s) {
                        ?>
                            <tr>
                                <td>
                                    <?= $s->nama ?>
                                </td>
                                <td>
                                    <?= $s->email ?>
                                </td>
                                <td>
                                    <a data-bs-toggle="collapse" href="#saran<?= $s->id_saran ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="ti-comment-alt"> Saran</i>
                                    </a>
                                    <div class="collapse" id="saran<?= $s->id_saran ?>">
                                        <div class="card card-body">
                                            <p class="text-capitalize text-break"><?= $s->isi_saran ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?= DateTime::createFromFormat('Y-m-d', $s->tanggal)->format('d-M-y'); ?>
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