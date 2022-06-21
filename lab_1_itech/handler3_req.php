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
        if(isset($_GET["from_price"]) && isset($_GET["to_price"]))
        {
            
            $from_price = $_GET["from_price"];
            
            $to_price = $_GET["to_price"];
           
            try{
               
                $sql = "SELECT * FROM items WHERE `price` >= :from_price and `price` <= :to_price ";
                $sth = $dbh->prepare($sql);
                $sth->execute((array(':from_price' => $from_price, ':to_price' => $to_price )));
                
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