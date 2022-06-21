<?php
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Document</title>
    <style>
        h4{
            margin-bottom: 0px;
        }
    </style>
</head>
<h4>Выберите производителя: </h4>
<form action="handler1_req.php" method="GET">
<select name="vend_sel">
    <?php
        try{
            $sql = "SELECT * FROM vendors";
            foreach($dbh->query($sql) as $row)
            {
                $name_vend = $row['name'];
                echo "<option value = '$name_vend'> $name_vend</option>";
            }
        }
        catch(PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/";
            die();
        }
    ?>
    </select>
    <br>
    <input type="submit" value="get_items"> 
</form>

<br>

<h4>Выберите категорию товара: </h4>
<form action="handler2_req.php" method="GET">
<select name="cat_sel">
    <?php
        try{
            $sql = "SELECT * FROM category";
            foreach($dbh->query($sql) as $row)
            {
                $name_cat = $row['name'];
                echo "<option value = '$name_cat'> $name_cat</option>";
            }
        }
        catch(PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/";
            die();
        }
    ?>
    </select>
    <br>
    <input type="submit" value="get_items"> 
</form>

<br>
<h4>Введите ценовой диапазон: </h4>
<form action="handler3_req.php" method="GET">
<input name="from_price" value="0">
<input name="to_price" value="0"> 
    <br>
    <input type="submit" value="get_items"> 
</form>
<body>
    
</body>
</html>