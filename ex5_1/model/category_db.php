<?php  
    function get_categories(){
        global $db;
        $query = 'SELECT * FROM categories
                 ORDER BY categoryID';
        $statememt = $db->prepare($query);
        $statememt ->execute();
        return $statememt;
    }

    function get_category_name($category_id){
        global $db;
        $query ='SELECT * FROM  categories
                 WHERE categoryID = :category_id';
        $statement = $db -> prepare($query);
        $statement -> bindValue(':category_id', $category_id);
        $statement->execute();
        $category = $statement-> fetch();
        $statement->closeCursor();
        $category_name= $category['categoryName'];
        return $category_name;
    }

    function add_category($name){
        global $db ;
        $query = 'INSERT INTO categories (categoryName)
                        VALUES (:name)';
         $statement = $db->prepare($query);
         $statement-> bindValue(':name', $name)   ;
         $statement->execute();
         $statement-> closeCursor();

    }

    function delele_category($category_id){
        global $db ;
        $query = 'DELETE FROM categories 
                      WHERE categoryID= :category_id';
        $statement  = $db-> prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement-> execute();
        $statement->closeCursor();
    }
