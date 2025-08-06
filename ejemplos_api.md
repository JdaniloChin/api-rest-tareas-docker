# Ejemplos de Pruebas del API REST de Tareas

## Usando cURL

### 1. Obtener todas las tareas
```bash
curl -X GET http://localhost:8080/api/
```

### 2. Obtener tarea por ID
```bash
curl -X GET http://localhost:8080/api/1
```

### 3. Filtrar tareas por estado
```bash
curl -X GET "http://localhost:8080/api/?estado=pendiente"
```

### 4. Filtrar tareas por usuario
```bash
curl -X GET "http://localhost:8080/api/?usuario=1"
```

### 5. Crear nueva tarea
```bash
curl -X POST http://localhost:8080/api/ \
  -H "Content-Type: application/json" \
  -d '{
    "id_usuario": 1,
    "estado": "pendiente",
    "titulo": "Aprender Docker",
    "descripcion": "Completar el tutorial de containerización"
  }'
```

### 6. Actualizar tarea
```bash
curl -X PUT http://localhost:8080/api/1 \
  -H "Content-Type: application/json" \
  -d '{
    "estado": "completada",
    "titulo": "Tarea actualizada"
  }'
```

### 7. Eliminar tarea
```bash
curl -X DELETE http://localhost:8080/api/1
```

## Usando PowerShell (Windows)

### 1. Obtener todas las tareas
```powershell
Invoke-RestMethod -Uri "http://localhost:8080/api/" -Method GET
```

### 2. Crear nueva tarea
```powershell
$body = @{
    id_usuario = 1
    estado = "pendiente"
    titulo = "Tarea desde PowerShell"
    descripcion = "Probando el API con PowerShell"
} | ConvertTo-Json

Invoke-RestMethod -Uri "http://localhost:8080/api/" -Method POST -Body $body -ContentType "application/json"
```

### 3. Actualizar tarea
```powershell
$body = @{
    estado = "en_proceso"
} | ConvertTo-Json

Invoke-RestMethod -Uri "http://localhost:8080/api/1" -Method PUT -Body $body -ContentType "application/json"
```

## Usando JavaScript (Frontend)

### 1. Obtener todas las tareas
```javascript
fetch('http://localhost:8080/api/')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
```

### 2. Crear nueva tarea
```javascript
const nuevaTarea = {
    id_usuario: 1,
    estado: 'pendiente',
    titulo: 'Tarea desde JavaScript',
    descripcion: 'Probando el API con fetch'
};

fetch('http://localhost:8080/api/', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(nuevaTarea)
})
.then(response => response.json())
.then(data => console.log('Tarea creada:', data))
.catch(error => console.error('Error:', error));
```

### 3. Actualizar tarea
```javascript
const actualizacion = {
    estado: 'completada'
};

fetch('http://localhost:8080/api/1', {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(actualizacion)
})
.then(response => response.json())
.then(data => console.log('Tarea actualizada:', data))
.catch(error => console.error('Error:', error));
```

## Usando Python

### 1. Obtener todas las tareas
```python
import requests

response = requests.get('http://localhost:8080/api/')
print(response.json())
```

### 2. Crear nueva tarea
```python
import requests

nueva_tarea = {
    'id_usuario': 1,
    'estado': 'pendiente',
    'titulo': 'Tarea desde Python',
    'descripcion': 'Probando el API con requests'
}

response = requests.post('http://localhost:8080/api/', json=nueva_tarea)
print(response.json())
```

### 3. Actualizar tarea
```python
import requests

actualizacion = {
    'estado': 'completada'
}

response = requests.put('http://localhost:8080/api/1', json=actualizacion)
print(response.json())
```

## Respuestas Esperadas

### Éxito (200/201)
```json
{
  "datos": {
    "id_tarea": 1,
    "id_usuario": 1,
    "estado": "pendiente",
    "titulo": "Completar proyecto final",
    "descripcion": "Terminar el desarrollo del API REST",
    "nombre_usuario": "Juan Pérez",
    "email": "juan@example.com",
    "fecha_creacion": "2025-01-15 10:30:00",
    "fecha_actualizacion": "2025-01-15 10:30:00"
  },
  "total": 1,
  "mensaje": "Tarea obtenida exitosamente",
  "timestamp": "2025-01-15 14:30:00"
}
```

### Error (400/404/500)
```json
{
  "mensaje": "Tarea no encontrada",
  "timestamp": "2025-01-15 14:30:00"
}
```

### Error de validación (400)
```json
{
  "datos": [
    "El título es requerido",
    "Estado inválido. Valores permitidos: pendiente, en_proceso, completada, cancelada"
  ],
  "mensaje": "Errores de validación",
  "timestamp": "2025-01-15 14:30:00"
}
```

## Códigos de Estado HTTP

- **200 OK** - Petición exitosa
- **201 Created** - Recurso creado exitosamente
- **400 Bad Request** - Error en los datos enviados
- **404 Not Found** - Recurso no encontrado
- **405 Method Not Allowed** - Método HTTP no permitido
- **500 Internal Server Error** - Error interno del servidor

## Estados Válidos para Tareas

- `pendiente` - Tarea sin iniciar
- `en_proceso` - Tarea en desarrollo
- `completada` - Tarea finalizada
- `cancelada` - Tarea cancelada
