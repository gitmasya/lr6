<?php
// models/Database.php
class Database {
    private static $instance = null;
    private $pdo;
    
    // Приватный конструктор (паттерн Singleton)
    private function __construct() {
        // Параметры подключения
        $host = 'localhost';
        $dbname = 'ammunition';
        $username = 'root';
        $password = '';
        
        // Подключаемся к БД
        try {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $username,
                $password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }
    
    // Получить единственный экземпляр класса
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}
?>