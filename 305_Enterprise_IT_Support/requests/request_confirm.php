<?php include '../view/header.php'?>
    <p>Got it.  Help is on the way!</p>
    <p>Your trouble ticket number is: <?php echo $confirmation?></p>
    <form action="index.php" method="post">
        <div id="buttons">
            <input type="submit" value="Logout" name="btn_logout" class="btn btn-primary">
        </div>
        <br><br><br>
    </form>
<?php include '../view/footer.php'?>