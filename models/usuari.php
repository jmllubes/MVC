<?php
@session_start();
class usuari
{

    public $username;
    public $password;
    public $email;
    public $foto;
    public $data;
    public $rol;


    public function mostrar()
    {

        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $sql = "SELECT DISTINCT `rol`
        FROM `usuari` ";
        $result = $mysql->query($sql);
        return $result;
    }


    public function buscar()
    {

        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $sql = "SELECT `username`, `password`, `email`, `foto`, `data_naixement`, `rol` 
        FROM `usuari` WHERE email = '" . $this->getEmail() . "'";
        $result = $mysql->query($sql);
        return $result;
    }


    public function login()
    {

        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $this->setPassword(md5($this->getPassword()));
        $password = $this->getPassword();
        $email = $this->getEmail();

        $sql = "SELECT email,username FROM usuari
WHERE email='$email' and password='$password'";

        $result = $mysql->query($sql);
        $fila = $result->fetch_assoc();
        if (mysqli_num_rows($result)) {
            $_SESSION["email"] = $this->getEmail();
            $_SESSION["username"] = $fila['username'];
            $mysql->close();
            header("Location:../../index.php"); //redirigir a una altra pagina
        } else {
            $mysql->close();
            echo "<script> alert('Contrasenya incorrecta');</script>";
        }
    }

    public function register()
    {
        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }

        $password = md5($this->getPassword());
        $user = $this->getUsername();
        $email = $this->getEmail();
        $sql = "INSERT INTO usuari (username,password,email) 
        VALUES ('$user','$password','$email')";
        $resultado = $mysql->query($sql);

        $mysql->close();
        return $resultado;
    }
    public function actualitzar()
    {
        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }

        $password = $this->getPassword();
        $user = $this->getUsername();
        $email = $this->getEmail();
        $foto = $this->getFoto();
        $data = $this->getData();
        $sql = "UPDATE usuari SET username='$user',password='$password',foto='$foto',data_naixement='$data'
     WHERE email = '$email'";
        $mysql->query($sql);
        $mysql->close();
    }


    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}
