<?php
session_start();
require_once 'models/WeaponTable.php';

$weaponTable = new WeaponTable();
$brands = $weaponTable->getBrands();

$oldData = $_SESSION['old_form_data'] ?? [
    'name' => '',
    'id_brand' => '',
    'description' => '',
    'cost' => ''
];

$validationErrors = $_SESSION['validation_errors'] ?? [];
$showErrorModal = !empty($validationErrors);

unset($_SESSION['old_form_data'], $_SESSION['validation_errors']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить оружие</title>
    <<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Карточка с формой -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4">
                        <div class="d-flex align-items-center">
                            <a href="index.php" class="btn btn-outline-secondary btn-sm me-3">
                                ← Назад
                            </a>
                            <h1 class="h3 mb-0">Добавить новое оружие</h1>
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Форма -->
                        <form action="process_create.php" method="POST" id="addWeaponForm" enctype="multipart/form-data" novalidate>
                            
                            <!-- Название -->
                            <div class="mb-4">
                                <label for="weaponName" class="form-label fw-bold">
                                    Название оружия
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg <?= isset($validationErrors['name']) ? 'is-invalid' : '' ?>" 
                                       id="weaponName" 
                                       name="name"
                                       value="<?= htmlspecialchars($oldData['name']) ?>"
                                       placeholder="Введите название оружия"
                                       required>
                                <?php if (isset($validationErrors['name'])): ?>
                                <div class="invalid-feedback">
                                    <?= $validationErrors['name'] ?>
                                </div>
                                <?php endif; ?>
                                <div class="form-text">
                                    Название должно быть уникальным и информативным
                                </div>
                            </div>
                            
                            <!-- Бренд -->
                            <div class="mb-4">
                                <label for="weaponBrand" class="form-label fw-bold">
                                    Бренд
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg <?= isset($validationErrors['id_brand']) ? 'is-invalid' : '' ?>" 
                                        id="weaponBrand" 
                                        name="id_brand"
                                        required>
                                    <option value="">-- Выберите бренд --</option>
                                    <?php foreach ($brands as $brand): ?>
                                    <option value="<?= $brand['id'] ?>"
                                        <?= $oldData['id_brand'] == $brand['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($brand['name']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($validationErrors['id_brand'])): ?>
                                <div class="invalid-feedback">
                                    <?= $validationErrors['id_brand'] ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Описание -->
                            <div class="mb-4">
                                <label for="weaponDescription" class="form-label fw-bold">
                                    Описание
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control <?= isset($validationErrors['description']) ? 'is-invalid' : '' ?>" 
                                          id="weaponDescription" 
                                          name="description"
                                          rows="4"
                                          placeholder="Опишите особенности оружия"
                                          required><?= htmlspecialchars($oldData['description']) ?></textarea>
                                <?php if (isset($validationErrors['description'])): ?>
                                <div class="invalid-feedback">
                                    <?= $validationErrors['description'] ?>
                                </div>
                                <?php endif; ?>
                                <div class="form-text">
                                    Максимальная длина: 255 символов
                                </div>
                            </div>
                            
                            <!-- Цена -->
                            <div class="mb-4">
                                <label for="weaponPrice" class="form-label fw-bold">
                                    Цена (руб.)
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="number" 
                                           class="form-control form-control-lg <?= isset($validationErrors['cost']) ? 'is-invalid' : '' ?>" 
                                           id="weaponPrice" 
                                           name="cost"
                                           min="0"
                                           step="1"
                                           value="<?= htmlspecialchars($oldData['cost']) ?>"
                                           placeholder="0"
                                           required>
                                    <span class="input-group-text">₽</span>
                                    <?php if (isset($validationErrors['cost'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $validationErrors['cost'] ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-text">
                                    Цена должна быть целым положительным числом
                                </div>
                            </div>
                            
                            <!-- Фото -->
                            <div class="mb-4">
                                <label for="weaponImage" class="form-label fw-bold">
                                    Фото оружия
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" 
                                       class="form-control <?= isset($validationErrors['img_path']) ? 'is-invalid' : '' ?>" 
                                       id="weaponImage" 
                                       name="image"
                                       accept="image/*"
                                       required>
                                <?php if (isset($validationErrors['img_path'])): ?>
                                <div class="invalid-feedback">
                                    <?= $validationErrors['img_path'] ?>
                                </div>
                                <?php endif; ?>
                                <div class="form-text">
                                    Поддерживаемые форматы: JPG, PNG, GIF, WebP. Максимальный размер: 5MB
                                </div>
                                
                                <!-- Превью изображения -->
                                <div class="mt-3 text-center" id="imagePreviewContainer" style="display: none;">
                                    <p class="text-muted mb-2">Предпросмотр:</p>
                                    <img id="imagePreview" src="#" alt="Предпросмотр" class="img-thumbnail" style="max-width: 300px;">
                                </div>
                            </div>
                            
                            <!-- Кнопки -->
                            <div class="d-flex justify-content-between pt-3 border-top">
                                <a href="index.php" class="btn btn-outline-secondary btn-lg px-4">
                                    Отмена
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    Добавить оружие
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
                
                <!-- Информационная карточка -->
                <div class="card border-0 bg-info bg-opacity-10 mt-4">
                    <div class="card-body">
                        <div>
                            <h6 class="mb-1">Поля, отмеченные <span class="text-danger">*</span>, обязательны для заполнения</h6>
                            <p class="mb-0 text-muted small">Все данные проходят проверку перед сохранением в базу данных</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- ========== Bootstrap Modal для ошибок ========== -->
    <?php if ($showErrorModal): ?>
    <div class="modal fade show" id="errorModal" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                
                <!-- Заголовок модального окна -->
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title mb-0">Обнаружены ошибки в форме</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <!-- Тело модального окна -->
                <div class="modal-body">
                    <p class="mb-3">Пожалуйста, исправьте следующие ошибки:</p>
                    
                    <!-- Список ошибок -->
                    <div class="list-group">
                        <?php foreach ($validationErrors as $error): ?>
                        <div class="list-group-item list-group-item-danger border-0 rounded mb-2">
                            <div class="d-flex align-items-start">
                                <div class="text-danger me-3" style="font-weight: bold;">✗</div>
                                <div>
                                    <h6 class="mb-1">Ошибка</h6>
                                    <p class="mb-0"><?= htmlspecialchars($error) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="alert alert-warning mt-4">
                        <div class="d-flex">
                            <div class="text-warning me-3" style="font-weight: bold;">!</div>
                            <div>
                                <p class="mb-0"><strong>Совет:</strong> После закрытия этого окна проверьте поля формы, отмеченные красным</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Футер модального окна -->
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger btn-lg px-4" data-bs-dismiss="modal">
                        Закрыть и исправить ошибки
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Bootstrap JS Bundle -->
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script>
        // ========== ИНИЦИАЛИЗАЦИЯ МОДАЛЬНОГО ОКНА ==========
        <?php if ($showErrorModal): ?>
        document.addEventListener('DOMContentLoaded', function() {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                keyboard: false,
                backdrop: 'static'
            });
            errorModal.show();
            
            // Фокусируемся на первом поле с ошибкой после закрытия
            document.getElementById('errorModal').addEventListener('hidden.bs.modal', function() {
                var firstErrorField = document.querySelector('.is-invalid');
                if (firstErrorField) {
                    firstErrorField.focus();
                }
            });
        });
        <?php endif; ?>
        
        // ========== ПРЕВЬЮ ИЗОБРАЖЕНИЯ ==========
        document.getElementById('weaponImage').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var preview = document.getElementById('imagePreview');
            var container = document.getElementById('imagePreviewContainer');
            
            if (file) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            } else {
                container.style.display = 'none';
                preview.src = '#';
            }
        });
        
        // ========== КЛИЕНТСКАЯ ВАЛИДАЦИЯ ==========
        document.getElementById('addWeaponForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Очищаем предыдущие ошибки
            var invalidFields = document.querySelectorAll('.is-invalid');
            invalidFields.forEach(function(field) {
                field.classList.remove('is-invalid');
                var feedback = field.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            });
            
            var errors = [];
            
            // Проверка названия
            var nameField = document.getElementById('weaponName');
            var nameValue = nameField.value.trim();
            if (!nameValue) {
                errors.push('Поле "Название" пустое или состоит из одних пробелов');
                showFieldError(nameField, 'Заполните это поле');
            }
            
            // Проверка бренда
            var brandField = document.getElementById('weaponBrand');
            if (!brandField.value) {
                errors.push('Поле "Бренд" не выбрано');
                showFieldError(brandField, 'Выберите бренд из списка');
            }
            
            // Проверка описания
            var descField = document.getElementById('weaponDescription');
            var descValue = descField.value.trim();
            if (!descValue) {
                errors.push('Поле "Описание" пустое или состоит из одних пробелов');
                showFieldError(descField, 'Заполните это поле');
            }
            
            // Проверка цены
            var priceField = document.getElementById('weaponPrice');
            var priceValue = priceField.value.trim();
            if (!priceValue) {
                errors.push('Поле "Цена" пустое или состоит из одних пробелов');
                showFieldError(priceField, 'Заполните это поле');
            } else if (isNaN(priceValue) || !Number.isInteger(Number(priceValue))) {
                errors.push('Поле "Цена" должно содержать только целые числа');
                showFieldError(priceField, 'Введите целое число');
            } else if (parseInt(priceValue) < 0) {
                errors.push('Цена не может быть отрицательной');
                showFieldError(priceField, 'Введите положительное число');
            }
            
            // Проверка изображения
            var imageField = document.getElementById('weaponImage');
            if (imageField.files.length === 0) {
                errors.push('Вы не добавили фото');
                showFieldError(imageField, 'Выберите файл');
            } else {
                var file = imageField.files[0];
                if (file.size > 5 * 1024 * 1024) {
                    errors.push('Файл слишком большой. Максимальный размер: 5MB');
                    showFieldError(imageField, 'Файл слишком большой');
                }
                
                var allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    errors.push('Недопустимый тип файла. Разрешены только JPG, PNG, GIF, WebP');
                    showFieldError(imageField, 'Недопустимый формат');
                }
            }
            
            // Если есть ошибки - показываем модальное окно
            if (errors.length > 0) {
                showErrorModal(errors);
                return false;
            }
            
            // Если ошибок нет - отправляем форму
            this.submit();
        });
        
        // Функция для показа ошибки у поля
        function showFieldError(field, message) {
            field.classList.add('is-invalid');
            
            var feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            feedback.textContent = message;
            
            field.parentNode.appendChild(feedback);
            field.focus();
        }
        
        // Функция для показа модального окна с ошибками
        function showErrorModal(errors) {
            // Создаем HTML для списка ошибок
            var errorsHtml = '<div class="list-group">';
            errors.forEach(function(error) {
                errorsHtml += `
                <div class="list-group-item list-group-item-danger border-0 rounded mb-2">
                    <div class="d-flex align-items-start">
                        <div class="text-danger me-3" style="font-weight: bold;">✗</div>
                        <div>
                            <h6 class="mb-1">Ошибка</h6>
                            <p class="mb-0">${error}</p>
                        </div>
                    </div>
                </div>`;
            });
            errorsHtml += '</div>';
            
            // Создаем модальное окно динамически
            var modalHtml = `
            <div class="modal fade show" id="clientErrorModal" tabindex="-1" style="display: block; background-color: rgba(0,0,0,0.5);" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg">
                        <div class="modal-header bg-danger text-white border-0">
                            <h5 class="modal-title mb-0">Обнаружены ошибки в форме</h5>
                            <button type="button" class="btn-close btn-close-white" onclick="closeClientModal()"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-3">Пожалуйста, исправьте следующие ошибки:</p>
                            ${errorsHtml}
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger btn-lg px-4" onclick="closeClientModal()">
                                Закрыть и исправить ошибки
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
            
            // Добавляем модальное окно в body
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // Показываем модальное окно
            var clientModal = new bootstrap.Modal(document.getElementById('clientErrorModal'), {
                keyboard: false,
                backdrop: 'static'
            });
            clientModal.show();
        }
        
        // Функция для закрытия клиентского модального окна
        window.closeClientModal = function() {
            var modal = document.getElementById('clientErrorModal');
            if (modal) {
                var bsModal = bootstrap.Modal.getInstance(modal);
                bsModal.hide();
                setTimeout(function() {
                    modal.remove();
                }, 300);
            }
        };
        
        // Убираем ошибки при вводе
        document.querySelectorAll('input, select, textarea').forEach(function(field) {
            field.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                var feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            });
        });
        
    </script>
</body>
</html>