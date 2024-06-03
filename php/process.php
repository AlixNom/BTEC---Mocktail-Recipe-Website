<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = ["item1", "item2", "item3"]; // Initial constant array
}

$action = $_POST['action'];

if ($action === 'load') {
    // Just return the current data
    echo json_encode($_SESSION['data']);
} elseif ($action === 'add') {
    $data = $_POST['data'];
    if (!empty($data)) {
        $_SESSION['data'][] = $data;
    }
    echo json_encode($_SESSION['data']);
} elseif ($action === 'edit') {
    $index = intval($_POST['index']);
    $newValue = $_POST['newValue'];
    if (isset($_SESSION['data'][$index]) && !empty($newValue)) {
        $_SESSION['data'][$index] = $newValue;
    }
    echo json_encode($_SESSION['data']);
} elseif ($action === 'remove') {
    $index = intval($_POST['index']);
    if (isset($_SESSION['data'][$index])) {
        array_splice($_SESSION['data'], $index, 1);
    }
    echo json_encode($_SESSION['data']);
}
?>