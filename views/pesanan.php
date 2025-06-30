<?php include "koneksi.php"; ?>

<div class="container">
    <h3 class="text-center mt-3">Daftar Pesanan</h3>
    <!-- Awal Tabel Pesanan -->
    <div class="table-responsive-lg">
        <table class="table table-striped table-hover table-bordered mt-3 table-responsive">
            <tr>
                <th>No.</th>
                <th>Nama Pemesan</th>
                <th>Nomor HP</th>
                <th>Durasi Libur (hari)</th>
                <th>Penginapan</th>
                <th>Transportasi</th>
                <th>Makan</th>
                <th>Jumlah Peserta</th>
                <th>Harga Paket</th>
                <th>Total Tagihan</th>
                <th>Aksi</th>
            </tr>
            <?php
            //persiapan tampil data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM pemesanan");

            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_pemesan'] ?></td>
                    <td><?= $data['nomor_hp'] ?></td>
                    <td><?= $data['lama_perjalanan'] ?></td>
                    <td><?= $data['akomodasi'] ?></td>
                    <td><?= $data['transportasi'] ?></td>
                    <td><?= $data['service_makan'] ?></td>
                    <td><?= $data['jum_peserta'] ?></td>
                    <td><?= $data['harga_paket'] ?></td>
                    <td><?= $data['total_tagihan'] ?></td>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data Pemesanan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="aksi_pesanan.php" method="post">
                                <input type="hidden" name="id_pemesanan" value="<?= $data['id'] ?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin menghapus data ini? <br>
                                        <span class="text-danger"><?= $data['nama_pemesan'] ?>-<?= $data['nomor_hp'] ?></span>
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
                            <form action="aksi_pesanan.php" method="post">
                                <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="tnama" class="form-label">Nama Pemesan</label>
                                        <input type="text" class="form-control" id="tnama" name="tnama" value="<?= $data['nama_pemesan'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tnomorhp" class="form-label">Nomor HP Pemesan</label>
                                        <input type="number" class="form-control" id="tnomorhp" name="tnomorhp" value="<?= $data['nomor_hp'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tjumhari" class="form-label">Waktu Pelaksanaan Perjalanan</label>
                                        <input type="number" min="1" class="form-control" id="tjumhari" name="tjumhari" value="<?= $data['lama_perjalanan'] ?>" required>
                                    </div>

                                    <label class="mb-3">Pelayanan paket perjalanan</label>

                                    <div class="mb-3 form-check">
                                        <input type="hidden" class="form-check-input" name="cpenginapan" value="N">
                                        <input type="checkbox" class="form-check-input" id="cpenginapan" name="cpenginapan" <?= ($data['akomodasi'] == 'Y') ? 'checked' : '' ?> value="Y">
                                        <label class="form-check-label" for="cpenginapan">Penginapan Rp. 1.000.000</label>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="hidden" class="form-check-input" name="ctransportasi" value="N">
                                        <input type="checkbox" class="form-check-input" id="ctransportasi" name="ctransportasi" <?= ($data['transportasi'] == 'Y') ? 'checked' : '' ?> value="Y">
                                        <label class="form-check-label" for="ctransportasi">Transportasi Rp. 1.200.000</label>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="hidden" class="form-check-input" name="cmakan" value="N">
                                        <input type="checkbox" class="form-check-input" id="cmakan" name="cmakan" <?= ($data['service_makan'] == 'Y') ? 'checked' : '' ?> value="Y">
                                        <label class="form-check-label" for="cmakan">Makan Rp. 500.000</label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tjumpeserta" class="form-label">Jumlah Peserta</label>
                                        <input type="number" min="1" class="form-control" id="tjumpeserta" name="tjumpeserta" value="<?= $data['jum_peserta'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tharga" class="form-label">Harga Paket Perjalanan</label>
                                        <input type="number" min="1" class="form-control" id="tharga" name="tharga" value="<?= $data['harga_paket'] ?>" readonly required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ttagihan" class="form-label">Jumlah Tagihan</label>
                                        <input type="number" min="1" class="form-control" id="ttagihan" name="ttagihan" value="<?= $data['total_tagihan'] ?>" readonly required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Ubah -->
            <?php endwhile; ?>
        </table>
    </div>
    <!-- Akhir Tabel Pesanan -->
    <script src="js/total.js"></script>
</div>