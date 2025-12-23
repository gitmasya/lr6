<?php
require_once 'Database.php';

class WeaponTable
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    // 1. МЕТОД ДЛЯ ПОИСКА ПО ID (ДОБАВИТЬ ЭТОТ!)
    public function findById($id)
    {
        $sql = "SELECT w.*, b.name as brand_name 
                FROM weapons w 
                LEFT JOIN brands b ON w.id_brand = b.id 
                WHERE w.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // 2. МЕТОД СОЗДАНИЯ (уже есть)
    public function create($data, $file = null)
    {
        // ... ваш существующий код создания ...
    }
    
    // 3. МЕТОД ОБНОВЛЕНИЯ (нужно добавить)
    public function update($id, $data, $file = null)
    {
        // Валидация данных (аналогично create)
        $errors = [];
        
        if (empty(trim($data['name']))) {
            $errors['name'] = 'Поле "Название" пустое или состоит из одних пробелов';
        }
        
        if (empty($data['id_brand'])) {
            $errors['id_brand'] = 'Поле "Бренд" не выбрано';
        }
        
        if (empty(trim($data['description']))) {
            $errors['description'] = 'Поле "Описание" пустое или состоит из одних пробелов';
        }
        
        if (empty(trim($data['cost']))) {
            $errors['cost'] = 'Поле "Цена" пустое или состоит из одних пробелов';
        } elseif (!is_numeric($data['cost'])) {
            $errors['cost'] = 'Поле "Цена" должно содержать только числа';
        } elseif ($data['cost'] < 0) {
            $errors['cost'] = 'Цена не может быть отрицательной';
        }
        
        if (!empty($errors)) {
            session_start();
            $_SESSION['validation_errors'] = $errors;
            $_SESSION['old_form_data'] = $data;
            return false;
        }
        
        // Получаем старую запись
        $oldWeapon = $this->findById($id);
        $imgPath = $oldWeapon['img_path']; // По умолчанию оставляем старое
        
        // Если загружено новое изображение
        if ($file && $file['error'] == 0) {
            // Загружаем новое
            $imgPath = $this->handleImageUpload($file);
            if (!$imgPath) {
                $errors['img_path'] = 'Ошибка при загрузке файла';
                session_start();
                $_SESSION['validation_errors'] = $errors;
                $_SESSION['old_form_data'] = $data;
                return false;
            }
        }
        
        // Обновляем запись
        $sql = "UPDATE weapons 
                SET name = :name, 
                    id_brand = :id_brand, 
                    description = :description, 
                    cost = :cost, 
                    img_path = :img_path 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => trim($data['name']),
            ':id_brand' => $data['id_brand'],
            ':description' => trim($data['description']),
            ':cost' => $data['cost'],
            ':img_path' => $imgPath,
            ':id' => $id
        ]);
    }

    // Добавьте этот метод в класс WeaponTable (после метода update)

public function delete($id)
{
    // 1. Получаем запись для удаления изображения
    $weapon = $this->findById($id);
    
    if (!$weapon) {
        return false; // Запись не найдена
    }
    
    // 2. Удаляем изображение, если оно не стандартное
    if ($weapon['img_path'] && $weapon['img_path'] != 'no_img.png') {
        $imagePath = __DIR__ . '/../inc/catalog_images/' . $weapon['img_path'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Удаляем файл
        }
    }
    
    // 3. Удаляем запись из базы данных
    $sql = "DELETE FROM weapons WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    
    return $stmt->execute([':id' => $id]);
}
    
    // 4. МЕТОД ПОЛУЧЕНИЯ ВСЕХ (уже есть)
    public function getAll()
    {
        $sql = "SELECT w.*, b.name as brand_name 
                FROM weapons w 
                LEFT JOIN brands b ON w.id_brand = b.id 
                ORDER BY w.id DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // 5. МЕТОД ПОЛУЧЕНИЯ БРЕНДОВ (уже есть)
    public function getBrands()
    {
        $sql = "SELECT * FROM brands ORDER BY name";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // 6. ВСПОМОГАТЕЛЬНЫЙ МЕТОД (уже есть)
    private function handleImageUpload($file)
    {
        if ($file && $file['error'] == 0) {
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
            $fileType = mime_content_type($file['tmp_name']);
            
            if (!in_array($fileType, $allowedTypes)) {
                return false;
            }
            
            if ($file['size'] > 5 * 1024 * 1024) {
                return false;
            }
            
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('weapon_', true) . '.' . $fileExtension;
            
            $uploadDir = __DIR__ . '/../inc/catalog_images/';
            
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $uploadPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                return $fileName;
            }
        }
        
        return 'no_img.png';
    }
}
?>