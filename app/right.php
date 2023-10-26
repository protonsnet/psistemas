<!-- BEGIN sidebar -->
<div id="sidebar">
    <!-- begin ads -->
    <div class="ads"> <a href="#"><img src="images/ad125x125.png" alt="" height="125" width="125"/></a> <a href="#"><img src="images/ad125x125.png" alt="" height="125" width="125"/></a> <a href="#"><img src="images/ad125x125.png" alt="" height="125" width="125"/></a> <a href="#"><img src="images/ad125x125.png" alt="" height="125" width="125"/></a> </div>
    <!-- end ads -->
    <!-- begin search -->
    <form class="search" action="#">
      <input type="text" name="s" id="s" />
      <button type="submit">Buscar</button>
    </form>
    <!-- end search -->
    <div class="wrapper">
      <!-- begin popular posts -->
      <h2>Posts Populares</h2>
      <ul>
        <?php
        $query1 = "SELECT * FROM system_wiki_page ORDER BY id DESC";
              
        $result1 = mysqli_query($con,$query1);
        
        mysqli_close($con);

        if($result1){
          while($row1 = mysqli_fetch_array($result1)){
            $title1 = $row1["title"];
            $description = $row1["description"];
            $content = $row1["content"];
            $created_at = $row1["created_at"];
            $img = $row1["img"];
            $url = $row1["url"];
      ?>
        <li><a href="#"><?php echo $title1 ?></a></li>
      <?php
          }
        }
      ?>
      </ul>
      <!-- end popular posts -->
      <!-- begin flickr photos -->
      <h2>Flickr Photos</h2>
      <div class="flickr"> <a href="#"><img src="images/_thumb3.jpg" alt="" /></a> <a href="#"><img src="images/_thumb4.jpg" alt="" /></a> <a href="#"><img src="images/_thumb5.jpg" alt="" /></a> <a href="#"><img src="images/_thumb6.jpg" alt="" /></a> <a href="#"><img src="images/_thumb7.jpg" alt="" /></a> <a href="#"><img src="images/_thumb8.jpg" alt="" /></a> </div>
      <!-- end flickr photos -->
      <!-- begin featured video -->
      <h2>Featured Video</h2>
      <div class="video"> 

        <object data="" width="270" >
        <param name="movie" value="https://www.youtube.com/watch?v=eK1vUVsXYM8" />
        <embed src="https://www.youtube.com/watch?v=eK1vUVsXYM8" type="application/webm" width="270">
        </object>

      </div>
      <!-- end featured video -->
      <!-- begin tags -->
      <h2>Tags</h2>
      <div class="tags"> </div>
      <!-- end tags -->
      <!-- BEGIN left -->
      <div class="l sbar">
        <!-- begin categories -->
        <h2>Categories</h2>
        <ul>
          <li><a href="#">Entertainment</a></li>
          <li><a href="#">Fashion</a></li>
          <li><a href="#">Internet</a></li>
          <li><a href="#">Marketing</a></li>
          <li><a href="#">Lifestyle</a></li>
          <li><a href="#">Make Money</a></li>
          <li><a href="#">Online</a></li>
          <li><a href="#">Parenting</a></li>
        </ul>
        <!-- end categories -->
        <!-- begin pages -->
        <h2>Pages</h2>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="abolt.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <!-- end pages -->
      </div>
      <!-- END left -->
      <!-- BEGIN right -->
      <div class="r sbar">
        <!-- begin archives -->
        <h2>Archives</h2>
        <ul>
          <li><a href="#">August 2023</a></li>
        </ul>
        <!-- end archives -->
        <!-- begin meta -->
        <h2>Meta</h2>
        <ul>
          <li><a href="admin/">Login</a></li>
        </ul>
        <!-- end meta -->
      </div>
      <!-- END right -->
    </div>
  </div>
  <!-- END sidebar -->
  <!-- BEGIN footer -->