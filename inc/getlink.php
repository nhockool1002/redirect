<div class="create" style="width:100%;text-align:center;padding-bottom:10px;">
    <?php
        $hash = $_GET['get'];
        $sql = "SELECT * FROM origin_link WHERE hash= '$hash'";
        $rows = $conn->query($sql);
        if($rows->num_rows == 0){
            echo "<h1>Không tồn tại liên kết này vui lòng kiểm tra lại</h1>";
        }else{
            foreach($rows as $row){
                echo "<p style='font-size:25px'>".$row['name_link']."</p>";
            ?>
            
               <a href="<?php echo $row['linkorigin']; ?>"> <button class="vaothoi">XEM KHÓA HỌC</button></a>
               <p class="ghichu">(*) Nhấn vào nút trên để di chuyển đến link tải tài liệu</p>
            <?php
            }
        }
    ?>
</div>