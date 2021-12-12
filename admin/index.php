<?php include("partials/menu.php");?>

    

    <!-- main contain section start  -->
    <div class="main-content">
        <div class="wrapper">
          <h1>Dashboard</h1>
          <br><br>
          <?php 
             if (isset($_SESSION['login'])) {
                echo $_SESSION['login'] ;  
                unset($_SESSION['login']);   
               }
          
          ?>
          <div class="col-4 text-center">
              <?php 
              $sql="SELECT * FROM tbl_category";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              
              
              
              
              ?>
              <h1><?php echo $count;?></h1>
               Categories
          </div>
          <div class="col-4 text-center">
          <?php 
              $sql="SELECT * FROM tbl_food";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              
              
              
              
              ?>
              <h1><?php echo $count;?></h1>
               Foods
          </div>
          <div class="col-4 text-center">

                <?php 
              $sql="SELECT * FROM table_order";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              
              
              
              
              ?>
              <h1><?php echo $count;?></h1>
               Total Orders
          </div>
          <div class="col-4 text-center">
              <?php 
              
              $sql4="SELECT SUM(total) AS total FROM table_order";
              $query4=mysqli_query($conn,$sql4);
              $row4=mysqli_fetch_assoc($query4);
              $total_revenuw=$row4['total']
              
              
              ?>
              <h1><?php echo $total_revenuw;?></h1>
                 Revenues Granted
          </div>
          <div class="clearfix">

          </div>
        </div>
    </div>
    <!-- main contain section end -->



   <?php include("partials/footer.php") ;?>