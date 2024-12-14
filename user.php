<?php
class user {
    private $con;
    private $name;
    private $email;
    private $tel;
    private $password;

    public function __construct($con, $name, $email, $tel, $password) {
        $this->con = $con;
        $this->name = $name;
        $this->email = $email;
        $this->tel = $tel;
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function login() {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $res = $this->con->prepare($sql);
        $params = array(':email' => $this->email, ':password' => $this->password);
        
        if ($res->execute($params)) {
            return $res; // return the PDOStatement
        } else {
            return false; // indicate failure
        }
    }

    public function signup() {
        $sql = "INSERT INTO users (id, name, email, tel, password) VALUES (null, :name, :email, :tel, :password)";
        $res = $this->con->prepare($sql);
        $params = array(':name' => $this->name, ':email' => $this->email, ':tel' => $this->tel, ':password' => $this->password);
        return $res->execute($params);
    }

    public function userIsExist() {
        $sql = "SELECT * FROM users WHERE email = :email";
        $res = $this->con->prepare($sql);
        $params = array(':email' => $this->email);
        $res->execute($params);
        return $res->rowCount() > 0;
    }

    public static function deleteUser($con, $id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $res = $con->prepare($sql);
        $params = array(':id' => $id);
        if ($res->execute($params)) {
            echo "Deleted successfully";
            header('Location: admin.php');
        } else {
            echo "Deletion failed";
        }
    }
}

