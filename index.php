<?php
include('./layouts/mainWrapper.php');
include('./layouts/sidebar.php');
include('./layouts/pageWrapper.php');

error_reporting(0);
switch ($_GET['page']) {
    case 'home':
        include('./home.php');
        break;
    
    case 'mejaData':
        include('./meja/mejaRead.php');
        break;
    case 'mejaCreate':
        include('./meja/mejaCreate.php');
        break;
    case 'mejaUpdate':
        include('./meja/mejaUpdate.php');
        break;
    case 'mejaDelete':
        include('./meja/mejaDelete.php');
        break;

    case 'pelangganData':
        include('./pelanggan/pelangganRead.php');
        break;
    case 'pelangganCreate':
        include('./pelanggan/pelangganCreate.php');
        break;
    case 'pelangganUpdate':
        include('./pelanggan/pelangganUpdate.php');
        break;
    case 'pelangganDelete':
        include('./pelanggan/pelangganDelete.php');
        break;

    case 'reservasiData':
        include('./reservasi/reservasiRead.php');
        break;
    case 'reservasiCreate':
        include('./reservasi/reservasiCreate.php');
        break;
    case 'reservasiUpdate':
        include('./reservasi/reservasiUpdate.php');
        break;
    case 'reservasiDelete':
        include('./reservasi/reservasiDelete.php');
        break;

    default:
        include('./home.php');
}

include('./layouts/footer.php');
?>

