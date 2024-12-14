<?php
class item{
  private $con;
  private  $image;
  private  $location;
  private $description;
  private  $rating;
  private  $price;
  private $discount;
   
  function __construct($con,$image='',$location='',$description='',$rating=0,$price=0,$discount=0){
    $this->con =$con;
    $this->image = $image;
    $this->location = $location;
    $this->description = $description;
    $this->rating = $rating;
    $this->price=$price;
    $this->discount=$discount;
}


function addItem() {
    try {
        $sql = "INSERT INTO `items` (`image_url`, `location`, `description`, `rating`, `price`, `discount_price`) VALUES (:image_url, :location, :description, :rating, :price, :discount_price)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':image_url', $this->image);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':discount_price', $this->discount);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}





public function itemIsExist() {
    $sql = "SELECT * FROM items WHERE image_url = :image_url";
    $res = $this->con->prepare($sql);
    $res->bindParam(':image_url', $this->image);
    $res->execute();
    $result = $res->rowCount();

    return $result > 0;
}


public static function deleteItem($con,$id){ 
    $sql="DELETE FROM items WHERE id=:id";
    $res=$con->prepare($sql);
    $tab=array(':id'=>$id);
    $resultat=$res->execute($tab);
    if ($resultat){
        $user=1;
        echo "Deleted success";
        header('location: admin.php');
    }
    }


    public static function  getall($con){

        $sql="SELECT * FROM `items`";
        $res=$con->query($sql);
        while($row=$res->fetch()) {
          echo'  <div class="box">';
            echo'<img src="'.$row['image_url'].'" alt="">';
              echo' <div class="content">';
                echo '  <h3><i class="fas fa-map-marker-alt"></i> '.$row['location'].'</h3>';
                echo' <p>'.$row['description'].'</p>';
                echo '<div class="stars">';
                    for($i=0;$i<$row['rating'];$i++){
                        echo '<i class="fas fa-star"></i>';
                    }
                echo'</div>';
               echo '<div class="price">'.$row['price'].'$____<span>'.$row['discount_price'].'</span></div>';
               echo ' <a href="#" class="btn">check now</a>';
               echo '<a href="reservationPage.php?location=' . urlencode($row['location']) . '" class="btn">Reservation</a>';
          echo ' </div>';
       echo' </div>';
    
        }
    }

        public static function  getall2($con){

            $sql="SELECT * FROM `items`";
            $res=$con->query($sql);
            while($row=$res->fetch()) {
              echo'  <div class="box">';
                echo'<img src="'.$row['image_url'].'" alt="">';
                  echo' <div class="content">';
                    echo '  <h3><i class="fas fa-map-marker-alt"></i> '.$row['location'].'</h3>';
                    echo' <p>'.$row['description'].'</p>';
                    echo '<div class="stars">';
                        for($i=0;$i<$row['rating'];$i++){
                            echo '<i class="fas fa-star"></i>';
                        }
                    echo'</div>';
                   echo '<div class="price">'.$row['price'].'$_<span>'.$row['discount_price'].'</span></div>';
                   echo ' <a href="#" class="btn">check now</a>';
              echo ' </div>';
           echo' </div>';
        
            }

    }
    

    public static function displayitems($con){
       echo ' <section class="packages" id="packages">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="container">';
        item::getall($con);
        echo '   </div>
         </section>';}

         public static function displayitems2($con){
            echo ' <section class="packages" id="packages">
     
             <h1 class="heading">
                 <span>p</span>
                 <span>a</span>
                 <span>c</span>
                 <span>k</span>
                 <span>a</span>
                 <span>g</span>
                 <span>e</span>
                 <span>s</span>
             </h1>
     
             <div class="container">';
             item::getall2($con);
             echo '   </div>
              </section>';
     
     
     
         }


         public static function displayItemsTable($con) {
            $sql = "SELECT * FROM `items`";
            $res = $con->query($sql);
            echo '<table class="table table-bordered table-striped">';
            echo '<thead><tr><th>ID</th><th>Image</th><th>Location</th><th>Description</th><th>Rating</th><th>Price</th><th>Discount Price</th><th>Delete</th><th>Update</th></tr></thead>';
            echo '<tbody>';
            while ($row = $res->fetch()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td><img src="' . $row['image_url'] . '" alt="" style="width: 100px; height: auto;"></td>';
                echo '<td>' . $row['location'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['rating'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $row['discount_price'] . '</td>';
                echo "<td><a class='btn btn-danger' href='Delete/deleteItem.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "<td><a class='btn btn-success' href='updateItem.php?id=". $row['id']. "'>Update</a></td>";
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }

    
