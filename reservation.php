<?php
class Reservation {
    private $con;
    private $location;
    private $CheckIn;
    private $CheckOut;
    private $Rooms;
    private $Adults;
    private $Children;

    private $username;
    private $userid;
    
    public function __construct($con ,$CheckIn, $CheckOut, $Rooms, $Adults, $Children,$location,$username,$userid) {
        $this->con = $con;
        $this->location = $location;
        $this->CheckIn = $CheckIn;
        $this->CheckOut = $CheckOut;
        $this->Rooms = $Rooms;
        $this->Adults = $Adults;
        $this->Children = $Children;
        $this->username = $username;
        $this->userid = $userid;
    }
    
    // Getter and Setter methods
    public function getCheckIn() {
        return $this->CheckIn;
    }
    
    public function setCheckIn($CheckIn) {
        $this->CheckIn = $CheckIn;
    }
    
    public function getCheckOut() {
        return $this->CheckOut;
    }
    
    public function setCheckOut($CheckOut) {
        $this->CheckOut = $CheckOut;
    }
    
    public function getRooms() {
        return $this->Rooms;
    }
    
    public function setRooms($Rooms) {
        $this->Rooms = $Rooms;
    }
    
    public function getAdults() {
        return $this->Adults;
    }
    
    public function setAdults($Adults) {
        $this->Adults = $Adults;
    }
    
    public function getChildren() {
        return $this->Children;
    }
    
    public function setChildren($Children) {
        $this->Children = $Children;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    // Method to create a reservation
    public function createReservation() {
        $sql = "INSERT INTO reservations (CheckIn, CheckOut, Rooms, Adults, Children, location, username, userid) VALUES (:CheckIn, :CheckOut, :Rooms, :Adults, :Children, :location, :username, :userid)";
        $res = $this->con->prepare($sql);
        $tab = array(
            ':CheckIn' => $this->CheckIn,
            ':CheckOut' => $this->CheckOut,
            ':Rooms' => $this->Rooms,
            ':Adults' => $this->Adults,
            ':Children' => $this->Children,
            ':location' => $this->location,
            ':username' => $this->username,
            ':userid' => $this->userid
        );
        return $res->execute($tab);
    }
    
    // Method to check if a reservation exists
    public function reservationExists() {
        $sql = "SELECT * FROM reservations WHERE CheckIn=:CheckIn AND CheckOut=:CheckOut AND Rooms=:Rooms AND Adults=:Adults AND Children=:Children AND username=:username AND userid=:userid";
        $res = $this->con->prepare($sql);
        $tab = array(
            ':CheckIn' => $this->CheckIn,
            ':CheckOut' => $this->CheckOut,
            ':Rooms' => $this->Rooms,
            ':Adults' => $this->Adults,
            ':Children' => $this->Children,
            ':username' => $this->username,
            ':userid' => $this->userid
        );
        $res->execute($tab);
        $resultat = $res->rowCount();
        
        return $resultat > 0;
    }
    
    // Static method to delete a reservation by ID
    public static function deleteReservation($con, $id) {
        $sql = "DELETE FROM reservations WHERE id=:id";
        $res = $con->prepare($sql);
        $tab = array(':id' => $id);
        $resultat = $res->execute($tab);
        
        if ($resultat) {
            echo "Reservation deleted successfully.";
            // Redirect to a different page if needed
            // header('Location: admin.php');
        }
    }

    // Static method to display all reservations
    public static function displayReservations($con) {
        $sql = "SELECT * FROM reservations";
        $res = $con->query($sql);
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Check In</th><th>Check Out</th><th>Rooms</th><th>Adults</th><th>Children</th><th>Location</th><th>Username</th><th>User ID</th><th>Delete</th><th>Update</th></tr></thead>";
        echo "<tbody>";
        while ($row = $res->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['CheckIn'] . "</td>";
            echo "<td>" . $row['CheckOut'] . "</td>";
            echo "<td>" . $row['Rooms'] . "</td>";
            echo "<td>" . $row['Adults'] . "</td>";
            echo "<td>" . $row['Children'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['userid'] . "</td>";
            echo "<td><a class='btn btn-danger' href='Delete/deleteReservation.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "<td><a class='btn btn-success' href='Update/updateReservation.php?id=". $row['id']. "'>Update</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}
