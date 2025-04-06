<?php
class Nota {
    private $conn;
    private $table_name = "notas";

    public $id;
    public $modulo;
    public $nota1;
    public $nota2;
    public $tarea;
    public $promedio;
    public $id_estudiante;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para leer todas las notas
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obtener las notas de un estudiante por ID
    public function getNotasByEstudianteId($id_estudiante) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_estudiante = :id_estudiante";
        $stmt = $this->conn->prepare($query);

        // Vinculamos el ID del estudiante
        $stmt->bindParam(":id_estudiante", $id_estudiante);

        // Ejecutamos la consulta
        $stmt->execute();
        return $stmt;
    }

    // Método para crear una nueva nota
    public function create() {
        $query = "INSERT INTO notas (modulo, nota1, nota2, tarea, promedio, id_estudiante) 
                  VALUES (:modulo, :nota1, :nota2, :tarea, :promedio, :id_estudiante)";

        $stmt = $this->conn->prepare($query);

        // Calculamos el promedio antes de guardar
        $this->promedio = ($this->nota1 + $this->nota2 + $this->tarea) / 3;

        // Vinculamos los valores con los parámetros de la consulta
        $stmt->bindParam(":modulo", $this->modulo);
        $stmt->bindParam(":nota1", $this->nota1);
        $stmt->bindParam(":nota2", $this->nota2);
        $stmt->bindParam(":tarea", $this->tarea);
        $stmt->bindParam(":promedio", $this->promedio);
        $stmt->bindParam(":id_estudiante", $this->id_estudiante);

        // Ejecutamos la consulta
        return $stmt->execute();
    }

    // Método para actualizar una nota existente
    public function update() {
        $query = "UPDATE notas SET 
                    modulo = :modulo, 
                    nota1 = :nota1, 
                    nota2 = :nota2, 
                    tarea = :tarea, 
                    promedio = :promedio, 
                    id_estudiante = :id_estudiante 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Calculamos el nuevo promedio antes de actualizar
        $this->promedio = ($this->nota1 + $this->nota2 + $this->tarea) / 3;

        // Vinculamos los valores con los parámetros de la consulta
        $stmt->bindParam(":modulo", $this->modulo);
        $stmt->bindParam(":nota1", $this->nota1);
        $stmt->bindParam(":nota2", $this->nota2);
        $stmt->bindParam(":tarea", $this->tarea);
        $stmt->bindParam(":promedio", $this->promedio);
        $stmt->bindParam(":id_estudiante", $this->id_estudiante);
        $stmt->bindParam(":id", $this->id);

        // Ejecutamos la consulta
        return $stmt->execute();
    }

    // Método para eliminar una nota
    public function delete() {
        $query = "DELETE FROM notas WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Vinculamos el ID de la nota a eliminar
        $stmt->bindParam(":id", $this->id);

        // Ejecutamos la consulta
        return $stmt->execute();
    }
}
?>
