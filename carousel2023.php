    <?php
    include("2014_admin/config.php");
    $db=mysql_connect($servername,$sqlservername,$sqlserverpws);
    mysql_query("SET NAMES 'utf8'",$db);
    mysql_select_db($sqlname,$db) ;

    $sql = "select * from abgneblock where yuko= 0 order by upload_time desc limit 6 ";
    $conn=mysql_query($sql);
    $conn2=mysql_query($sql);
    $i = 0;	
    ?>
    <!-- Carousel -->
   <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
            $i = 0;
            while($row=mysql_fetch_array($conn)) {
                $active = '';
            if($i==0){
                $active = 'class="active"  aria-current="true"';
            }
        ?>
        <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="<?=$i?>" <?=$active?>></button>
        <?php $i++;} ?>
    </div>
    <div class="carousel-inner">
       <?php
        $i = 0;
        while($row=mysql_fetch_array($conn2)) {
            $active = '';
         if($i==0){
            $active = 'active';
         }
       ?>
      <div class="carousel-item <?=$active?>">
        <img src="http://www.colmax.com.tw/abgneblock/<?=$row["pic_name"]?>" class="d-block w-100">
      </div>
      <?php $i++;} ?>
      <!-- Add more carousel items here -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>