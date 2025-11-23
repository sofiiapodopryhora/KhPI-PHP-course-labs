<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №7 - Кешування</title>
    <link rel="stylesheet" href="client_cache/serve-css.php">
</head>
<body>
    <div class="container">
        <h1>Лабораторна робота №7: Робота з кешем</h1>

        <h2>1. Клієнтське кешування (HTTP Headers)</h2>
        <p>Ця сторінка завантажує CSS-файл <code>serve-css.php</code> з кешуючими заголовками. Відкрийте інструменти розробника (F12), перейдіть на вкладку "Network" і перезавантажте сторінку (Ctrl+R). Ви побачите, що файл <code>serve-css.php</code> завантажується з "disk cache" або має статус 304 Not Modified.</p>
        
        <hr>

        <h2>2. Серверне кешування у файл</h2>
        <p>Натисніть посилання нижче, щоб згенерувати звіт. Перший раз це займе 3 секунди. Наступні завантаження протягом 10 хвилин будуть миттєвими, оскільки звіт буде завантажено з файлового кешу на сервері.</p>
        <p><a href="server_cache/generate-report.php" target="_blank">Згенерувати звіт (кешування у файл)</a></p>
        
        <hr>

        <h2>3. Серверне кешування (статична властивість класу)</h2>
        <p>Дані нижче генеруються із затримкою в 2 секунди. При оновленні сторінки дані будуть братися з кешу (статичної властивості) протягом 1 хвилини без затримки.</p>
        <div id="static-cache-data">
            <?php include 'server_cache/static-class-cache.php'; ?>
        </div>
        <p><button onclick="location.reload()">Оновити сторінку</button></p>

    </div>
</body>
</html>
