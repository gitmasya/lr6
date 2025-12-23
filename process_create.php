<?php
// Всегда первой строкой!
session_start();

require_once 'models/WeaponTable.php';

// Проверяем, что форма была отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Создаем объект для работы с оружием
    $weaponTable = new WeaponTable();
    
    // Собираем данные из формы
    $formData = [
        'name' => $_POST['name'] ?? '',
        'id_brand' => $_POST['id_brand'] ?? '',
        'description' => $_POST['description'] ?? '',
        'cost' => $_POST['cost'] ?? ''
    ];
    
    // Получаем информацию о загруженном файле
    $uploadedFile = $_FILES['image'] ?? null;
    
    // Пытаемся создать запись в базе данных
    if ($weaponTable->create($formData, $uploadedFile)) {
        // Если успешно - сохраняем сообщение об успехе
        $_SESSION['success_message'] = 'Оружие успешно добавлено!';
        
        // Перенаправляем на главную страницу
        header('Location: index.php');
        exit;
    } else {
        // Если есть ошибки - возвращаем на форму
        // Ошибки уже сохранены в сессии в методе create()
        header('Location: create.php');
        exit;
    }
} else {
    // Если кто-то пытается открыть этот файл напрямую (не через форму)
    // Перенаправляем на форму создания
    header('Location: create.php');
    exit;
}