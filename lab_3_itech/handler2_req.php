<?php
        $dom = new DOMDocument('1.0', 'utf-8');
        header('Content-type: text/xml');
        header("Cache-Control: no-cache, must-revalidate");
       
        include('connect.php');
        if(isset($_GET["cat_sel"]))
        {
            $cat_sel = $_GET["cat_sel"];
           
            try{
                $sql_getId = "SELECT `id_category` FROM category WHERE `name` = :cat_sel";
                $sth = $dbh->prepare($sql_getId);
                $sth->execute((array(':cat_sel' => $cat_sel)));
                
                $category_id = $sth->fetchAll();
             
                 foreach($category_id as $row)
                {
                    $cat_id = $row['id_category'];
    
                }
                //$cat_id = 1;
                $sql = "SELECT * FROM items WHERE `fid_category` = :cat_id";
                $sth = $dbh->prepare($sql);
                $sth->execute((array(':cat_id' => $cat_id)));
                
                $items_ = $sth->fetchAll();
               
                $strXML = '<?xml version="1.0" encoding="UTF-8"?>';
                
                $strXML .= '<root>';
            
                // if(count($items_) == 0){
                //     echo "TABLE IS EMPTY. ITEMS NOT FOUND";
                // }
                foreach($items_ as $row)
                {
                    $name_items = $row['name'];
                    $price_items = $row['price'];
                    $quantity_items = $row['quantity'];
                    $quality_items = $row['quality'];

                    $strXML .= "<row><name>$name_items</name> <price>$price_items</price> <quantity>$quantity_items</quantity> <quality>$quality_items</quality></row>";

                }
                $strXML .=  "</root>";
                $dom->loadXML($strXML);
                $dom->preserveWhiteSpace = false;
                // $xml = $dom->saveXML();
                // echo $strXML;
                $dom->save('doc.xml');

            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
