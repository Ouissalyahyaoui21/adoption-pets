<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <link rel="stylesheet" href="products.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<!-- ===== HEADER ===== -->
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="logo">
        <span class="P">P</span>
        <span class="pet">&#x1F436;</span>
        <span class="E">E</span>
        <span class="T">T</span>
        <span class="S">S</span>
        <span class="_">_</span>
        <span class="H">H</span>
        <span class="A">A</span>
        <span class="V">V</span>
        <span class="E">E</span>
        <span class="N">N</span>
    </a>
   <nav class="navbar">
        <a href="pet.html">Home</a>
        <a href="contact.html">About</a>
        <a href="products.php">Products</a>
        <a href="take-care.html"> Review</a>
        <a href="adopt_pets.php">adept </a>
        <a href="PatsSpot.html">PatsSpot</a>
        <a href="ai.html">Ask ai</a>
    </nav>
    <div class="icons">
        <a href="#" class="fas fa-user"></a>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-paw adopt"></a>
    </div>
</header>

<h1>Our Products 🛒
  <button id="view-cart">cart(<span id="cart-count"><?php echo 
  isset($_SESSION['cart'])?
  count($_SESSION['cart']):0;?></span>)</button>
</h1>

<div class="pets-container">

  <div class="pet-card">
    <img src="products pic/hamster_house.jpg" alt="">
    <h3>Hamster Wooden House</h3>
    <p class="cute">🐹 A practical hamster house that provides comfort and tranquility</p>
    <p class="price">Price: 2500 DA</p>
    <button class="add-cart" data-product="Hamster Wooden House">Add to Cart</button>
    <a href="form.php?product=Hamster Wooden House"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/cat_house.jpg" alt="">
    <h3>Cat House</h3>
    <p class="cute">🐱 A warm and cozy cat house that provides security and comfort all day long</p>
    <p class="price">Price: 4500 DA</p>
    <button class="add-cart" data-product="Cat House">Add to Cart</button>
    <a href="form.php?product=Cat House"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/dog.jpg" alt="">
    <h3>Dog Toy (Pink)</h3>
    <p class="cute">🐶 A rattling rubber bone toy for fun entertainment and strengthening teeth</p>
    <p class="price">Price: 1200 DA</p>
    <button class="add-cart" data-product="Dog Toy">Add to Cart</button>
    <a href="form.php?product=Dog Toy Pink"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/house_rabbit.jpg" alt="">
    <h3>Rabbit House</h3>
    <p class="cute">🐰 A cozy rabbit house, a safe place to rest and relax</p>
    <p class="price">Price: 3500 DA</p>
    <button class="add-cart" data-product="Rabbit House">Add to Cart</button>
    <a href="form.php?product=Rabbit House"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/Rabbit Leash.jpg" alt="">
    <h3>Rabbit Leash</h3>
    <p class="cute">🐰 Better control and greater comfort while walking your rabbit</p>
    <p class="price">Price: 3600 DA</p>
    <button class="add-cart" data-product="Rabbit Leash">Add to Cart</button>
    <a href="form.php?product=Rabbit Leash"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/Cat Vest Soft.jpg" alt="">
    <h3>Cat Vest Soft</h3>
    <p class="cute">Your cat needs a coat in this cold weather</p>
    <p class="price">Price: 2500 DA</p>
    <button class="add-cart" data-product="Cat Vest Soft">Add to Cart</button>
    <a href="form.php?product=Cat Vest Soft"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/CAT feather lure bell toy.jpg" alt="">
    <h3>CAT feather lure bell toy</h3>
    <p class="cute">Make your cat more energetic</p>
    <p class="price">Price: 1200 DA</p>
    <button class="add-cart" data-product="CAT feather lure bell toy">Add to Cart</button>
    <a href="form.php?product=CAT feather lure bell toy"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/dog.house.jpg" alt="">
    <h3>Dog House</h3>
    <p class="cute">A house that cares about your dog's comfort</p>
    <p class="price">Price: 1800 DA</p>
    <button class="add-cart" data-product="Dog House">Add to Cart</button>
    <a href="form.php?product=Dog House"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/2 Pack Airtag.jpg" alt="">
    <h3>2 Pack Airtag</h3>
    <p class="cute">Your pet will never get lost</p>
    <p class="price">Price: 4200 DA</p>
    <button class="add-cart" data-product="2 Pack Airtag">Add to Cart</button>
    <a href="form.php?product=2 Pack Airtag"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/Bowl.jpg" alt="">
    <h3>Bowl</h3>
    <p class="cute">Your pet will love this bowl</p>
    <p class="price">Price: 1360 DA</p>
    <button class="add-cart" data-product="Bowl">Add to Cart</button>
    <a href="form.php?product=Bowl"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/Hamster Whee.jpg" alt="">
    <h3>Hamster Wheel</h3>
    <p class="cute">Make fun for the hamster</p>
    <p class="price">Price: 950 DA</p>
    <button class="add-cart" data-product="Hamster Wheel">Add to Cart</button>
    <a href="form.php?product=Hamster Wheel"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/hamster_bowl.jpg" alt="">
    <h3>Hamster Bowl</h3>
    <p class="cute">🐹 A comfortable and safe hamster bowl, ideal for everyday use</p>
    <p class="price">Price: 1450 DA</p>
    <button class="add-cart" data-product="Hamster Bowl">Add to Cart</button>
    <a href="form.php?product=Hamster Bowl"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/dogfood1.jpg" alt="">
    <h3>Dog Food</h3>
    <p class="cute">🐶 A balanced dog food that gives your dog energy and health every day</p>
    <p class="price">Price: 2300 DA</p>
    <button class="add-cart" data-product="Dog Food">Add to Cart</button>
    <a href="form.php?product=Dog Food"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/foodcat.jpg" alt="">
    <h3>Cat Food</h3>
    <p class="cute">🐱 High-quality cat food with a taste you'll love and the benefits you need</p>
    <p class="price">Price: 2222 DA</p>
    <button class="add-cart" data-product="Cat Food">Add to Cart</button>
    <a href="form.php?product=Cat Food"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/hamster.food.jpg" alt="">
    <h3>Hamster Food</h3>
    <p class="cute">🐹 Natural hamster food that supports activity and healthy digestion</p>
    <p class="price">Price: 1500 DA</p>
    <button class="add-cart" data-product="Hamster Food">Add to Cart</button>
    <a href="form.php?product=Hamster Food"><button>Order</button></a>
  </div>

  <div class="pet-card">
    <img src="products pic/rabbit.food.jpg" alt="">
    <h3>Rabbit Food</h3>
    <p class="cute">🐰 Nutritious rabbit food that keeps your rabbit healthy and energetic</p>
    <p class="price">Price: 1700 DA</p>
    <button class="add-cart" data-product="Rabbit Food">Add to Cart</button>
    <a href="form.php?product=Rabbit Food"><button>Order</button></a>
  </div>

</div>

<script>
$(document).ready(function(){

  $(".add-cart").click(function(){
    let product = $(this).data("product");
    $.post("cart.php", { product: product }, function(count){
      $("#cart-count").text(count);
      alert(product + " added to cart ✅");
    });
  });

  $("#view-cart").click(function(){
    $.get("cart.php", { action: "view" }, function(data){
    
      alert(data);
    });
  });

});
</script>


</script>

</body>
</html>


