<?php
@session_start();
class usuari{

    public $username;
    public $password;
    public $email;

    public function buscar(){

        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $sql = "SELECT `username`, `password`, `email`, `foto`, `data_naixement`, `rol` 
        FROM `usuari` WHERE email = '" . $this->getEmail() . "'";
        $result = $mysql->query($sql);
        return $result;
    }


    public function login(){

        $mysql = new mysqli("localhost", "root", "", "login");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $this->setPassword(md5($this->getPassword()));
        $password= $this->getPassword();
        $email = $this->getEmail();

        $sql = "SELECT email,username FROM usuari
WHERE email='$email' and password='$password'";

        $result = $mysql->query($sql);
        $fila = $result->fetch_assoc();
        if (mysqli_num_rows($result)){
            $_SESSION["email"]= $this->getEmail();
            $_SESSION["username"]=$fila['username'];
            $mysql->close();
            header("Location:../../index.php"); //redirigir a una altra pagina
        } else {
            $mysql->close();
            echo "<script> alert('Contrasenya incorrecta');</script>";
        }

    }

    public function register(){
        $mysql=new mysqli("localhost","root","","login");   
    if ($mysql->connect_error){
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
}
