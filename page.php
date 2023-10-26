<?php
  require_once 'app/config/conexao.php';
  require_once 'app/header.php';
?>
  <!-- BEGIN content -->
  
  <div id="content">
    <!-- begin post -->
    <div class="single">
      <?php
        $_GET["id"];
        $query = "SELECT * FROM system_wiki_page WHERE id =".$_GET["id"];
              
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        
        //mysqli_close($con);

        if($result){
            $title = $row["title"];
            $description = $row["description"];
            $content = $row["content"];
            $created_at = $row["created_at"];
            $img = $row["img"];
            $url = $row["url"];
      ?>
      <h2><?php echo $title ?></h2>
      <span class="data-postagem"><?php echo $created_at ?></span>
      <p><?php echo $content ?></p>
      <!-- <p><img class="alignright" src="" width="200" height="150" alt="" /></p>
      <blockquote>
        <p></p>
      </blockquote>
        -->
      <?php
        }
      ?>
      
    </div>
    <!-- end post -->
  </div>
  <!-- END content -->

<?php
  require_once 'app/right.php';
  require_once 'app/footer.php';
?>

