<?php include "koneksi.php"; ?>

<div class="container">
    <div class="row">
        <!-- Awal konten paket wisata -->
        <div class="p-2 col-lg-8 me-3">
            <div class="row">
                <?php
                //persiapan tampil data
                $tampil = mysqli_query($koneksi, "SELECT * FROM paket_wisata LIMIT 5");

                while ($data = mysqli_fetch_array($tampil)) :
                ?>
                    <!-- Awal konten Paket -->
                    <div class="card m-3" style="width: 18rem;">
                        <img src="uploads/<?= $data['foto'] ?>" class="card-img-top mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama'] ?></h5>
                            <p class="card-text"><?= $data['deskripsi'] ?></p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                Tambah Pesanan
                            </button>

                            <!-- Awal modal pesanan -->
                            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="aksi_pesanan.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pesanan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="tnama" class="form-label">Nama Pemesan</label>
                                                    <input type="text" class="form-control" id="tnama" name="tnama" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tnomorhp" class="form-label">Nomor HP Pemesan</label>
                                                    <input type="number" class="form-control" id="tnomorhp" name="tnomorhp" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tjumhari" class="form-label">Waktu Pelaksanaan Perjalanan</label>
                                                    <input type="number" min="1" class="form-control" id="tjumhari" name="tjumhari" value="0" required>
                                                </div>

                                                <label class="mb-3">Pelayanan paket perjalanan</label>

                                                <div class="mb-3 form-check">
                                                    <input type="hidden" class="form-check-input" name="cpenginapan" value="N">
                                                    <input type="checkbox" class="form-check-input" id="cpenginapan" name="cpenginapan" value="Y">
                                                    <label class="form-check-label" for="cpenginapan">Penginapan Rp. 1.000.000</label>
                                                </div>

                                                <div class="mb-3 form-check">
                                                    <input type="hidden" class="form-check-input" name="ctransportasi" value="N">
                                                    <input type="checkbox" class="form-check-input" id="ctransportasi" name="ctransportasi" value="Y">
                                                    <label class="form-check-label" for="ctransportasi">Transportasi Rp. 1.200.000</label>
                                                </div>

                                                <div class="mb-3 form-check">
                                                    <input type="hidden" class="form-check-input" name="cmakan" value="N">
                                                    <input type="checkbox" class="form-check-input" id="cmakan" name="cmakan" value="Y">
                                                    <label class="form-check-label" for="cmakan">Makan Rp. 500.000</label>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tjumpeserta" class="form-label">Jumlah Peserta</label>
                                                    <input type="number" min="1" class="form-control" id="tjumpeserta" name="tjumpeserta" value="0" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tharga" class="form-label">Harga Paket Perjalanan</label>
                                                    <input type="number" min="1" class="form-control" id="tharga" name="tharga" value="0" readonly required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="ttagihan" class="form-label">Jumlah Tagihan</label>
                                                    <input type="number" min="1" class="form-control" id="ttagihan" name="ttagihan" value="0" readonly required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir modal pesanan -->
                        </div>
                    </div>
                    <!-- Akhir konten paket -->
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Akhir konten paket wisata -->

        <!-- Awal konten video -->
        <div class="p-2 col-lg-3 ms-auto mt-3">
            <div>
                <div class="card mb-3">
                    <h5 class="card-title m-3">Paket Wisata 1</h5>
                    <iframe class="m-3" src="https://www.youtube.com/embed/5UNQKrtqvhc?si=PA0ERMSyzEToVLxj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div>
                <div class="card mb-3">
                    <h5 class="card-title m-3">Paket Wisata 2</h5>
                    <iframe class="m-3" src="https://www.youtube.com/embed/7XRHZ4g9z3A?si=LuA6uQtTgUZ_VYQD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- Akhir konten video -->
        <script src="js/total.js"></script>
    </div>
</div>