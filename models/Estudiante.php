<?php
class Estudiante {
    private $conn;
    private $table_name = "estudiantes";

    public $id;
    public $nombre;
    public $carnet;
    public $carrera;
    public $fecha_registro;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para leer todos los estudiantes
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un nuevo estudiante
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, carnet, carrera, fecha_registro) 
                  VALUES (:nombre, :carnet, :carrera, :fecha_registro)";

        $stmt = $this->conn->prepare($query);

        // Vinculamos los valores con los parámetros de la consulta
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":carnet", $this->carnet);
        $stmt->bindParam(":carrera", $this->carrera);
        $stmt->bindParam(":fecha_registro", $this->fecha_registro);

        // Ejecutamos la consulta
        return $stmt->execute();
    }

    // Método para actualizar un estudiante
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET 
                    nombre = :nombre, 
                    carnet = :carnet, 
                    carrera = :carrera, 
                    fecha_registro = :fecha_registro 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Vinculamos los valores con los parámetros de la consulta
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":carnet", $this->carnet);
        $stmt->bindParam(":carrera", $this->carrera);
        $stmt->bindParam(":fecha_registro", $this->fecha_registro);
        $stmt->bindParam(":id", $this->id);

        // Ejecutamos la consulta
        return $stmt->execute();
    }



        // Método para eliminar una nota
        public function delete() {
            $query = "DELETE FROM estudiantes WHERE id = :id";
    
            $stmt = $this->conn->prepare($query);
    
            // Vinculamos el ID de la nota a eliminar
            $stmt->bindParam(":id", $this->id);
    
            // Ejecutamos la consulta
            return $stmt->execute();
        }
}
?>

