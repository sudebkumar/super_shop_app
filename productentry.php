<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Entry Form</title>
        
         <style>
            
            #main {
                margin-top: 50px;
                margin-left: 200px;
                background-color: scrollbar;
            }
            h3 {
                font-weight: bold;
                color: green;
            }
        </style>
        
    </head>
    
    <body>
        <div id="main">
            
            <h3>Product Entry/Update</h3>
            
        <form action="productentry.php" method ="POST">
            
            <table>
                <tr>
                    
                    <td>Product ID</td>
                    <td><input type ="text" name ="productIdText"></td>
                    
                </tr>
                
                 <tr>
                     
                    <td>Quantity</td>
                    <td><input type ="text" name ="quantityText"></td>
                    <td><input type="submit" value ="Add/Update" name = 'addUpdate'></td>
                   
                </tr>
            </table>
                       
        </form>
        
        <?php
        {
            require_once 'product.php';
            require_once 'department.php';
            session_start();
            if (isset($_POST['addUpdate']))
            {
                $product = new Product($_POST['productIdText'], $_POST['quantityText']);
                $_SESSION['product'] = $product;
                $department = $_SESSION['department'];               
                               
                echo $department->add_product($product);
                
                echo '<br/>';
                
                echo "<a href='report.php'>View Report</a>";
              
            }
        }
        ?>
            </div>
    </body>
</html>
