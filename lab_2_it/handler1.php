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
            <th>Vendor</th>
        </tr>

<?php
 include('connection.php');

 $cursor = $collection->distinct('vendor');

 $tableBody='';
for($i = 0; $i< count($cursor); $i++)
{
    $tableBody .="<tr><th> $cursor[$i] </th></tr>";
}
print ($tableBody);
?>
</table>
    <?php
        $script="<script>localStorage.setItem('vend', '$tableBody')</script>";
        echo $script;
    ?>

</body>
</html>