<?php
include('./config/authCheck.php');
include('./layouts/mainWrapper.php');
include('./layouts/sidebar.php');
include('./layouts/pageWrapper.php');

error_reporting(0);
switch ($_GET['page']) {
    case 'home':
        include('./home.php');
        break;
    
    case 'mejaData':
        include('./pages/meja/mejaRead.php');
        break;
    case 'mejaCreate':
        include('./pages/meja/mejaCreate.php');
        break;
    case 'mejaUpdate':
        include('./pages/meja/mejaUpdate.php');
        break;
    case 'mejaDelete':
        include('./pages/meja/mejaDelete.php');
        break;

    case 'pelangganData':
        include('./pages/pelanggan/pelangganRead.php');
        break;
    case 'pelangganCreate':
        include('./pages/pelanggan/pelangganCreate.php');
        break;
    case 'pelangganUpdate':
        include('./pages/pelanggan/pelangganUpdate.php');
        break;
    case 'pelangganDelete':
        include('./pages/pelanggan/pelangganDelete.php');
        break;

    case 'reservasiData':
        include('./pages/reservasi/reservasiRead.php');
        break;
    case 'reservasiCreate':
        include('./pages/reservasi/reservasiCreate.php');
        break;
    case 'reservasiUpdate':
        include('./pages/reservasi/reservasiUpdate.php');
        break;
    case 'reservasiDelete':
        include('./pages/reservasi/reservasiDelete.php');
        break;
    case 'reservasiDetail':
        include('./pages/reservasi/reservasiDetail.php');
        break;

    default:
        include('./home.php');
}

include('./layouts/footer.php');
?>

