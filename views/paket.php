<?php include "koneksi.php"; ?>

<div class="container">
    <h3 class="text-center mt-3">Daftar Paket Wisata</h3>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah paket wisata
    </button>

    <!-- Awal Modal -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Paket Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="aksi_paket.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tnama" class="form-label">Nama paket:</label>
                            <input type="text" class="form-control" id="tnama" name="tnama" required>
                        </div>
                        <div class="mb-3">
                            <label for="tdeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="tdeskripsi" rows="3" name="tdeskripsi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto paket</label>
                            <input class="form-control" type="file" id="formFile" accept="image/*" name="formFile" onchange="preview(event)" required>
                        </div>
                        <div class="mb-3">
                            <img id="gambar" width="20%"> <br>
                            <script>
                                var preview = function(event) {
                                    var output = document.getElementById('gambar');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->

    <!-- Awal Tabel Paket -->
    <div class="table-responsive-lg">
        <table class="table table-striped table-hover table-bordered mt-3">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            //persiapan tampil data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM paket_wisata");

            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><img src="uploads/<?= $data['foto'] ?>" class="center"> </td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                    </td>
                </tr>


                <!-- Awal Modal Hapus -->
                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Paket Wisata</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_paket.php" method="post">
                                <input type="hidden" name="id_paket" value="<?= $data['id'] ?>">
                                <input type="hidden" name="fname_paket" value="<?= $data['foto'] ?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin menghapus data ini?
                                        <span class="text-danger"><?= $data['nama'] ?></span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="bhapus">Hapus</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Hapus -->

                <!-- Awal Modal Ubah-->
                <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Pesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_pesanan.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="tnama" class="form-label">Nama paket:</label>
                                        <input type="text" class="form-control" id="tnama" name="tnama" value="<?= $data['nama'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tdeskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="tdeskripsi" rows="3" name="tdeskripsi" required><?= $data['deskripsi'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto paket</label>
                                        <input class="form-control" type="file" id="formFile" accept="image/*" name="formFile" onchange="preview_edit(event)" value="<?= $data['foto'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <img id="gambar_ubah" width="20%" src="uploads/<?= $data['foto'] ?>"> <br>
                                        <script>
                                            var preview_edit = function(event) {
                                                var output = document.getElementById('gambar_ubah');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Ubah -->
            <?php endwhile; ?>
        </table>
    </div>
    <!-- Akhir Tabel Paket -->
</div>