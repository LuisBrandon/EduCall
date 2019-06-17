<?php
class Profesor
{

    // database connection and table name
    private $conn;
    private $nombre_tabla = "profesor";
    
    // object properties
    public $id;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $email;
    public $pass;
    public $telefono;
    public $provincia;
    public $nivelAcademicoPriAsig;
    public $asignatura1;
    public $nivelAcademicoSegAsig;
    public $asignatura2;
    public $infoAdicional;
    public $imagen;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function registroProfesor()
    {
        //Sentencia para meter al alumno en la base de datos
        $query = "INSERT INTO
        " . $this->nombre_tabla . "
        SET
        nombre=:nombre, apellido1=:apellido1, apellido2=:apellido2, email=:email, pass=:pass, telefono=:telefono, provincia=:provincia, fechaRegistro=:fechaRegistro, nivelAcademicoPriAsig=:nivelAcademicoPriAsig, asignatura1=:asignatura1, nivelAcademicoSegAsig=:nivelAcademicoSegAsig,asignatura2=:asignatura2, infoAdicional=:infoAdicional";
        

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
        $this->nivelAcademicoPriAsig = htmlspecialchars(strip_tags($this->nivelAcademicoPriAsig));
        $this->asignatura1 = htmlspecialchars(strip_tags($this->asignatura1));
        $this->nivelAcademicoSegAsig = htmlspecialchars(strip_tags($this->nivelAcademicoSegAsig));
        $this->asignatura2 = htmlspecialchars(strip_tags($this->asignatura2));
        $this->infoAdicional = htmlspecialchars(strip_tags($this->infoAdicional));

        //Asignamos valores en la sentencia
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido1", $this->apellido1);
        $stmt->bindParam(":apellido2", $this->apellido2);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":provincia", $this->provincia);
        $stmt->bindParam(":fechaRegistro", $this->fechaRegistro);
        $stmt->bindParam(":nivelAcademicoPriAsig", $this->nivelAcademicoPriAsig);
        $stmt->bindParam(":asignatura1", $this->asignatura1);
        $stmt->bindParam(":nivelAcademicoSegAsig", $this->nivelAcademicoSegAsig);
        $stmt->bindParam(":asignatura2", $this->asignatura2);
        $stmt->bindParam(":infoAdicional", $this->infoAdicional);

        //Ejecutamos
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function leerProfesor()
    {
        $query = "SELECT
                p.nombre, p.apellido1, p.apellido2, p.email, p.telefono, p.provincia, p.nivelAcademicoPriAsig, p.asignatura1, p.nivelAcademicoSegAsig, p.asignatura2
            FROM
                " . $this->nombre_tabla . " p
               WHERE
                p.id = ?
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
        $this->nivelAcademicoPriAsig = $row['nivelAcademicoPriAsig'];
        $this->asignatura1 = $row['asignatura1'];
        $this->nivelAcademicoSegAsig = $row['nivelAcademicoSegAsig'];
        $this->asignatura2 = $row['asignatura2'];
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
                provincia = :provincia,
                nivelAcademicoPriAsig = :nivelAcademicoPriAsigm
                asignatura1 = :asignatura1,
                nivelAcademicoSegAsig = :nivelAcademicoSegAsig,
                asignatura2 = :asignatura2
            WHERE
                id = :id";

        
        $stmt = $this->conn->prepare($query);

        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido1 = htmlspecialchars(strip_tags($this->apellido1));
        $this->apellido2 = htmlspecialchars(strip_tags($this->apellido2));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->ciudad = htmlspecialchars(strip_tags($this->ciudad));
        $this->nivelAcademicoPriAsig = htmlspecialchars(strip_tags($this->nivelAcademicoPriAsig));
        $this->asignatura1 = htmlspecialchars(strip_tags($this->asignatura1));
        $this->nivelAcademicoSegAsig = htmlspecialchars(strip_tags($this->nivelAcademicoSegAsig));
        $this->asignatura2 = htmlspecialchars(strip_tags($this->asignatura2));

        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido1', $this->apellido1);
        $stmt->bindParam(':apellido2', $this->apellido2);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':provincia', $this->provincia);
        $stmt->bindParam(':nivelAcademicoPriAsig', $this->nivelAcademicoPriAsig);
        $stmt->bindParam(':asignatura1', $this->asignatura1);
        $stmt->bindParam(':nivelAcademicoSegAsig', $this->nivelAcademicoSegAsig);
        $stmt->bindParam(':asignatura2', $this->asignatura2);
        $stmt->bindParam(':id', $this->id);

        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

   
    
}
