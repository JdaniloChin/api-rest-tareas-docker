@echo off
echo ========================================
echo   API REST de Tareas - Setup Script
echo   Universidad Fidelitas
echo ========================================
echo.

echo Verificando Docker...
docker --version >nul 2>&1
if errorlevel 1 (
    echo ERROR: Docker no esta instalado o no esta en el PATH
    echo Por favor instala Docker Desktop desde: https://www.docker.com/products/docker-desktop
    pause
    exit /b 1
)

echo Docker detectado correctamente
echo.

echo Verificando Docker Compose...
docker-compose --version >nul 2>&1
if errorlevel 1 (
    echo ERROR: Docker Compose no esta disponible
    echo Asegurate de que Docker Desktop este ejecutandose
    pause
    exit /b 1
)

echo Docker Compose detectado correctamente
echo.

echo Iniciando contenedores...
echo Esto puede tomar unos minutos la primera vez...
echo.

docker-compose up -d

if errorlevel 1 (
    echo.
    echo ERROR: No se pudieron iniciar los contenedores
    echo Posibles soluciones:
    echo 1. Asegurate de que Docker Desktop este ejecutandose
    echo 2. Verifica que los puertos 8080, 8081 y 3306 esten libres
    echo 3. Ejecuta: docker-compose down y luego docker-compose up -d
    pause
    exit /b 1
)

echo.
echo ========================================
echo   Instalacion completada exitosamente!
echo ========================================
echo.
echo Servicios disponibles:
echo.
echo  API REST:       http://localhost:8080/api/
echo  Documentacion:  http://localhost:8080/
echo  phpMyAdmin:     http://localhost:8081/
echo.
echo Credenciales phpMyAdmin:
echo  Usuario: root
echo  Password: rootpassword
echo.
echo Para detener los servicios ejecuta: docker-compose down
echo.
pause
