<?php
/**
 * Configuración de la base de datos
 * Este archivo contiene la configuración para conectarse a MySQL
 */

class Database {
    private $host;
    private $database_name;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        // Obtener configuración desde variables de entorno (Docker)
        $this->host = $_ENV['DB_HOST'] ?? 'db';
        $this->database_name = $_ENV['DB_NAME'] ?? 'tareas_db';
        $this->username = $_ENV['DB_USER'] ?? 'root';
        $this->password = $_ENV['DB_PASS'] ?? 'rootpassword';
    }

    /**
     * Obtener conexión a la base de datos
     */
    public function getConnection() {
        $this->connection = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database_name . ";charset=utf8";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            error_log("Error de conexión: " . $exception->getMessage());
            throw new Exception("Error al conectar con la base de datos");
        }

        return $this->connection;
    }
}
?>
