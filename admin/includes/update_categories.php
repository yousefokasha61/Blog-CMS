<form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

                                    <?php
                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                            $update = mysqli_query($connect,$query);
                                            while($row = mysqli_fetch_assoc($update)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                                
                                                ?>
                                                <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" name="cat_title" class="form-control">

                                            <?php } } ?>


                                            <?php // update a specific category

                                                if(isset($_POST['update'])){
                                                    $this_cat_title = $_POST['cat_title'];
                                                    $query = "UPDATE categories SET cat_title = '{$this_cat_title}' WHERE cat_id = {$cat_id}";
                                                    $update_query = mysqli_query($connect,$query);
                                                    if(!$update_query){
                                                        die('query has failed' . mysqli_error($connection));
                                                    }
                                                    header("Location: categories.php");
                                                }


                                            ?>
                                    


                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="update" value="Update category">
                                </div>
                            </form>