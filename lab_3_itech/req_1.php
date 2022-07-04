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
<body>


<h4>Выберите производителя: </h4>
<select name="vend_sel" id="vend_sel">
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
    <input type="button" value="get_items" onclick="get_items()"> 

<h4></h4>

<table border="1">
        <thead id="res_h"></thead>
        <tbody id="res"></tbody>
    </table>


<h4>Выберите категорию товара: </h4>
<select name="cat_sel" id="cat_sel" onchange="get_XML()" >
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
    <input type="button" value="get_items" onclick="get_itemsXML()" > 

<h4></h4>

<table border="1">
        <thead id="res_hXML"></thead>
        <tbody id="resXML"></tbody>
    </table>


<br>
<h4>Введите ценовой диапазон: </h4>
<input name="from_price" id="from_price" value="0">
<input name="to_price" id="to_price" value="0"> 
    <br>
<input type="button" value="get_items" onclick="get_itemsJSON()" > 

<h4></h4>

<table border="1">
        <thead id="res_hJSON"></thead>
        <tbody id="resJSON"></tbody>
</table>

    <script>
        let head_tabl = "<tr><th>name</th><th>price</th><th>quantity</th><th>quality</th></tr>";
        const ajax = new XMLHttpRequest();
        const ajaxXML = new XMLHttpRequest();
        const ajaxJSON = new XMLHttpRequest();
        let flag = false;
        let flag1 = false;
        if(!flag1)
            {
                ajaxXML.open("GET", "handler2_req.php?cat_sel=Computers");
                flag = true;
                flag1 = true;
                ajaxXML.send();
            }


        function get_items(){
            ajax.onreadystatechange = loadData;
            let vend_name = document.getElementById("vend_sel").value;
            ajax.open("GET", "handler1_req.php?vend_sel=" + vend_name);
            ajax.send();
        }
       

        function loadData(){
            if(ajax.readyState === 4)
            {
                if(ajax.status === 200)
                    console.log(ajax.response);
                    document.getElementById("res_h").innerHTML= head_tabl;
                    document.getElementById("res").innerHTML= ajax.response;
            }  
        }


        function get_XML(){
            let cat_name = document.getElementById("cat_sel").value;
            ajaxXML.open("GET", "handler2_req.php?cat_sel=" + cat_name);
            flag = true;
            ajaxXML.send();
              
        }


        function get_itemsXML(){ 
            ajaxXML.onreadystatechange = loadDataXML;
            ajaxXML.open("GET", "/lab_3_itech/doc.xml" );
            flag = false;
            ajaxXML.send();
 
        }
       

        function loadDataXML(){
            if(ajaxXML.readyState === 4 && ajaxXML.status === 200)
            {
                //console.log(ajaxXML);
                if(!flag)
                {
                    let rows = ajaxXML.responseXML.firstChild.children;
                    let result = "";
                    for(var i = 0; i<rows.length; i++){
                        result += "<tr>";
                        result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                        result += "<td>" + rows[i].children[1].textContent + "</td>";
                        result += "<td>" + rows[i].children[2].textContent + "</td>";
                        result += "<td>" + rows[i].children[3].textContent + "</td>";
                        result += "</tr>";

                    }
                    document.getElementById("res_hXML").innerHTML= head_tabl;
                    document.getElementById("resXML").innerHTML= result;
                }
            }  
        }


        function get_itemsJSON(){
            ajaxJSON.onreadystatechange = loadDataJSON;
            let from_price = document.getElementById("from_price").value;
            let to_price = document.getElementById("to_price").value;
            ajaxJSON.open("GET", "handler3_req.php?from_price=" + from_price +"&to_price=" + to_price);
            ajaxJSON.send();
        }

        function loadDataJSON(){
            if(ajaxJSON.readyState === 4 && ajaxJSON.status === 200){
                //console.dir(ajaxJSON.responseText)
                
                let res = JSON.parse(ajaxJSON.response);
                console.dir(res);

                let result = "";
                for(var i = 0; i<res.length; i++){
                    result += "<tr>";
                    result += "<td>" + res[i].name + "</td>";
                    result += "<td>" + res[i].price + "</td>";
                    result += "<td>" + res[i].quantity + "</td>";
                    result += "<td>" + res[i].quality + "</td>";
                    result += "</tr>";

                }
                    document.getElementById("res_hJSON").innerHTML= head_tabl;
                    document.getElementById("resJSON").innerHTML= result;

            }
        }

    </script>
</body>
</html>