<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>quality</th>
        </tr>
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

                    print "<tr> <th>$name_items</th> <th>$price_items</th>
                    <th>$quantity_items</th> <th>$quality_items</th></tr>";

                }

            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        ?>
    </table>
</body>
</html>