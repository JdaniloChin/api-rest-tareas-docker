<?php
/**
 * Página principal del API de Tareas
 * Redirige a la documentación
 */

// Verificar si es una petición al API
$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '/api/') !== false) {
    // Si es una petición al API, incluir el archivo del API
    require_once 'api/index.php';
    exit();
}

// Si no es una petición al API, mostrar la documentación
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API REST de Tareas</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 500px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #2980b9;
        }
        .btn-success {
            background: #27ae60;
        }
        .btn-success:hover {
            background: #229954;
        }
        .status {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .status-item {
            margin: 5px 0;
        }
        .online {
            color: #27ae60;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 API REST de Tareas</h1>
        <p class="subtitle">Proyecto Educativo - Universidad Fidélitas</p>
        
        <div class="status">
            <h3>Estado del Sistema</h3>
            <div class="status-item">
                <span class="online">✅ API REST:</span> http://localhost:8080/api/
            </div>
            <div class="status-item">
                <span class="online">✅ phpMyAdmin:</span> http://localhost:8081/
            </div>
            <div class="status-item">
                <span class="online">✅ Base de Datos:</span> MySQL 8.0
            </div>
        </div>
        
        <a href="docs/" class="btn">📖 Ver Documentación</a>
        <a href="http://localhost:8081" class="btn btn-success" target="_blank">🗄️ phpMyAdmin</a>
        
        <div style="margin-top: 30px; font-size: 14px; color: #666;">
            <p><strong>Rutas de prueba rápida:</strong></p>
            <p><a href="api/" target="_blank">GET /api/</a> - Ver todas las tareas</p>
        </div>
    </div>
</body>
</html>
