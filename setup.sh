#!/bin/bash

echo "========================================"
echo "  API REST de Tareas - Setup Script"
echo "  Universidad Fidélitas"
echo "========================================"
echo

# Verificar Docker
echo "Verificando Docker..."
if ! command -v docker &> /dev/null; then
    echo "ERROR: Docker no está instalado"
    echo "Por favor instala Docker desde: https://www.docker.com/get-started"
    exit 1
fi

echo "Docker detectado correctamente"
echo

# Verificar Docker Compose
echo "Verificando Docker Compose..."
if ! command -v docker-compose &> /dev/null; then
    echo "ERROR: Docker Compose no está disponible"
    echo "Por favor instala Docker Compose desde: https://docs.docker.com/compose/install/"
    exit 1
fi

echo "Docker Compose detectado correctamente"
echo

# Verificar que Docker esté ejecutándose
echo "Verificando estado de Docker..."
if ! docker info &> /dev/null; then
    echo "ERROR: Docker no está ejecutándose"
    echo "Por favor inicia Docker y vuelve a ejecutar este script"
    exit 1
fi

echo "Docker está ejecutándose correctamente"
echo

# Iniciar contenedores
echo "Iniciando contenedores..."
echo "Esto puede tomar unos minutos la primera vez..."
echo

if docker-compose up -d; then
    echo
    echo "========================================"
    echo "  Instalación completada exitosamente!"
    echo "========================================"
    echo
    echo "Servicios disponibles:"
    echo
    echo "  API REST:       http://localhost:8080/api/"
    echo "  Documentación:  http://localhost:8080/"
    echo "  phpMyAdmin:     http://localhost:8081/"
    echo
    echo "Credenciales phpMyAdmin:"
    echo "  Usuario: root"
    echo "  Password: rootpassword"
    echo
    echo "Para detener los servicios ejecuta: docker-compose down"
    echo
else
    echo
    echo "ERROR: No se pudieron iniciar los contenedores"
    echo "Posibles soluciones:"
    echo "1. Asegúrate de que Docker esté ejecutándose"
    echo "2. Verifica que los puertos 8080, 8081 y 3306 estén libres"
    echo "3. Ejecuta: docker-compose down && docker-compose up -d"
    exit 1
fi
