<?php
    function get_categories(){
        $stmt=$dbh->prepare("SELECT * FROM categorie");
        $stmt->execute();
        $result=$stmt->fetchAll();
        
        foreach($result as $row){
            
        }
    }
        ?>