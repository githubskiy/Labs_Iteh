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

 $cursor = $collection->find(['quantity'=>['$eq' => 0]]);


 $tableBodyZero = " ";

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

    $tableBodyZero .= "<tr><th>$name</th><th>$price</th><th>$quantity</th><th>$vendor</th><th>$category</th><th>$condition</th><th>$feed_back</th></tr>";
}
print ($tableBodyZero);
?>
</table>
<?php
        $script="<script>localStorage.setItem('zero', '$tableBodyZero')</script>";
        echo $script;
?>
</body>
</html>
