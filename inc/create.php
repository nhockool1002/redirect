<div class="create" style="width:100%;text-align:center;padding-bottom:10px;">
<?php
    if(isset($_SESSION['user'])){
?>
    <?php 
        if(isset($_SESSION['flash'])){
            echo $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    ?>
    <form method="POST" action="exe/enf-create.php">
        <label>Tiêu đề</label> <br><input type="text" name="title" required><br>
        <label>Link gốc</label> <br><input type="text" name="linkorigin"><br>
        <br>
        <button type="submit" name="submit">TẠO LINK</button>
    </form>
<?php
    }else{
        header('Location:index.php');
    }
?>
</div>