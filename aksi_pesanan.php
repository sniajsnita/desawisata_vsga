<?php

include "koneksi.php";


if (isset($_POST['bsimpan'])) {
    //persiapan simpan data
    $kueri = "INSERT INTO pemesanan (nama_pemesan, 
                                    nomor_hp, 
                                    lama_perjalanan, 
                                    akomodasi, 
                                    transportasi, 
                                    service_makan, 
                                    jum_peserta, 
                                    harga_paket, 
                                    total_tagihan) VALUES ('$_POST[tnama]',
                                                           '$_POST[tnomorhp]', 
                                                           '$_POST[tjumhari]', 
                                                           '$_POST[cpenginapan]', 
                                                           '$_POST[ctransportasi]', 
                                                           '$_POST[cmakan]', 
                                                           '$_POST[tjumpeserta]', 
                                                           '$_POST[tharga]', 
                                                           '$_POST[ttagihan]');";

    $simpan = mysqli_query($koneksi, $kueri);

    // jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('Simpan data sukses');
                document.location = 'index.php?page=pesanan';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal');
                document.location = 'index.php?page=pesanan';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id = '$_POST[id_pemesanan]' ");

    //jika hapus sukses
    if ($hapus) {
        echo "<script>
                alert('Hapus data sukses');
                document.location = 'index.php?page=pesanan';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                document.location = 'index.php?page=pesanan';
              </script>";
    }
}

if (isset($_POST['bubah'])) {
    //persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE pemesanan SET 
                                          nama_pemesan = '$_POST[tnama]',
                                          nomor_hp = '$_POST[tnomorhp]',
                                          lama_perjalanan = '$_POST[tjumhari]',
                                          akomodasi = '$_POST[cpenginapan]',
                                          transportasi = '$_POST[ctransportasi]',
                                          service_makan = '$_POST[cmakan]',
                                          jum_peserta = '$_POST[tjumpeserta]',
                                          harga_paket = '$_POST[tharga]',
                                          total_tagihan = '$_POST[ttagihan]'
                                    WHERE id = '$_POST[id_pesanan]' ");
    // jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('Ubah data sukses');
                document.location = 'index.php?page=pesanan';
              </script>";
    } else {
        echo "<script>
                alert('Ubah data gagal');
                document.location = 'index.php?page=pesanan';
              </script>";
    }
}
