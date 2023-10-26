<?php
  require_once 'app/config/conexao.php';
  require_once 'app/header.php';
?>
  <!-- END header -->
  <!-- BEGIN content -->
  <div id="content">
    <!-- begin post -->
    <?php
      $query = "SELECT * FROM system_wiki_page ORDER BY id DESC";
            
      $result = mysqli_query($con,$query);
      
      //mysqli_close($con);

      if($result){
        while($row = mysqli_fetch_array($result)){
          $id = $row["id"];
          $title = $row["title"];
          $description = $row["description"];
          $content = $row["content"];
          $created_at = $row["created_at"];
          $img = $row["img"];
          $url = $row["url"];
    ?>
      <div class="post">
        <div class="thumb"><a href="#"><img src="<?php echo $img; ?>" alt="" /></a></div>
        <h2><a href="#"><?php echo $title; ?></a></h2>
        <p class="date"><?php echo $created_at; ?></p>
        <p><?php echo $description; ?></p>
        <a class="continue" href="page.php?id=<?php echo $id ?>">Continue lendo</a> 
      </div>
    
    <?php
        }
      }
    ?>
    <!-- end post -->

    <!-- begin post navigation -->
    <div class="postnav">
      <ul>
        <li><a href="#">1</a></li>
        <li><a href="#">&raquo;</a></li>
      </ul>
      <div class="break"></div>
    </div>
    <!-- end post navigation -->
  </div>
  <!-- END content -->

<?php
  require_once 'app/right.php';
  require_once 'app/footer.php';
?>
