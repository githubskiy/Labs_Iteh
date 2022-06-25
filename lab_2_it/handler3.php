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
            <th>vendor</th>
            <th>category</th>
            <th>condition</th>
            <th>feed_back</th>
        </tr>

<?php
 include('connection.php');
$from_price= $_GET["from_price"];
$to_price = $_GET["to_price"];

$cursor = $collection->find(['$and' => [['price'=>['$gte' => intval($from_price)]], ['price'=>['$lte' => intval($to_price)]]]]);


$tableBodyPrice = " ";
foreach($cursor as $document){
    $name = $document['name'];
    $price = $document['price'];
    $quantity = $document['quantity'];

    if($document['vendor'] ?? null ){
        $vendor = $document['vendor'];
    }
    else{
        $vendor="  ---  ";
    }

    if($document['category'] ?? null ){
        $category = $document['category'];
    }
    else{
        $category="  ---  ";
    }

    if($document['feed_back'] ?? null ){
        $feed_back = $document['feed_back'];
    }
    else{
        $feed_back="  ---  ";
    }
    
    if($document['condition'] ?? null ){
        $condition = $document['condition'];
    }
    else{
        $condition="  ---  ";
    }

    $tableBodyPrice .= "<tr><th>$name</th><th>$price</th><th>$quantity</th><th>$vendor</th><th>$category</th><th>$condition</th><th>$feed_back</th></tr>";
}
print ($tableBodyPrice);

?>
</table>
<?php
        $script="<script>localStorage.setItem('prev_price', '$tableBodyPrice')</script>";
        echo $script;
?>
</body>
</html>
