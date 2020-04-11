<?php
    if(isset($_GET['submit'])){
        $nameInput = htmlspecialchars($_GET['username']);
        $platform = htmlspecialchars($_GET['platform']);

        

        //print("<pre>".print_r($playerData,true)."</pre>");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php require('header.php'); ?>
    
    <script src="dist/js/searchBar.js"></script>
    <?php require('footer.php'); ?>
</body>
</html>