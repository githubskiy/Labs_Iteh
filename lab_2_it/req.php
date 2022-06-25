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
<body>
<h4>Список производителей с которыми работает магазин: </h4>
<form action="handler1.php" method="GET">
    <input type="submit" value="get_vendors"> 
</form>


<h4>Последний сформированный список производителей с которыми работает магазин: </h4>

<input type="submit" value="get_prev_vendors" onclick="getPrevVend()"> 
<h4> </h4>
<table border="1">
    <thead>
        <tr>
            <th>Vendor</th>
        </tr>
    </thead>
    <tbody id = "res_vend">

    </tbody>
</table>

<h4>Товары, отсутствующие на складе: </h4>
<form action="handler2.php" method="GET">
   
    <input type="submit" value="get_items"> 
</form>

<h4>Последний сформированный список отсутствующих товаров: </h4>
<input type="submit" value="get_prev_zero" onclick="getPrevZero()"> 

<h4> </h4>
<table border="1">
    <thead>
    <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>vendor</th>
            <th>category</th>
            <th>condition</th>
            <th>feed_back</th>
    </tr>
    </thead>
    <tbody id = "res_items_zero">

    </tbody>
</table>

<br>
<h4>Введите ценовой диапазон: </h4>
<form action="handler3.php" method="GET">
<input name="from_price" value="0">
<input name="to_price" value="0"> 
    <br>
    <input type="submit" value="get_items"> 
</form>

<h4>Результаты предыдущего ценового диапазона: </h4>
<input type="submit" value="get_prev_price" onclick="getPrevPrice()"> 
<h4> </h4>
<table border="1">
    <thead>
    <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>vendor</th>
            <th>category</th>
            <th>condition</th>
            <th>feed_back</th>
    </tr>
    </thead>
    <tbody id = "res_items_prev_price">

    </tbody>
</table>


<script>
    function getPrevVend()
    {
        if(localStorage.getItem('vend') == null || localStorage.getItem('vend') == " ")
        {
            alert("no previous request yet");
        }
        else{
        document.getElementById("res_vend").innerHTML=localStorage.getItem('vend');
        }
    } 
    function getPrevZero()
    {
        if(localStorage.getItem('zero') == null || localStorage.getItem('zero') == " ")
        {
            alert("no previous request yet");
        }
        else{
        document.getElementById("res_items_zero").innerHTML=localStorage.getItem('zero');
        }
    } 
    function getPrevPrice()
    {
        if(localStorage.getItem('prev_price') == null || localStorage.getItem('prev_price') == " ")
        {
            alert("no previous request yet or got 0 items in previous request");
        }
        else{
            document.getElementById("res_items_prev_price").innerHTML=localStorage.getItem('prev_price');
        }
        
    } 
</script>

        
</body>
</html>