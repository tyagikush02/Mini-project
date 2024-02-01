<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

echo '<script>
            function buyNow() {
            // Get the name of the selected pet
            let petName = document.getElementById("PETNAME").innerText;
            console.log("Selected pet name:", petName);
            switch (petName) {
            case "Meet Jerry":
            window.location.href = "https://buy.stripe.com/test_7sI5nW1Fa6Ew3bqcMM";
            break;
            case "Meet Tom":
            window.location.href = "https://buy.stripe.com/test_4gwdUsabG4wocM08wx";
            break;
            case "Meet Sheru":
            window.location.href = "https://buy.stripe.com/test_fZe8A8dnS8ME3bq4gj";
            break;
            case "Meet FLUFFY":
            window.location.href = "https://buy.stripe.com/test_eVabMk5Vqe6YeU828a";
            break;
            case "Meet Jassi":
            window.location.href = "https://buy.stripe.com/test_aEU4jS97Ce6YfYc6os";
            break;
            case "Meet Typsi":
            window.location.href = "https://buy.stripe.com/test_6oE5nWabG5AsfYc3ch";
            break;
            case "Meet Lily":
            window.location.href = "https://buy.stripe.com/test_cN27w42Je0g89zOdQW";
            break;
            case "Meet Coco":
            window.location.href = "https://buy.stripe.com/test_5kA17GabG4wo7rGcMT";
            break;
            case "Meet Bongo":
            window.location.href = "https://buy.stripe.com/test_4gwcQogA4fb26nC9AI";
            break;
            case "Meet Dave":
            window.location.href = "https://buy.stripe.com/test_7sI3fO1Fa8ME13i4gp";
            break;
            }
          }
            function addCart() {
                alert("Added To Cart");
                window.location.href = "addCart.php";
            }

            function show(card) {
              let newImg = document.getElementById("newImg");
              newImg.src = card.querySelector("img").src;
              let newName= document.getElementById("PETNAME");
              document.getElementById("PETNAME").innerText = card.querySelector("h3").innerText;

              // Retrieve the price of the selected pet
              let petPrice = card.getAttribute("data-price");

              // Set the price in the cart section
              let cartPrice = document.getElementById("cartPrice");
              cartPrice.innerText = "$" + petPrice;
    
              // Hide other cards
              let cards = document.querySelectorAll(".card");
              cards.forEach(function (otherCard) {
                  otherCard.style.display = "none";
              }); 

              let footers = document.querySelectorAll(".footer");
              footers.forEach(function(footer) {
                  footer.style.display = "none";
              });


              // Display the cart
              let cart = document.querySelector(".cart");
              cart.style.display = "flex";
              
          }

          function back() {
            // Reload the page to show all cards again
            location.reload();
          }
      </script>';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="welcome.css" />
    <script src="welcome.js" defer></script>
    <title>welcome page</title>
    <style>
    .bg-brown {
        background-color: brown !important;
    }
</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-brown" style="background-color:brown;">
  <a class="navbar-brand">Welcome Page &hearts;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>

    <div class="navbar-collapse collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! You can now Adopt a <span>Pet</span> Today</h3>
<hr>

</div>
    <div id="pets" style="flex-wrap:wrap;">
      <div class="card"onclick="show(this)" data-price="38">
        <img src="Images/dog.jpg" alt="jerry"  />
        <h3 name="Jerry">Meet Jerry</h3>
        <p>
          <b id="petname">Jerry</b> is a charming and friendly dog with a heart of gold, and he is
          looking for a loving home to call his own. He is a medium-sized mixed
          breed with soft, fluffy fur and soulful brown eyes that will melt your
          heart.
        </p>
      </div>
 
      <div class="card"onclick="show(this)" data-price="30">
        <img src="Images/cat.jpg" alt="tom"/>
        <h3>Meet Tom</h3>
        <p>
        <b id="petname">Tom</b> is a handsome and affectionate cat who is looking for his forever
          home. He is a medium-sized domestic shorthair with sleek black and
          white fur and striking green eyes that will capture your heart.
        </p>
      
      </div>
 
      <div class="card"onclick="show(this)"data-price="50">
        <img src="Images/Sheru.jpg" alt="jerry"     />
        <h3>Meet Sheru</h3>
        <p>
        <b id="petname">Sheru</b> is a charming and friendly tiger with a heart of gold, and he is
          looking for a loving home to call his own.If you are looking for a loyal and loving companion who will
          bring endless joy into your life, Jerry may be the perfect pet for
          you.
        </p>

      </div>
 
      <div class="card"onclick="show(this)"data-price="15">
        <img src="Images/fluffy.jpg" alt="jerry"    />
        <h3>Meet FLUFFY</h3>
        <p>
        <b id="petname">Fluffy</b> is a charming and friendly rabbit with a heart of gold, and he is
          looking for a loving home to call his own. He is a medium-sized mixed
          breed with soft, fluffy fur and soulful brown eyes that will melt your
          heart.So don't hesitate to bring this wonderful
          rabbit home today!
          <br><br>
        </p>

      </div>
 
      <div class="card"onclick="show(this)"data-price="13">
        <img src="Images/Jassi.jpg" alt="jerry"    />
        <h3>Meet Jassi</h3>
        <p>
        <b id="petname">Jassi</b> is a charming and friendly dog with a heart of gold, and he is
          looking for a loving home to call his own. He is a leabra
          breed with soft, fluffy fur and soulful brown eyes that will melt your
          heart.
          <br><br>
        </p>

      </div>
 
      <div class="card"onclick="show(this)"data-price="25">
        <img src="Images/Typsi.jpg" alt="jerry"    />
        <h3>Meet Typsi</h3>
        <p>
        <b id="petname">Typsi</b> is a charming and friendly dog with a heart of gold, and he is
          looking for a loving home to call his own. He is a medium-sized mixed
          breed with soft, fluffy fur and soulful brown eyes that will melt your
          heart.So don't hesitate to bring this wonderful
          pup home today!
          <br><br>
        </p>

      </div>
 
      <div class="card"onclick="show(this)"data-price="34">
        <img src="Images/lily.jpg" alt="jerry"    />
        <h3>Meet Lily</h3>
        <p>
        <b id="petname">Lily</b> is a handsome and affectionate cat who is looking for his forever
          home. He is a medium-sized domestic shorthair with sleek black and
          white fur and striking green eyes that will capture your heart. If you
          are looking for a loyal and loving companion who will provide you with
          endless joy and entertainment, lily may be the perfect pet for you.
        </p>
      </div>
 
      <div class="card"onclick="show(this)"data-price="23">
        <img src="Images/Coco.jpg" alt="jerry"    />
        <h3>Meet COCO</h3>
        <p>
        <b id="petname">Coco</b> is a charming and friendly rabbit with a heart of gold, and he is
          looking for a loving home to call his own.Adopting COCO means giving him a second chance at a happy life,
          and you will be rewarded with the unconditional love and companionship
          that only a rabbit can provide. So don't hesitate to bring this wonderful
          rabbit home today!
        </p>
      </div> 
      <div class="card"onclick="show(this)"data-price="34">
        <img src="Images/Bongo.jpg" alt="jerry"    />
        <h3>Meet Bongo</h3>
        <p>
        <b id="petname">Bongo</b> is cute and fluffy parrot.He is good in repeting the voice of person words.
        You can make him friend and adopt him.Means giving him a second chance.So don't hesitate to bring this wonderful
        parrot home today!
        </p>
      </div>
 
 
      <div class="card"onclick="show(this)"data-price="36">
        <img src="Images/Dave.jpg" alt="jerry"    />
        <h3>Meet Dave</h3>
        <p>
        <b id="petname">Dave</b> is a new born peigon.But accidently her mother died due to illness.
          Now she is alone.She required someone who can give love and care.So don't hesitate to bring this wonderful
          peigon home today!
          <br><br>
        </p>
      </div> 
  </div>


    <!-- cart -->

    <div class="cart"style="display:flex;justify-content: center;display:none;">
        <img id="newImg" src="" alt="" width=35%>
          <div class="cartText"style="padding: 22px;margin-top: 22px;">
              <h1>Offer : Pet Shop <br>Now</h1>
              <h2>Special Price</h2>
              <h2 id="PETNAME" style="color:black; font-weight:bold;"></h2>
              <h2 id="cartPrice">$38</h2>
              <p>GIVE THEM CHANCE TO BE YOUR FAMILY MEMBER</p>
              <div class="button-container" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="btn">
                <button onclick="buyNow()">Buy Now</button>
            </div>
            <button class="back" onclick="back()">Back</button>
        </div>
          </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
  <footer class="footer" style="bottom: 0; width: 100%; background-color: #343a40; color: white; text-align: center;">
    <p style="margin-bottom: 0;">Copyright &copy; 2024 All rights reserved by Kush and Ayush Inc.</p>
</footer>
</html>
