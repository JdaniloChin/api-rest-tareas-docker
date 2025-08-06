# 🚀 API REST de Tareas - Proyecto Educativo

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Docker](https://img.shields.io/badge/Docker-20.10+-2496ED?style=flat&logo=docker&logoColor=white)](https://www.docker.com/)

Un API REST completo para gestión de tareas, desarrollado con fines educativos para enseñar a estudiantes de la Universidad Fidélitas los conceptos fundamentales de:

- ✅ **APIs REST** con PHP
- ✅ **Containerización** con Docker
- ✅ **Base de datos** MySQL
- ✅ **Arquitectura cliente-servidor**

## 📋 Tabla de Contenidos

- [Características](#-características)
- [Instalación](#-instalación)
- [Uso](#-uso)
- [Endpoints del API](#-endpoints-del-api)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Docker](#-docker)
- [Para Estudiantes](#-para-estudiantes)
- [Troubleshooting](#-troubleshooting)

## ✨ Características

- **API REST completo** con operaciones CRUD
- **Containerización** con Docker Compose
- **Base de datos MySQL** con datos de ejemplo
- **Documentación interactiva** incluida
- **phpMyAdmin** para administración de BD
- **CORS habilitado** para desarrollo frontend
- **Validación de datos** y manejo de errores
- **Código educativo** bien documentado

## 🚀 Instalación

### Prerrequisitos

- [Docker](https://www.docker.com/get-started) instalado
- [Docker Compose](https://docs.docker.com/compose/install/) instalado
- Puerto 8080, 8081 y 3306 disponibles

### Pasos de Instalación

1. **Clonar o descargar el proyecto**
   ```bash
   # Si tienes git instalado
   git clone <repository-url>
   cd sitio_docker
   ```

2. **Construir y ejecutar los contenedores**
   ```bash
   docker-compose up -d
   ```

3. **Verificar que los servicios estén ejecutándose**
   ```bash
   docker-compose ps
   ```

4. **Acceder a la aplicación**
   - **API:** http://localhost:8080/api/
   - **Documentación:** http://localhost:8080/
   - **phpMyAdmin:** http://localhost:8081/

## 💻 Uso

### Acceso Rápido

| Servicio | URL | Credenciales |
|----------|-----|--------------|
| API REST | http://localhost:8080/api/ | - |
| Documentación | http://localhost:8080/ | - |
| phpMyAdmin | http://localhost:8081/ | user: `root`, pass: `rootpassword` |

### Comandos Docker Útiles

```bash
# Iniciar servicios
docker-compose up -d

# Ver logs
docker-compose logs

# Parar servicios
docker-compose down

# Reconstruir contenedores
docker-compose up -d --build

# Ver contenedores activos
docker-compose ps
```

## 🔌 Endpoints del API

### Base URL: `http://localhost:8080/api/`

| Método | Endpoint | Descripción | Ejemplo |
|--------|----------|-------------|---------|
| `GET` | `/` | Obtener todas las tareas | `GET /api/` |
| `GET` | `/{id}` | Obtener tarea por ID | `GET /api/1` |
| `GET` | `/?estado={estado}` | Filtrar por estado | `GET /api/?estado=pendiente` |
| `GET` | `/?usuario={id}` | Filtrar por usuario | `GET /api/?usuario=1` |
| `POST` | `/` | Crear nueva tarea | `POST /api/` |
| `PUT` | `/{id}` | Actualizar tarea | `PUT /api/1` |
| `DELETE` | `/{id}` | Eliminar tarea | `DELETE /api/1` |

### Ejemplos de Uso

#### Obtener todas las tareas
```bash
curl -X GET http://localhost:8080/api/
```

#### Crear una nueva tarea
```bash
curl -X POST http://localhost:8080/api/ \
  -H "Content-Type: application/json" \
  -d '{
    "id_usuario": 1,
    "estado": "pendiente",
    "titulo": "Nueva tarea",
    "descripcion": "Descripción de la tarea"
  }'
```

#### Actualizar una tarea
```bash
curl -X PUT http://localhost:8080/api/1 \
  -H "Content-Type: application/json" \
  -d '{
    "estado": "completada"
  }'
```

### Estados Válidos
- `pendiente` - Tarea sin iniciar
- `en_proceso` - Tarea en desarrollo
- `completada` - Tarea finalizada
- `cancelada` - Tarea cancelada

## 📁 Estructura del Proyecto

```
sitio_docker/
├── 📄 docker-compose.yml          # Configuración de servicios
├── 📄 Dockerfile                  # Imagen personalizada PHP
├── 📄 README.md                   # Este archivo
├── 📁 .github/
│   └── 📄 copilot-instructions.md # Instrucciones para Copilot
├── 📁 database/
│   └── 📄 init.sql               # Scripts de inicialización
└── 📁 src/                       # Código fuente de la aplicación
    ├── 📄 index.php              # Página principal
    ├── 📄 .htaccess              # Configuración Apache
    ├── 📁 api/
    │   └── 📄 index.php          # Controlador principal del API
    ├── 📁 config/
    │   └── 📄 database.php       # Configuración de conexión BD
    ├── 📁 models/
    │   └── 📄 Tarea.php          # Modelo de datos
    └── 📁 docs/
        └── 📄 index.html         # Documentación interactiva
```

## 🐳 Docker

### Servicios Configurados

| Servicio | Imagen | Puerto | Descripción |
|----------|--------|--------|-------------|
| `web` | Custom PHP 8.2 | 8080 | Servidor web con Apache |
| `db` | MySQL 8.0 | 3306 | Base de datos |
| `phpmyadmin` | phpMyAdmin | 8081 | Interface web para BD |

### Variables de Entorno

```yaml
# Base de datos
DB_HOST=db
DB_NAME=tareas_db
DB_USER=root
DB_PASS=rootpassword

# MySQL
MYSQL_ROOT_PASSWORD=rootpassword
MYSQL_DATABASE=tareas_db
MYSQL_USER=api_user
MYSQL_PASSWORD=api_password
```

## 🎓 Para Estudiantes

### Conceptos que Aprenderás

1. **APIs REST**
   - Principios REST
   - Métodos HTTP (GET, POST, PUT, DELETE)
   - Códigos de estado HTTP
   - Formato JSON

2. **Backend con PHP**
   - Programación orientada a objetos
   - PDO para base de datos
   - Manejo de errores
   - Validación de datos

3. **Base de Datos**
   - Diseño de tablas
   - Relaciones (claves foráneas)
   - Consultas SQL
   - phpMyAdmin

4. **Docker**
   - Contenedores vs máquinas virtuales
   - Docker Compose
   - Volúmenes y redes
   - Variables de entorno

### Ejercicios Sugeridos

1. **Básico:** Probar todos los endpoints con cURL o Postman
2. **Intermedio:** Agregar validaciones adicionales al modelo
3. **Avanzado:** Crear endpoints para la tabla `usuarios`
4. **Proyecto:** Desarrollar un frontend que consuma el API

### Herramientas Recomendadas

- **[Postman](https://www.postman.com/)** - Para probar APIs
- **[VS Code](https://code.visualstudio.com/)** - Editor de código
- **[Thunder Client](https://marketplace.visualstudio.com/items?itemName=rangav.vscode-thunder-client)** - Extensión de VS Code para APIs

## 🔧 Troubleshooting

### Problemas Comunes

#### Puerto en uso
```bash
# Verificar qué proceso usa el puerto
netstat -ano | findstr :8080

# En Linux/Mac
lsof -i :8080
```

#### Contenedores no inician
```bash
# Ver logs detallados
docker-compose logs web
docker-compose logs db

# Reconstruir contenedores
docker-compose down
docker-compose up -d --build
```

#### Base de datos no conecta
```bash
# Verificar que MySQL esté ejecutándose
docker-compose ps

# Ver logs de MySQL
docker-compose logs db

# Reiniciar solo la base de datos
docker-compose restart db
```

#### Permisos de archivos (Linux/Mac)
```bash
# Dar permisos de escritura
sudo chmod -R 755 src/
sudo chown -R $USER:$USER src/
```

### Comandos de Diagnóstico

```bash
# Estado de contenedores
docker-compose ps

# Logs en tiempo real
docker-compose logs -f

# Entrar a un contenedor
docker-compose exec web bash
docker-compose exec db mysql -u root -p

# Reiniciar servicios
docker-compose restart

# Limpiar todo y empezar de nuevo
docker-compose down -v
docker-compose up -d --build
```

## 📚 Recursos Adicionales

- [Documentación Docker](https://docs.docker.com/)
- [PHP Manual](https://www.php.net/manual/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [REST API Design Guide](https://restfulapi.net/)

## 📝 Notas para Profesores

Este proyecto está diseñado para ser:
- ✅ **Fácil de configurar** - Un solo comando para ejecutar
- ✅ **Educativo** - Código bien documentado y estructurado
- ✅ **Completo** - Incluye ejemplos y documentación
- ✅ **Escalable** - Base sólida para proyectos más complejos

---

## 📄 Licencia

Este proyecto es de uso educativo para la Universidad Fidélitas.

**SC-502 Ambiente WebCliente Servidor - II Cuatrimestre 2025**
