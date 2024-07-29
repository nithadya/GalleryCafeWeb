<?php include 'includes/header.php'; ?>
<main>
        <section class="about-us" style="background-color: white;">
        <div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_5terre.jpg">
      <img src="./assets/images/food-menu-1.png" alt="Cinque Terre">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="./assets/images/food-menu-2.png" alt="Forest">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="./assets/images/food-menu-3.png" alt="Northern Lights">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="./assets/images/food-menu-4.png" alt="Mountains">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="clearfix"></div>      
        </section>
    </main>



<!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">
  <style>

div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>