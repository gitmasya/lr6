<?php
// delete.php
session_start();
require_once 'models/WeaponTable.php';

// Проверяем, передан ли ID
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$weaponTable = new WeaponTable();

// Удаляем запись
if ($weaponTable->delete($_GET['id'])) {
    $_SESSION['success'] = 'Оружие успешно удалено!';
} else {
    $_SESSION['error'] = 'Ошибка при удалении';
}

// Возвращаем на главную
header('Location: index.php');
exit;
?>