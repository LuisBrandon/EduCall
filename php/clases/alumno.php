<?php
class Alumno
{

    // database connection and table name
    private $conn;
    private $nombre_tabla = "alumno";

    // object properties
    public $id;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $email;
    public $pass;
    public $telefono;
    public $provincia;
    public $fechaRegistro;
    public $imagen;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function registroAlumno()
    {
        //Sentencia para meter al alumno en la base de datos
        $query = "INSERT INTO
        " . $this->nombre_tabla . "
         SET
        nombre=:nombre, apellido1=:apellido1, apellido2=:apellido2, email=:email, pass=:pass, telefono=:telefono, provincia=:provincia, fechaRegistro=:fechaRegistro";
        
        //preparamos la query
        $stmt = $this->conn->prepare($query);

        //Limpiamos las variables de caracteres que no queremos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido1 = htmlspecialchars(strip_tags($this->apellido1));
        $this->apellido2 = htmlspecialchars(strip_tags($this->apellido2));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->pass = $this->pass;
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->provincia = htmlspecialchars(strip_tags($this->provincia));
        $this->fechaRegistro = htmlspecialchars(strip_tags($this->fechaRegistro));

        //Asignamos valores en la sentencia
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido1", $this->apellido1);
        $stmt->bindParam(":apellido2", $this->apellido2);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":provincia", $this->provincia);
        $stmt->bindParam(":fechaRegistro", $this->fechaRegistro);

        //Ejecutamos
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function leerAlumno()
    {
        $query = "SELECT
        a.nombre, a.apellido1, a.apellido2, a.email, a.telefono, a.provincia
    FROM
        " . $this->nombre_tabla . " a
       WHERE
        a.id = ?
    LIMIT
        0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nombre = $row['nombre'];
        $this->apellido1 = $row['apellido1'];
        $this->apellido2 = $row['apellido2'];
        $this->email = $row['email'];
        $this->telefono = $row['telefono'];
        $this->provincia = $row['provincia'];
    }
    function update()
    {

        
        $query = "UPDATE
                " . $this->nombre_tabla . "
            SET
                nombre = :nombre,
                apellido1 = :apellido1,
                apellido2 = :apellido2,
                email = :email,
                telefono = :telefono,
                provincia = :provincia
            WHERE
                id = :id";

        
        $stmt = $this->conn->prepare($query);

        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido1 = htmlspecialchars(strip_tags($this->apellido1));
        $this->apellido2 = htmlspecialchars(strip_tags($this->apellido2));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->provincia = htmlspecialchars(strip_tags($this->provincia));

        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido1', $this->apellido1);
        $stmt->bindParam(':apellido2', $this->apellido2);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':provincia', $this->provincia);
        $stmt->bindParam(':id', $this->id);

        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
