<?php
include('koneksi.php');
session_start();

if (isset($_POST['id_menu']) && isset($_POST['action'])) {
    $id_menu = $_POST['id_menu'];
    $action = $_POST['action'];

    if ($action == 'plus') {
        if (isset($_SESSION["pesanan"][$id_menu])) {
            $_SESSION["pesanan"][$id_menu] += 1;
        } else {
            $_SESSION["pesanan"][$id_menu] = 1;
        }
    } elseif ($action == 'minus') {
        if (isset($_SESSION["pesanan"][$id_menu]) && $_SESSION["pesanan"][$id_menu] > 1) {
            $_SESSION["pesanan"][$id_menu] -= 1;
        } else {
            unset($_SESSION["pesanan"][$id_menu]);
        }
    }

    // Debugging output
    echo json_encode($_SESSION["pesanan"]);
} else {
    echo json_encode(array("error" => "Invalid request"));
}
?>


