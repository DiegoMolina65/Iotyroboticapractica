<?php
class Receta {
    private $conn;
    private $table_name = "recetas";

    public $id;
    public $nombre;
    public $tipo_pan;
    public $ingredientes;
    public $instrucciones;
    public $tiempo_preparacion;
    public $dificultad;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, tipo_pan=:tipo_pan, ingredientes=:ingredientes, instrucciones=:instrucciones, tiempo_preparacion=:tiempo_preparacion, dificultad=:dificultad";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->tipo_pan = htmlspecialchars(strip_tags($this->tipo_pan));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->instrucciones = htmlspecialchars(strip_tags($this->instrucciones));
        $this->tiempo_preparacion = htmlspecialchars(strip_tags($this->tiempo_preparacion));
        $this->dificultad = htmlspecialchars(strip_tags($this->dificultad));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":tipo_pan", $this->tipo_pan);
        $stmt->bindParam(":ingredientes", $this->ingredientes);
        $stmt->bindParam(":instrucciones", $this->instrucciones);
        $stmt->bindParam(":tiempo_preparacion", $this->tiempo_preparacion);
        $stmt->bindParam(":dificultad", $this->dificultad);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, tipo_pan=:tipo_pan, ingredientes=:ingredientes, instrucciones=:instrucciones, tiempo_preparacion=:tiempo_preparacion, dificultad=:dificultad WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->tipo_pan = htmlspecialchars(strip_tags($this->tipo_pan));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->instrucciones = htmlspecialchars(strip_tags($this->instrucciones));
        $this->tiempo_preparacion = htmlspecialchars(strip_tags($this->tiempo_preparacion));
        $this->dificultad = htmlspecialchars(strip_tags($this->dificultad));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":tipo_pan", $this->tipo_pan);
        $stmt->bindParam(":ingredientes", $this->ingredientes);
        $stmt->bindParam(":instrucciones", $this->instrucciones);
        $stmt->bindParam(":tiempo_preparacion", $this->tiempo_preparacion);
        $stmt->bindParam(":dificultad", $this->dificultad);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
