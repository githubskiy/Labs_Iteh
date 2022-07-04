        <?php
         header('Content-type: application/json');
         header("Cache-Control: no-cache, must-revalidate");
        include('connect.php');
        if(isset($_GET["from_price"]) && isset($_GET["to_price"]))
        {
            
            $from_price = $_GET["from_price"];
            
            $to_price = $_GET["to_price"];
           
            try{
               
                $sql = "SELECT * FROM items WHERE `price` >= :from_price and `price` <= :to_price ";
                $sth = $dbh->prepare($sql);
                $sth->execute((array(':from_price' => $from_price, ':to_price' => $to_price )));
                
                $items_ = $sth->fetchAll(PDO::FETCH_OBJ);
      
                echo json_encode($items_);
                

            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        