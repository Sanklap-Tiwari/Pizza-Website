<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
   
   <!-- icon link -->
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>




<section  class="grid">
   <div class="content">
       <div class="content-left">
         <div class="info">
           <h2>Order Your Best <br> Pizza Anytime !</h2>
           <p>Hey, Our delicious pizza is waiting for you,
           we are always near to you with fresh item of pizza</p>
         </div>
         <button>Explore Pizza</button>
       </div>
       <div class="content-right"><img src="images/home-1.png" alt=""></div>
   </div>
</section>


<section class="category"> 
  <div class="list-items"> 
    <h1 class="title">Popular Pizza</h1> <br><br><br><br><br><br>
      <div class="card-list"> 
          <div class="card"> 
              <img src="images/mushroom pizza.png" class="rot" alt=""> 
              <div class="food-title"> 
                  <h1>Mushroom</h1> 
              </div> 
              <div class="desc-food">  
                  <p>This mushroom pizza is a white pizza that’s covered with mozzarella cheese, goat cheese, and fresh herbs.</p> 
              </div> 
              <div class="price"> 
              <span>RS: 220</span> 
              </div> 
          </div> 
          <div class="card"> 
              <img src="images/Pepperoni-Pizza.png" class="rot" alt=""> 
              <div class="food-title"> 
                  <h1>Pepperoni-Pizza</h1> 
              </div> 
              <div class="desc-food">  
                  <p> Pepperoni is basically an American version of salami. Pepperoni is a meat mixture of beef and pork.</p> 
              </div> 
              <div class="price"> 
              <span>RS: 360</span> 
              </div> 
          </div> 
          <div class="card"> 
              <img src="images/pesto pizza.png" class="rot" alt=""> 
              <div class="food-title"> 
                  <h1>Pesto</h1> 
              </div> 
              <div class="desc-food">  
                  <p>This pesto pizza is a delicious! It's topped with bright, nutty homemade pesto, fresh mozzarella cheese.</p> 
              </div> 
              <div class="price"> 
              <span>RS: 625</span> 
              </div> 
          </div> 
          <div class="card"> 
              <img src="images/Pizza Capricciosa.png"  class="rot" alt=""> 
              <div class="food-title"> 
                  <h1>Capricciosa</h1> 
              </div> 
              <div class="desc-food">  
                  <p>Capricciosa is a combination of ingredients which include tomatoes, mozzarella, mushrooms, artichokes, ham, olives.</p> 
              </div> 
              <div class="price"> 
              <span>RS: 500</span> 
              </div> 
          </div> 
      </div> 
  </div> 

</section>






<section class="products">

   <h1 class="title">latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>₹</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.html" class="btn">veiw all</a>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<!-- 
   - ionicon link
 -->
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>