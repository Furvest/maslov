@echo off
chcp 65001 >nul
cd /d "%~dp0"

where php >nul 2>nul
if %errorlevel%==0 (
    echo Запускаю PHP-сервер: http://localhost:8000
    start "" "http://localhost:8000"
    php -S localhost:8000 -t "%~dp0"
) else (
    echo PHP не найден. Открываю статическую версию preview.html.
    echo Чтобы работал PHP-вариант, установите PHP 8+ или XAMPP.
    start "" "%~dp0preview.html"
)
