<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'home':
            include 'views/home.php';
            break;
        case 'paket':
            include 'views/paket.php';
            break;
        case 'pesanan':
            include 'views/pesanan.php';
            break;
    }
} else {
    include 'views/home.php';
}
