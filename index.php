<?php
session_start();
require_once 'models/WeaponTable.php';

$weaponTable = new WeaponTable();
$weapons = $weaponTable->getAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог оружия</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
     <!-- Основной контейнер для всей страницы (кроме навигации) -->
    <div class="container px-2">
        <!-- Первая шапка -->
                <div class="row align-items-center g-0 mt-3">
                    <div class="col-1 d-flex justify-content-center">
                        <a href="#" class="text-decoration-underline text-dark">Волгоград</a>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center g-3">
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark d-flex align-items-center"><img src="inc/images/pin.svg" alt="Магазины" class="me-1" width="16" height="16"> Магазины</a>
                            </div>
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark text-decoration-underline d-flex align-items-center"><img src="inc/images/query-accent.svg" alt="Что с моим заказом?" class="me-1" width="16" height="16"">Что с моим заказом?</a>
                            </div>
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark d-flex align-items-center"><img src="inc/images/ico-blog.svg" alt="Блог" class="me-1" width="16" height="16" > Блог</a>
                            </div>
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark d-flex align-items-center"><img src="inc/images/ico-percent.svg" alt="Уцененные товары" class="me-1" swidth="16" height="16">Уцененные товары</a>
                            </div>
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark d-flex align-items-center"><img src="inc/images/ico-boxes2.svg" alt="Купить оптом" class="me-1" width="16" height="16">Купить оптом</a>
                            </div>
                            <div class="col-auto"><a href="#" class="text-decoration-none text-dark d-flex align-items-center"><img src="inc/images/ico-market.svg" alt="Продажа б/у оружия" class="me-1" width="16" height="16">Продажа б/у оружия</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center gap-2">
                            <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                <img src="inc/images/lock.svg" alt="Войти" class="me-1" width="16" height="16">
                                Войти</a>
                            <span class="text-muted">|</span>
                            <a href="#" class="text-decoration-none text-dark">Регистрация</a>
                        </div>
                    </div>
                </div>
        <!-- Вторая шапка -->
        <div class="row border-bottom py-3 mx-0">
            <div class="col-12">
                <div class="row align-items-center g-3">
                    <div class="col-lg-2 col-md-3 col-6">
                        <img src="inc/images/logo.svg" alt="Логотип" class="img-fluid" height="50">
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Поиск товаров...">
                            <button class="btn btn-outline-secondary d-flex align-items-center justify-content-center" type="button">
                                <img src="inc/images/search.svg" alt="Поиск" class="w-75 h-75">
                            </button>
                        </div>
                    </div>                   
                    <div class="col-lg-3 col-md-4 col-12 text-center">
                        <div class="d-inline-block text-md-center">
                            <div class="small">Звоните с 9:00 до 18:00 (мск)</div>
                            <div class="fw-bold">+7 (861) 210-97-80</div>
                            <a href="#" class="text-decoration-none text-danger small">Заказать звонок</a>
                        </div>
                    </div>                   
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="d-flex justify-content-lg-end justify-content-center align-items-center gap-3">
                            <div class="d-flex gap-2">
                                <a href="#" class="text-decoration-none"><img src="inc/images/compare.svg" alt="Сравнение" class="img-fluid" width="24" height="24"></a>
                                <a href="#" class="text-decoration-none"><img src="inc/images/favorite.svg" alt="Избранное" class="img-fluid" width="24" height="24"></a>
                                <a href="#" class="text-decoration-none"><img src="inc/images/cart.svg" alt="Корзина" class="img-fluid" width="24" height="24"></a>
                            </div>
                            <div class="border-start ps-3">
                                <div class="small">Моя корзина</div>
                                <div class="fw-bold">0Р</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Закрытие основного контейнера -->

    <!-- Навигация по категориям - ВНЕ контейнера, на всю ширину -->
    <div class="bg-dark py-2">
        <div class="container px-4">
            <div class="d-flex flex-wrap align-items-center justify-content-center">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Охота и спортивная рыбалка</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Охотничье ружье</a></li>
                            <li><a href="#" class="dropdown-item">Патроны</a></li>
                            <li><a href="#" class="dropdown-item">Самооборона и спецсредства</a></li>
                            <li><a href="#" class="dropdown-item">Пневматика</a></li>
                            <li><a href="#" class="dropdown-item">Снаряжение для патронов</a></li>
                            <li><a href="#" class="dropdown-item">Ножи и инструменты</a></li>
                            <li><a href="#" class="dropdown-item">Оптика</a></li>
                            <li><a href="#" class="dropdown-item">Средства для чистки оружия</a></li>
                            <li><a href="#" class="dropdown-item">Амуниция</a></li>
                            <li><a href="#" class="dropdown-item">Запасные части к оружию</a></li>
                            <li><a href="#" class="dropdown-item">Приманки для охоты</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары охотничьи</a></li>
                            <li><a href="#" class="dropdown-item">Сейфы оружейные</a></li>
                            <li><a href="#" class="dropdown-item">Арбалеты, луки, рогатки</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары для спортивной стрельбы</a></li>
                            <li><a href="#" class="dropdown-item">Пейнтбол</a></li>
                            <li><a href="#" class="dropdown-item">Макеты ММГ</a></li>
                            <li><a href="#" class="dropdown-item">Оружие охолощенное</a></li>
                            <li><a href="#" class="dropdown-item">Оружие ООП</a></li>
                            <li><a href="#" class="dropdown-item">Экипировка для осенней охоты</a></li>
                            <li><a href="#" class="dropdown-item">Охота на утку</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Рыбалка</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Удилища</a></li>
                            <li><a href="#" class="dropdown-item">Катушки</a></li>
                            <li><a href="#" class="dropdown-item">Лески, шнуры</a></li>
                            <li><a href="#" class="dropdown-item">Приманки</a></li>
                            <li><a href="#" class="dropdown-item">Прикормка, насадки</a></li>
                            <li><a href="#" class="dropdown-item">Оснащение рыболовное</a></li>
                            <li><a href="#" class="dropdown-item">Оборудование рыболовное</a></li>
                            <li><a href="#" class="dropdown-item">Ножи для рыбалки</a></li>
                            <li><a href="#" class="dropdown-item">Рыболовные палатки</a></li>
                            <li><a href="#" class="dropdown-item">Кресла для рыбалки</a></li>
                            <li><a href="#" class="dropdown-item">Очки для рыбалки</a></li>
                            <li><a href="#" class="dropdown-item">Летняя рыбалка</a></li>
                            <li><a href="#" class="dropdown-item">На щуку</a></li>
                            <li><a href="#" class="dropdown-item">На карпа</a></li>
                            <li><a href="#" class="dropdown-item">Лодки</a></li>
                            <li><a href="#" class="dropdown-item">Эхолоты</a></li>
                            <li><a href="#" class="dropdown-item">Подводная охота</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Туризм</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Палатки</a></li>
                            <li><a href="#" class="dropdown-item">Рюкзаки и сумки</a></li>
                            <li><a href="#" class="dropdown-item">Спальные мешки</a></li>
                            <li><a href="#" class="dropdown-item">Кемпинговая мебель</a></li>
                            <li><a href="#" class="dropdown-item">Горелки и лампы</a></li>
                            <li><a href="#" class="dropdown-item">Посуда</a></li>
                            <li><a href="#" class="dropdown-item">Коврики туристические</a></li>
                            <li><a href="#" class="dropdown-item">Фонари</a></li>
                            <li><a href="#" class="dropdown-item">Термосы и термокружки</a></li>
                            <li><a href="#" class="dropdown-item">Сумки-холодильники</a></li>
                            <li><a href="#" class="dropdown-item">Наборы для пикника</a></li>
                            <li><a href="#" class="dropdown-item">Костровое оборудование</a></li>
                            <li><a href="#" class="dropdown-item">Средства розжига</a></li>
                            <li><a href="#" class="dropdown-item">Средства защиты от насекомых</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары туристические</a></li>
                            <li><a href="#" class="dropdown-item">Готовая еда</a></li>
                            <li><a href="#" class="dropdown-item">Ножи</a></li>
                            <li><a href="#" class="dropdown-item">Мультитулы</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Одежда</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Костюмы</a></li>
                            <li><a href="#" class="dropdown-item">Куртки</a></li>
                            <li><a href="#" class="dropdown-item">Брюки</a></li>
                            <li><a href="#" class="dropdown-item">Комбинезоны</a></li>
                            <li><a href="#" class="dropdown-item">Шорты</a></li>
                            <li><a href="#" class="dropdown-item">Термобелье</a></li>
                            <li><a href="#" class="dropdown-item">Свитера</a></li>
                            <li><a href="#" class="dropdown-item">Майки, рубашки</a></li>
                            <li><a href="#" class="dropdown-item">Жилеты</a></li>
                            <li><a href="#" class="dropdown-item">Плащи-дождевики</a></li>
                            <li><a href="#" class="dropdown-item">Костюмы маскировочные</a></li>
                            <li><a href="#" class="dropdown-item">Головные уборы</a></li>
                            <li><a href="#" class="dropdown-item">Перчатки</a></li>
                            <li><a href="#" class="dropdown-item">Ремни, подтяжки</a></li>
                            <li><a href="#" class="dropdown-item">Уход за одеждой</a></li>
                            <li><a href="#" class="dropdown-item">Носки</a></li>
                            <li><a href="#" class="dropdown-item">Демисезонная одежда</a></li>
                            <li><a href="#" class="dropdown-item">Летняя одежда</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Обувь</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Ботинки</a></li>
                            <li><a href="#" class="dropdown-item">Сапоги</a></li>
                            <li><a href="#" class="dropdown-item">Вейдерсы</a></li>
                            <li><a href="#" class="dropdown-item">Кроссовки Сандали</a></li>
                            <li><a href="#" class="dropdown-item">Носки</a></li>
                            <li><a href="#" class="dropdown-item">Средства ухода за обувью</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары для обуви</a></li>
                            <li><a href="#" class="dropdown-item">Демисезонная обувь</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Лодки и  моторы</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Моторы</a></li>
                            <li><a href="#" class="dropdown-item">Лодки</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары для моторов</a></li>
                            <li><a href="#" class="dropdown-item">Аксессуары для лодок</a></li>
                            <li><a href="#" class="dropdown-item">Средства спасения</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Прочее</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Техника</a></li>
                            <li><a href="#" class="dropdown-item">Пиротехника</a></li>
                            <li><a href="#" class="dropdown-item">Сувениры</a></li>
                            <li><a href="#" class="dropdown-item">Печатная и видео продукция</a></li>
                            <li><a href="#" class="dropdown-item">Подарки на 23 февраля</a></li>
                            <li><a href="#" class="dropdown-item">Подарки туристу</a></li>
                            <li><a href="#" class="dropdown-item">Подарки охотнику</a></li>
                            <li><a href="#" class="dropdown-item">Подарки рыбаку</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Электроника</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Эхолоты и аксессуары</a></li>
                            <li><a href="#" class="dropdown-item">Навигаторы и аксессуары</a></li>
                            <li><a href="#" class="dropdown-item">Рации и аксессуары</a></li>
                            <li><a href="#" class="dropdown-item">Компасы, барометры</a></li>
                            <li><a href="#" class="dropdown-item">Весы</a></li>
                            <li><a href="#" class="dropdown-item">Видеокамеры</a></li>
                            <li><a href="#" class="dropdown-item">Элементы питания</a></li>
                            <li><a href="#" class="dropdown-item">Кораблики прикормочные</a></li>
                        </ul>
                    </div>
                    <div class="border-end border-secondary mx-1"></div>
                    <a href="#" class="text-decoration-none text-white px-3 py-1">Taigan</a>
                    <div class="border-end border-secondary mx-1"></div>
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-white px-3 py-1 bg-danger rounded ms-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Акции</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Охота и спортивная стрельба</a></li>
                            <li><a href="#" class="dropdown-item">Рыбалка</a></li>
                            <li><a href="#" class="dropdown-item">Туризм</a></li>
                            <li><a href="#" class="dropdown-item">Одежда</a></li>
                            <li><a href="#" class="dropdown-item">Обувь</a></li>
                            <li><a href="#" class="dropdown-item">Лодки и моторы</a></li>
                            <li><a href="#" class="dropdown-item">Прочее</a></li>
                            <li><a href="#" class="dropdown-item">Электроника</a></li>
                            <li><a href="#" class="dropdown-item">Все акционные товары</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        
        <!-- Уведомление об успехе -->
        <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <div class="flex-grow-1">
                <h5 class="alert-heading mb-1">Успешно!</h5>
                <p class="mb-0"><?= $_SESSION['success_message'] ?></p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
        
        <!-- Заголовок и кнопка -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-0">Каталог оружия</h1>
                <p class="text-muted mb-0">Всего записей: <span class="badge bg-secondary"><?= count($weapons) ?></span></p>
            </div>
            <a href="create.php" class="btn btn-primary btn-lg">
                Добавить оружие
            </a>
        </div>
        
        <?php if (!empty($weapons)): ?>
        <!-- Таблица с оружием -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 60px;">ID</th>
                                <th class="text-center" style="width: 120px;">Фото</th>
                                <th>Название</th>
                                <th>Бренд</th>
                                <th>Описание</th>
                                <th class="text-end" style="width: 120px;">Цена</th>
                                <th class="text-center" style="width: 100px;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($weapons as $weapon): ?>
                            <tr class="align-middle">
                                <!-- ID -->
                                <td class="text-center fw-bold">
                                    <span class="badge bg-dark rounded-pill"><?= $weapon['id'] ?></span>
                                </td>
                                
                                <!-- ФОТО из img_path -->
                                <td class="text-center">
                                    <?php 
                                    // Проверяем, есть ли изображение в базе данных (столбец img_path)
                                    if (!empty($weapon['img_path']) && $weapon['img_path'] != 'no_img.png'): 
                                        // Формируем путь к изображению из базы данных
                                        // Важно: в вашей БД уже есть значения в img_path, например: 'baikal_mr27m.jpeg'
                                        $imagePath = 'inc/catalog_images/' . $weapon['img_path'];
                                        
                                        // Проверяем, существует ли файл
                                        if (file_exists($imagePath)): 
                                    ?>
                                    <!-- Кнопка для открытия модального окна с изображением -->
                                    <button type="button" class="btn btn-link p-0 border-0" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#imageModal<?= $weapon['id'] ?>">
                                        <!-- Отображаем изображение из базы данных (img_path) -->
                                        <img src="<?= $imagePath ?>" 
                                             alt="<?= htmlspecialchars($weapon['name']) ?>" 
                                             class="rounded img-thumbnail"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    </button>
                                    
                                    <!-- Bootstrap Modal для просмотра изображения -->
                                    <div class="modal fade" id="imageModal<?= $weapon['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?= htmlspecialchars($weapon['name']) ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center p-0">
                                                    <!-- Большое изображение из базы данных -->
                                                    <img src="<?= $imagePath ?>" 
                                                         alt="<?= htmlspecialchars($weapon['name']) ?>" 
                                                         class="img-fluid rounded">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Закрыть
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <!-- Если файл не найден на сервере -->
                                    <div class="d-flex flex-column align-items-center justify-content-center bg-light rounded border" 
                                         style="width: 80px; height: 80px;">
                                        <div class="text-warning">Файл не найден</div>
                                        <small class="mt-1 text-muted"><?= $weapon['img_path'] ?></small>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <!-- Если в базе данных нет изображения (img_path пустое или 'no_img.png') -->
                                    <div class="d-flex flex-column align-items-center justify-content-center bg-light rounded border" 
                                         style="width: 80px; height: 80px;">
                                        <div class="text-secondary">Нет фото</div>
                                        <small class="mt-1 text-muted">
                                            <?= $weapon['img_path'] == 'no_img.png' ? 'Стандартное' : 'Не указано' ?>
                                        </small>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                
                                <!-- Название -->
                                <td>
                                    <div class="fw-bold"><?= htmlspecialchars($weapon['name']) ?></div>
                                    <?php if (strpos($weapon['name'], '<') !== false): ?>
                                    <div class="text-muted small">
                                        <span class="badge bg-info">HTML: <?= htmlspecialchars($weapon['name']) ?></span>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                
                                <!-- Бренд -->
                                <td>
                                    <span class="badge bg-primary"><?= htmlspecialchars($weapon['brand_name']) ?></span>
                                </td>
                                
                                <!-- Описание -->
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">
                                        <?= htmlspecialchars($weapon['description']) ?>
                                    </div>
                                    <?php if (strpos($weapon['description'], '<') !== false): ?>
                                    <div class="text-muted small mt-1">
                                        <span class="badge bg-warning text-dark">Содержит HTML</span>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                
                                <!-- Цена -->
                                <td class="text-end">
                                    <span class="fw-bold text-success">
                                        <?= number_format($weapon['cost'], 0, '', ' ') ?> ₽
                                    </span>
                                </td>
                                
                                <!-- Действия -->
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="edit.php?id=<?= $weapon['id'] ?>" 
                                           class="btn btn-outline-warning">
                                            Редактировать
                                        </a>
                                        <a href="delete.php?id=<?= $weapon['id'] ?>" 
                                           class="btn btn-outline-danger"
                                           onclick="return confirm('Удалить оружие <?= htmlspecialchars(addslashes($weapon['name'])) ?>?')">
                                            Удалить
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- Если нет записей -->
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <div class="text-muted mb-4" style="font-size: 4rem;">∅</div>
                <h4 class="text-muted mt-4 mb-3">Каталог оружия пуст</h4>
                <p class="text-muted mb-4">Добавьте первое оружие, нажав кнопку ниже</p>
                <a href="create.php" class="btn btn-primary btn-lg">
                    Добавить первое оружие
                </a>
            </div>
        </div>
        <?php endif; ?>
        
    </div>


     <!-- ====== ФУТЕР ====== -->
    <footer class="bg-dark text-light mt-5">
    <!-- Верхний блок подписки с фоном -->
    <div class="text-light"
        style="background: url('inc/images/amo.jpg') center center / cover no-repeat; height: 150px;">
    <div class="container h-100 d-flex align-items-center">
        <div class="row w-100 align-items-center">
        <!-- Левая часть — текст -->
        <div class="col-md-6 text-start mb-3 mb-md-0">
            <h5 class="fw-bold mb-1">Будьте всегда в курсе!</h5>
            <p class="text-light opacity-75 mb-0 small">Подпишитесь на наши новости и узнавайте о новинках и специальных предложениях первыми</p>
        </div>
        <!-- Правая часть — форма -->
        <div class="col-md-6 text-md-end">
            <div class="d-inline-block text-start">
            <div class="input-group input-group-sm mb-2" style="max-width: 350px;">
                <input type="email" class="form-control" placeholder="Ваш e-mail">
                <button class="btn btn-danger" type="button">Подписаться</button>
            </div>
            <div class="form-check small text-light opacity-75">
                <input class="form-check-input me-2" type="checkbox" id="consent">
                <label class="form-check-label" for="consent">
                Я согласен на обработку <a href="#" class="text-danger text-decoration-none">персональных данных</a>
                </label>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Основные колонки -->
    <div class="container border-top border-dark pt-5 pb-4">
        <div class="row text-start">
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">Каталог</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">Охота и спортивная стрельба</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Рыбалка</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Туризм</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Одежда</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Обувь</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Подводная охота</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Лодки и моторы</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Прочее</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Электроника</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">О компании</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">О компании</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Вакансии</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Поставщикам</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Гидам</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Партнерам</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Коммерческая недвижимость</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Новости</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Контакты</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Мобильное приложение</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Бренды</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">Помощь</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">Как купить</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Оплата</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Доставка</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Лицензионный товар</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Крупногабаритный товар</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Возврат и гарантия</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Защита персональных данных</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Отзывы и предложения</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Вопросы и ответы</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Оферта</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">Наш сервис</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">Подарочные карты</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Товар под заказ</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Стрелковый тир</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Товары в кредит</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Продажа б/у оружия</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Купить оптом</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Бонусная система</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">Личный кабинет</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">Настройки профиля</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Корзина</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">История заказов</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Избранное</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-2 mb-4">
            <h6 class="fw-bold text-secondary">Магазины</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="text-decoration-none text-secondary">Армавир</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Волгоград</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Казань</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Краснодар</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Кропоткин</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Крымск</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Лабинск</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Нижний Новгород</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Новороссийск</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Ростов-на-Дону</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Самара</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Санкт-Петербург</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Сочи</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Тихорецк</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Туапсе</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Уфа</a></li>
            <li><a href="#" class="text-decoration-none text-secondary">Челябинск</a></li>
            </ul>
        </div>
        </div>
        <!-- ====== Блок с мобильными устройствами, соцсетями и оплатой ====== -->
        <div class="row text-center text-md-start align-items-start mt-4 gy-4">
        <!-- Левая часть: Мобильные устройства -->
        <div class="col-md-4">
            <h6 class="fw-bold mb-2">Мобильные устройства</h6>
            <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start bg-dark">
                <img src="inc/images/ico-appstore.svg" alt="App Store" style="max-height: 35px;">
                <img src="inc/images/ico-google-play.svg" alt="Google Play" style="max-height: 35px;">
                <img src="inc/images/ico-app-gallery.svg" alt="App Gallery" style="max-height: 35px;">
            </div>
        </div>
        <!-- Средняя часть: Мы в соцсетях -->
        <div class="col-md-5">
            <h6 class="fw-bold mb-3">Мы в соцсетях</h6>
            <!-- Верхний ряд -->
            <div class="d-flex flex-wrap align-items-center gap-3 justify-content-center justify-content-md-start mb-2">
            <div class="d-flex align-items-center gap-1">
                <img src="inc/images/ico-vk.svg" alt="VK Рыбалка" style="height: 20px;">
                <span class="small">Рыбалка</span>
            </div>
            <div class="d-flex align-items-center gap-1">
                <img src="inc/images/ico-vk.svg" alt="VK Охота" style="height: 20px;">
                <span class="small">Охота</span>
            </div>
            <div class="d-flex align-items-center gap-1">
                <img src="inc/images/ico-youtube.svg" alt="YouTube" style="height: 20px;">
                <span class="small">YouTube</span>
            </div>
            </div>
            <!-- Нижний ряд -->
            <div class="d-flex flex-wrap align-items-center gap-3 justify-content-center justify-content-md-start">
            <div class="d-flex align-items-center gap-1">
                <img src="inc/images/ico-tg.svg" alt="Telegram" style="height: 20px;">
                <span class="small">Telegram</span>
            </div>
            <div class="d-flex align-items-center gap-1">
                <img src="inc/images/ico-rutube.svg" alt="Rutube" style="height: 20px;">
                <span class="small">Rutube</span>
            </div>
            </div>
        </div>
        <div class="col-md-3 text-md-end">
            <h6 class="fw-bold mb-2">Принимаем к оплате</h6>
            <div class="d-flex justify-content-center justify-content-md-end align-items-center gap-2">
            <img src="inc/images/mastercard.svg" alt="Mastercard" style="height: 25px;">
            <img src="inc/images/visa.svg" alt="Visa" style="height: 25px;">
            <img src="inc/images/mir.svg" alt="МИР" style="height: 25px;">
            </div>
        </div>
        </div>
    <p class="text-center small text-secondary mt-4">© Интернет-магазин снаряжения для охоты и активного отдыха «Мир охоты», 2005-2025</p>
    </footer>
    
    <!-- Bootstrap JS Bundle -->
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Автоматическое скрытие алертов
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>