<?php

include "koneksi.php";

if (isset($_POST['bsimpan'])) {
    //persiapan simpan data

    $fname = $_FILES['formFile']['name'];
    $dirname = "uploads/";

    if (!move_uploaded_file($_FILES['formFile']['tmp_name'], $dirname . $fname)) {
        return;
    }

    $kueri = "INSERT INTO paket_wisata (nama, deskripsi, foto) VALUES ('$_POST[tnama]','$_POST[tdeskripsi]', '$fname');";

    $simpan = mysqli_query($koneksi, $kueri);

    //jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('Simpan data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM paket_wisata WHERE id = '$_POST[id_paket]' ");

    unlink('uploads/' . $_POST['fname_paket']);

    //jika hapus sukses
    if ($hapus) {
        echo "<script>
                alert('Hapus data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}


if (isset($_POST['bubah'])) {
    //persiapan ubah data
    $kueri =  "UPDATE paket_wisata SET 
                            nama = '$_POST[tnama]',
                            deskripsi = '$_POST[tdeskripsi]'
               WHERE id = '$_POST[id_paket]' ";

    if ($_FILES['formFile']['size'] != 0) {
        //hapus file sebelumnya
        unlink('uploads/' . $_POST['fname_paket']);

        //upload file baru
        $fname = $_FILES['formFile']['name'];
        $dirname = "uploads/";

        if (!move_uploaded_file($_FILES['formFile']['tmp_name'], $dirname . $fname)) {
            echo "<script>
                alert('Ubah data gagal');
                document.location = 'index.php?page=paket';
              </script>";
        }

        //tentukan kueri baru
        $kueri =  "UPDATE paket_wisata SET 
                            nama = '$_POST[tnama]',
                            deskripsi = '$_POST[tdeskripsi]',
                            foto = '$fname'
                   WHERE id = '$_POST[id_paket]' ";
    }

    $ubah = mysqli_query($koneksi, $kueri);
    //jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('Ubah data sukses');
                document.location = 'index.php?page=paket';
              </script>";
    } else {
        echo "<script>
                alert('Ubah data gagal');
                document.location = 'index.php?page=paket';
              </script>";
    }
}
