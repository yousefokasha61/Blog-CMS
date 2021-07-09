<?php
    function add_category(){
        global $connect;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if(empty($cat_title) || $cat_title == ""){
                echo "This Field shouldn't be empty";
            }else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUES('{$cat_title}') ";
                $handle = mysqli_query($connect,$query);
                if(!$handle){
                    die('query has failed'.mysqli_error($connect));
                }
            }
        }
    }

    function showAllCategories(){
        global $connect;
        $query = "SELECT * FROM categories";
        $handle = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($handle)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";
        }
    }


    function deleteCategory(){
        global $connect;
        if(isset($_GET['delete'])){
            $this_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = {$this_cat_id}";
            $delete_query = mysqli_query($connect,$query);
            header("Location: categories.php");
        }
    }

    function updateCategory(){
        global $connect;
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            include "includes/update_categories.php";
        }
    }

    function confirm($handle){
        global $connect;
        if(!$handle){
            die("query has failed" . mysqli_error($connect));
        }
    }
?>