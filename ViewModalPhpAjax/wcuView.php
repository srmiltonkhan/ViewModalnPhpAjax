<!-- crraramro_view -->
<?php
 include 'admin/db_config.php';
 if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
        $query = "SELECT * FROM `home` WHERE id  = '".$_POST["id"]."'";
        $statement = $pdo_conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
         foreach($result as $row){                  
            $output .='
                <div>
                     <img src="admin/Files/WebContentsFiles/'.$row['file'].'">
                    <h3>'.$row['title'].'</h3>
                    <p>'.$row['details'].'</p>
                </div>
            ';
         }
         echo $output;

 }
?>

