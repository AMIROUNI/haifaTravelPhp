<?php
class admin{


    private $con;

    private $email;
    private $password;
   
    function __construct($con, $email, $password) {
        $this->con = $con;
        $this->email = $email;
        $this->password = $password;
    }


  function getEmail(){
    return $this->email;
  }
  
  function setEmail($e){
       $this->email->$e;


}
  function getPassword(){
    return $this->password;
  }

   function setPassword($password){
    $this->password=$password;
   }
   function login(){
    $sql = "SELECT * FROM admin WHERE email=:email AND password=:password";
    $res=$this->con->prepare($sql);
    $tab=array(':email'=>$this->email,':password'=>$this->password);
    $resultat=$res->execute($tab);
    return $resultat;

   }

   public static function desplayUser($con){
    $sql="SELECT * FROM users ";
    $res=$con->query($sql);
    while($row=$res->fetch()) {
        echo"<tr>";
        echo"<td>".$row['id']."</td>";
        echo"<td>".$row['name']."</td>";
        echo"<td>".$row['email']."</td>";
        echo"<td>".$row['tel']."</td>";
        echo"<td><a class='btn btn-danger' href='Delete/delete.php?id=".$row['id']."'>delete</a></td>";
        echo"<td><a class='btn btn-success' href='Update/update.php?id=".$row['id']."'>update</a></td>";
        echo"</tr>";

    }
}
}