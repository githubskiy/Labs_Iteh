        <?php
        include('connect.php');
        if(isset($_GET["vend_sel"]))
        {
            $vend_sel = $_GET["vend_sel"];
            try{
                $sql_getId = "SELECT `id_vendors` FROM vendors WHERE `name` = :vend_sel";
                $sth = $dbh->prepare($sql_getId);
                $sth->execute((array(':vend_sel' => $vend_sel)));
                
                $vendors_id = $sth->fetchAll();
                 foreach($vendors_id as $row)
                {
                    $vend_id = $row['id_vendors'];
    
                }

                $sql = "SELECT * FROM items WHERE `fid_vendors` = :vend_id";
                $sth = $dbh->prepare($sql);
                $sth->execute((array(':vend_id' => $vend_id)));
                
                $items_ = $sth->fetchAll();
                if(count($items_) == 0){
                    print "TABLE IS EMPTY. ITEMS NOT FOUND";
                }
                foreach($items_ as $row)
                {
                    $name_items = $row['name'];
                    $price_items = $row['price'];
                    $quantity_items = $row['quantity'];
                    $quality_items = $row['quality'];

                    print "<tr> <td>$name_items</td> <td>$price_items</td>
                    <td>$quantity_items</td> <td>$quality_items</td></tr>";

                }

            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
