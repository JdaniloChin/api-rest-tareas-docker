<?php
/**
 * Modelo para la tabla tareas
 * Contiene todas las operaciones CRUD para las tareas
 */

class Tarea {
    private $conn;
    private $table_name = "tareas";

    // Propiedades de la tarea
    public $id_tarea;
    public $id_usuario;
    public $estado;
    public $titulo;
    public $descripcion;
    public $fecha_creacion;
    public $fecha_actualizacion;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtener todas las tareas
     */
    public function obtenerTodas() {
        $query = "SELECT t.*, u.nombre as nombre_usuario, u.email 
                 FROM " . $this->table_name . " t 
                 LEFT JOIN usuarios u ON t.id_usuario = u.Id_usuario 
                 ORDER BY t.fecha_creacion DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    /**
     * Obtener una tarea por ID
     */
    public function obtenerPorId($id) {
        $query = "SELECT t.*, u.nombre as nombre_usuario, u.email 
                 FROM " . $this->table_name . " t 
                 LEFT JOIN usuarios u ON t.id_usuario = u.Id_usuario 
                 WHERE t.id_tarea = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    /**
     * Obtener tareas por usuario
     */
    public function obtenerPorUsuario($id_usuario) {
        $query = "SELECT t.*, u.nombre as nombre_usuario, u.email 
                 FROM " . $this->table_name . " t 
                 LEFT JOIN usuarios u ON t.id_usuario = u.Id_usuario 
                 WHERE t.id_usuario = :id_usuario 
                 ORDER BY t.fecha_creacion DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    /**
     * Obtener tareas por estado
     */
    public function obtenerPorEstado($estado) {
        $query = "SELECT t.*, u.nombre as nombre_usuario, u.email 
                 FROM " . $this->table_name . " t 
                 LEFT JOIN usuarios u ON t.id_usuario = u.Id_usuario 
                 WHERE t.estado = :estado 
                 ORDER BY t.fecha_creacion DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":estado", $estado);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    /**
     * Crear una nueva tarea
     */
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " 
                 (id_usuario, estado, titulo, descripcion) 
                 VALUES (:id_usuario, :estado, :titulo, :descripcion)";
        
        $stmt = $this->conn->prepare($query);
        
        // Limpiar datos
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        
        // Vincular valores
        $stmt->bindParam(":id_usuario", $this->id_usuario);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        
        if($stmt->execute()) {
            $this->id_tarea = $this->conn->lastInsertId();
            return true;
        }
        
        return false;
    }

    /**
     * Actualizar una tarea
     */
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                 SET id_usuario = :id_usuario, 
                     estado = :estado, 
                     titulo = :titulo, 
                     descripcion = :descripcion 
                 WHERE id_tarea = :id_tarea";
        
        $stmt = $this->conn->prepare($query);
        
        // Limpiar datos
        $this->id_usuario = htmlspecialchars(strip_tags($this->id_usuario));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->id_tarea = htmlspecialchars(strip_tags($this->id_tarea));
        
        // Vincular valores
        $stmt->bindParam(":id_usuario", $this->id_usuario);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":id_tarea", $this->id_tarea);
        
        return $stmt->execute();
    }

    /**
     * Eliminar una tarea
     */
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_tarea = :id_tarea";
        
        $stmt = $this->conn->prepare($query);
        
        $this->id_tarea = htmlspecialchars(strip_tags($this->id_tarea));
        
        $stmt->bindParam(":id_tarea", $this->id_tarea);
        
        return $stmt->execute();
    }

    /**
     * Validar datos de la tarea
     */
    public function validar() {
        $errores = [];
        
        if(empty($this->titulo)) {
            $errores[] = "El título es requerido";
        } elseif(strlen($this->titulo) > 150) {
            $errores[] = "El título no puede exceder 150 caracteres";
        }
        
        if(empty($this->estado)) {
            $errores[] = "El estado es requerido";
        } elseif(!in_array($this->estado, ['pendiente', 'en_proceso', 'completada', 'cancelada'])) {
            $errores[] = "Estado inválido. Valores permitidos: pendiente, en_proceso, completada, cancelada";
        }
        
        if(!empty($this->descripcion) && strlen($this->descripcion) > 3000) {
            $errores[] = "La descripción no puede exceder 3000 caracteres";
        }
        
        if(!empty($this->id_usuario) && !is_numeric($this->id_usuario)) {
            $errores[] = "El ID de usuario debe ser numérico";
        }
        
        return $errores;
    }
}
?>
