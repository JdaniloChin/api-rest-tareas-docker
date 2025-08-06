<!-- Use this file to provide workspace-specific custom instructions to Copilot. For more details, visit https://code.visualstudio.com/docs/copilot/copilot-customization#_use-a-githubcopilotinstructionsmd-file -->

# Instrucciones para Copilot - API REST de Tareas

## Contexto del Proyecto
Este es un proyecto educativo para enseñar a estudiantes de la Universidad Fidélitas sobre:
- Desarrollo de APIs REST con PHP
- Containerización con Docker y Docker Compose
- Conexión entre PHP y MySQL
- Principios de diseño de APIs

## Estructura del Proyecto
```
sitio_docker/
├── docker-compose.yml          # Configuración de contenedores
├── Dockerfile                  # Imagen personalizada de PHP
├── database/
│   └── init.sql               # Scripts de inicialización de BD
└── src/
    ├── index.php              # Página principal
    ├── .htaccess              # Configuración de rutas
    ├── api/
    │   └── index.php          # Controlador principal del API
    ├── config/
    │   └── database.php       # Configuración de conexión BD
    ├── models/
    │   └── Tarea.php          # Modelo de datos para tareas
    └── docs/
        └── index.html         # Documentación del API
```

## Características del API
- **Base URL:** `http://localhost:8080/api/`
- **Formato:** JSON
- **Métodos soportados:** GET, POST, PUT, DELETE
- **Base de datos:** MySQL con tablas `usuarios` y `tareas`
- **CORS:** Habilitado para desarrollo

## Endpoints Principales
- `GET /api/` - Obtener todas las tareas
- `GET /api/{id}` - Obtener tarea por ID
- `GET /api/?estado={estado}` - Filtrar por estado
- `GET /api/?usuario={id}` - Filtrar por usuario
- `POST /api/` - Crear nueva tarea
- `PUT /api/{id}` - Actualizar tarea
- `DELETE /api/{id}` - Eliminar tarea

## Guías de Codificación
1. **PHP**: Usar PSR-4 para autoloading, PDO para base de datos
2. **Seguridad**: Sanitizar inputs, usar prepared statements
3. **Respuestas**: Formato JSON consistente con códigos HTTP apropiados
4. **Documentación**: Comentarios claros para propósitos educativos
5. **Docker**: Mantener configuración simple para fácil comprensión

## Estados Válidos para Tareas
- `pendiente` - Tarea sin iniciar
- `en_proceso` - Tarea en desarrollo  
- `completada` - Tarea finalizada
- `cancelada` - Tarea cancelada

## Servicios Docker
- **web**: PHP 8.2 con Apache (puerto 8080)
- **db**: MySQL 8.0 (puerto 3306)
- **phpmyadmin**: Interface web para BD (puerto 8081)

## Objetivo Pedagógico
El código debe ser claro y bien documentado para que los estudiantes puedan:
- Entender los principios REST
- Aprender sobre containerización
- Practicar con APIs reales
- Comprender la separación de responsabilidades
