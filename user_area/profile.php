<!--connect file -->
<?php  
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!--!bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body Styling */
    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg,rgba(63, 186, 61, 0.78),rgb(187, 177, 239)); /* Gradient background */
      color: #fff;
      overflow-x: hidden;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    /* Logo Styling */
    .logo {
    width: 60px;
    height: 60px; /* Ensure it’s a square to make it circular */
    display: block;
   
    margin: 10px 10px 10px 10px;
    transition: transform 0.4s ease, filter 0.4s ease;
    filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.8));
    border-radius: 50%; /* Makes the element round */
    object-fit: cover; /* Ensures the image fits well inside the circle */
}

.logo:hover {
    transform: scale(1.2);
    filter: drop-shadow(0 8px 10px rgba(0, 0, 0, 0.6));
}
    @keyframes zoomIn {
      0% {
        transform: scale(0.5);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Welcome Text */
    .welcome {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 2em;
      font-weight: bold;
      text-align: center;
      color: #f8f9fa;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
      animation: slideInFromLeft 1s ease forwards;
    }

    @keyframes slideInFromLeft {
      from {
        left: -100%;
        opacity: 0;
      }
      to {
        left: 50%;
        opacity: 1;
      }
    }

    /* Profile Image Styling */
    .profile_img {
      width: 90%;
      margin: auto;
      display: block;
      border-radius: 20px;
      object-fit: contain;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .profile_img:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
    }

    /* Edit Image Icon */
    .edit_image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: contain;
      position: absolute;
      top: 20px;
      right: 20px;
      cursor: pointer;
      transition: transform 0.4s ease;
    }

    .edit_image:hover {
      transform: rotate(360deg);
    }

    /* Core Section */
    .cor {
      margin-top: 20px;
      text-align: center;
      line-height: 2em;
      font-size: 1.5em;
      animation: fadeIn 1.5s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    /* Advanced Button Styling */
    .tech-btn {
      background: linear-gradient(45deg, #ff7e5f, #feb47b);
      color: #fff;
      padding: 15px 30px;
      border: none;
      border-radius: 50px;
      font-size: 1.2em;
      font-weight: bold;
      margin: 20px auto;
      display: inline-block;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .tech-btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .welcome {
        font-size: 1.5em;
      }
      .cor {
        font-size: 1.2em;
      }
    }

    footer {
    background: #27ae60; /* Dark green */
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-top: 20px;
}

footer p {
    font-size: 1rem;
    margin: 0;
}

footer a {
    color:rgb(50, 249, 36); /* Highlight links in a soft yellow */
    text-decoration: none;
    font-weight: bold;
}

footer a:hover {
    text-decoration: underline;
}
.deep-green-text {
    color: #006400; /* Deep Green */
}



/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Navbar Styling */
.navbar {
  background-color: #28a745; /* A rich green color for the navbar background */
  padding:  0rem 1rem; /* Adds spacing inside the navbar */
  font-family: 'Arial', sans-serif; /* Professional font choice */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.8); /* Adds a slight shadow for depth */
}



/* Navbar Links */
.navbar-nav .nav-item .nav-link {
  color: #fff; /* White text for high contrast */
  padding: 0.5rem 1rem; /* Adds spacing around links */
  text-transform: uppercase; /* Makes the links look bold and clear */
  transition: color 0.3s, background-color 0.3s; /* Smooth hover effects */
}

.navbar-nav .nav-item .nav-link:hover {
  color: #28a745; /* Matches the green theme */
  background-color:  #D3D3D3; /* White background for a hover effect */
  border-radius: 5px; /* Slight rounding for hover effect */
}

/* Active Link */
.navbar-nav .nav-item.active .nav-link {
  font-weight: bold; /* Highlights the active link */
  
}

/* Cart Icon */
.navbar-nav .fa-cart-shopping {
  font-size: 18px; /* Slightly larger for emphasis */
  margin-right: 5px;
  color: #fff;
}

/* Price Display */
.navbar-nav .nav-item:last-child .nav-link {
  font-size: 14px;
  font-weight: bold;
  color: #f9f9f9; /* Light text for better contrast */
}

/* Form Styling */
.form-inline {
  display: flex;
  align-items: center;
  gap: 0.5rem; /* Space between form elements */
}

.form-inline .form-control {
  border-radius: 20px; /* Makes input fields round */
  border: 1px solid #ccc; /* Subtle border for input */
}

.form-inline .btn {
  border-radius: 20px; /* Consistent with input fields */
  border: none;
  background-color: #fff;
  color: #28a745; /* Green text for theme consistency */
  font-weight: bold;
  transition: background-color 0.3s, color 0.3s;
}

.form-inline .btn:hover {
  background-color: #28a745; /* Matches theme */
  color: #fff; /* White text on hover */
}

/* Responsive Design */
@media (max-width: 768px) {
  .navbar {
    flex-wrap: wrap; /* Adjust layout for smaller screens */
  }
  .navbar-nav {
    flex-direction: column; /* Stack links vertically */
    text-align: center; /* Center-align text */
  }
  .navbar-toggler {
    margin-left: auto; /* Align the toggler to the right */
  }
  .form-inline {
    width: 100%; /* Full width for search form on smaller screens */
    justify-content: center; /* Center-align form */
  }
}
.navbar .logo {
  max-height: 60px; /* Ensures the logo is proportionate */
  max-width: 60px; /*
  margin-right: 25px; /* Adds spacing between the logo and the menu */
}





   </style>
</head>
<body>
<!--navbar -->
<div class="container-fluid p-0">
    <!--first child -->

    <nav class="navbar navbar-expand-lg navbar-light bg-success"> <!--bg-info for doing colors look -->
<img src="../images/pure1.jpg" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent"><!-- if i change id or data target it will not give any output -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Account</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../offer.php">Offers</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../locations.php">Our Branches</a></a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Contact</a></a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>/-</a>
      </li>      
      
    </ul>
    <!--<form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
</form>-->

  </div>
  </nav>

<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg alert" style="background-color: #7B68EE; height: 50px; padding: 5px 0;">
  <ul class="navbar-nav me-auto font-weight-bold">
 
  <?php 

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link 'btn btn-info' href='#'>Welcome Guest</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'><h1 class='welcome font-weight-bold' style='color:yellow'>Welcome To Our Nutrition World ".$_SESSION['username']."</h1></a>
</li>";
}

     /* if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='../users_area/logout.php'>Logout</a>
      </li>";
      }
*/

      ?>



  </ul>

</nav>

<!-- third child -->



<!--  fourth child -->
<div class="row">

<div class="col-md-2">
<ul class="navbar-nav bg-secondary text-center" style="height:100vh">
<li class="nav-item  bg-info">
        <a class="nav-link text-light" href="#"><h4 class="cor">Your Profile</h4></a>
      </li>
      
       <?php

      $username=$_SESSION['username'];
      $user_image="Select * from `user_table` where username='$username'";
      $user_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
      </li>";

       ?>



      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?balance_check">Balance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?Order_track">Order Track</a>
      </li>

     

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?review_rating">Review & Rating</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?about_us">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?privacy_policy">Privacy Policy</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?contact_us">Contact Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">Logout</a>
      </li>

</ul>

</div>

<div  class="col-md-10 text-center">
  <?php 
  if(isset($_GET['edit_account'])){
    include('edit_account.php');
  }
 
  else if(isset($_GET['my_orders'])){
    include('user_orders.php');
  }
 
  else if(isset($_GET['delete_account'])){
    include('delete_account.php');
  }
  else if(isset($_GET['about_us'])){
    include('about_us.php');
  }
  else if(isset($_GET['privacy_policy'])){
    include('privacy_policy.php');
  }
  else if(isset($_GET['contact_us'])){
    include('contact_us.php');
  }
  else if(isset($_GET['balance_check'])){
    include('balance_check.php');
  }
  else if(isset($_GET['Order_track'])){
    include('Order_track.php');
  }
  else if(isset($_GET['share_exp'])){
    include('share_exp.php');
  }
  else if(isset($_GET['review_rating'])){
    include('review_rating.php');
  }
 
  
  else{
    get_user_order_details(); 
  }
 
  ?>
  

</div>

    </div>


<!-- last child -->
<!-- include foter-->
<footer>
  <div class="container">
    <div class="footer-links">
      <a href="#">About Us</a>
      <a href="#">Contact</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
    </div>
    <p>&copy; 2025 Your Food Delivery Service. All Rights Reserved.</p>
  </div>
</footer>



</div>


<!-- Bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Voice Assistant with KNN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .voice-assistant-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #000428, #004e92);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .voice-assistant-btn:hover {
            background-color: #218838;
            transform: scale(1.1);
        }

        .voice-assistant-btn:active {
            background-color: #1e7e34;
            transform: scale(1);
        }

        #assistant-popup {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 250px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        #assistant-popup input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #assistant-popup button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #assistant-popup button:hover {
            background-color: #218838;
        }

        #assistant-popup .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 18px;
            cursor: pointer;
            color: #888;
        }

        .stop-btn {
            background-color: #dc3545;
            padding: 6px 16px;
            font-size: 12px;
            border-radius: 50px;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }

        .stop-btn:hover {
            background-color: #c82333;
            transform: scale(1.1);
        }

        .stop-btn:active {
            background-color: #bd2130;
            transform: scale(1);
        }
        .order-image {
    width: 60px;
    height: 60px; /* Ensure it’s a square to make it circular */
    display: block;
    margin: 10px 6px 8px 420px;
    transition: transform 0.4s ease, filter 0.4s ease;
    filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 1));
    border-radius: 50%; /* Makes the element round */
    object-fit: cover; /* Ensures the image fits well inside the circle */
}

.order-image:hover {
    transform: scale(1.2);
    filter: drop-shadow(0 8px 10px rgba(0, 0, 0, 0.3));
}
    </style>
</head>
<body>
    <button class="voice-assistant-btn" onclick="toggleAssistantPopup()">🤖</button>
    <div id="assistant-popup">
        <div class="close-btn" onclick="closeAssistantPopup()">×</div>
        <h3>AI Assistant</h3>
        <input type="text" id="assistant-input" placeholder="Ask me something..." />
        <button onclick="processInput()">Ask</button>
        <button class="stop-btn" onclick="stopListening()">Stop</button>
        <div id="response"></div>
    </div>

    <script>
        let assistantPopup = document.getElementById("assistant-popup");
        let assistantInput = document.getElementById("assistant-input");
        let responseDiv = document.getElementById("response");
    
        let synth = window.speechSynthesis;
        let voices = [];
    
        function populateVoiceList() {
            voices = synth.getVoices();
            let femaleVoice = voices.find(voice => voice.name.toLowerCase().includes('female'));
            synth.voice = femaleVoice || voices[0];
        }
    
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = populateVoiceList;
        }
    
        function toggleAssistantPopup() {
            assistantPopup.style.display = assistantPopup.style.display === "block" ? "none" : "block";
            startListening();
        }
    
        function closeAssistantPopup() {
            assistantPopup.style.display = "none";
            stopListening();
        }
    
        // Friendly conversation dataset
        const conversationDataset = [
            { input: "hello", response: "Hello! How can I assist you today?" },
            { input: "how are you", response: "I'm just a program, but I'm feeling great! How about you?" },
            { input: "what's your name", response: "I'm your friendly food delivery assistant!" },
            { input: "thank you", response: "You're welcome! Happy to help!" },
            { input: "bye", response: "Goodbye! Have a great day!" },
            // Add more friendly responses here
        ];
    
        // Commands for redirection
        const commandDataset = [
            { input: "go to home page", response: "Redirecting to the home page.", url: "../display_all.php" },
            { input: "can you show me some offers", response: "Why not sir? Here are some exciting offers we've secured just for you.", url: "../offer.php" },
            { input: "go to my profile page", response: "Sure sir, Redirecting to your profile page.", url: "users_area/profile.php" },
            { input: "show my orders", response: "Taking you to your orders page.", url: "./profile.php?my_orders" },
            { input: "do you have mango? show me some variety if you have", response: "Absolutely! We're stocked with a variety of delicious mangoes. You can find Alphonso, Kesar, and Totapuri mangoes in our inventory.", url: "../products_details.php?product_id=50" },
            { input: "i want orange, do you have? show me some variety if you have", response: "Indeed, we have oranges! We offer several varieties, including Valencia, Navel, and Blood oranges. You can learn more about each type here", url: "../products_details.php?product_id=49" },
            { input: "we need egg", response: "Unfortunately, we don't have any eggs in stock at this time. However, we will be restocking soon and will let you know when they are back in stock", url: "../sorry.html" },
            { input: "let me see the cart", response: "sure sir,here is your cart page", url: "../cart.php" },
            { input: "tell me about my best dishes", response: "It seems like  Egg, Mango, and salad are some of your go-to dishes. Feel free to order them again, or I can suggest some other delicious options you might like", url: "../best_dish_hill_climbing.php" },
        ];
    
        // Main function to process input
        function processInput() {
            let query = assistantInput.value.toLowerCase().trim();
            if (query) {
                let command = knnClassifier(query, [...conversationDataset, ...commandDataset]);
                if (command.url) {
                    speakAnswer(command.response);
                    redirectToPage(command.url);
                } else {
                    speakAnswer(command.response);
                }
                assistantInput.value = "";
            } else {
                responseDiv.innerText = "Please ask something!";
            }
        }
    
        // KNN Algorithm for classification
        function knnClassifier(input, dataset) {
            const inputVector = input.split(" ");
            let closestDistance = Infinity;
            let predictedCommand = { response: "I don't understand the command." };
    
            dataset.forEach(item => {
                let commandVector = item.input.split(" ");
                let distance = cosineSimilarity(inputVector, commandVector);
                if (distance < closestDistance) {
                    closestDistance = distance;
                    predictedCommand = item;
                }
            });
    
            return predictedCommand;
        }
    
        function cosineSimilarity(vecA, vecB) {
            let intersection = 0;
            let normA = 0;
            let normB = 0;
            vecA.forEach(wordA => {
                let countA = vecA.filter(x => x === wordA).length;
                normA += Math.pow(countA, 2);
                if (vecB.includes(wordA)) {
                    intersection += countA * vecB.filter(x => x === wordA).length;
                }
            });
            vecB.forEach(wordB => {
                let countB = vecB.filter(x => x === wordB).length;
                normB += Math.pow(countB, 2);
            });
            return 1 - (intersection / (Math.sqrt(normA) * Math.sqrt(normB)));
        }
    
        function redirectToPage(url) {
            responseDiv.innerText = `Redirecting to ${url}`;
            window.location.href = url;
        }
    
        function speakAnswer(answer) {
            let speech = new SpeechSynthesisUtterance();
            speech.text = answer;
            synth.speak(speech);
        }
    
        let recognition;
        let isListening = false;
    
        function startListening() {
            if (!("webkitSpeechRecognition" in window)) {
                alert("Sorry, your browser doesn't support speech recognition.");
                return;
            }
    
            recognition = new webkitSpeechRecognition();
            recognition.lang = "en-US";
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;
    
            recognition.onstart = function () {
                isListening = true;
                responseDiv.innerText = "Listening...";
            };
    
            recognition.onresult = function (event) {
                let result = event.results[0][0].transcript.toLowerCase();
                assistantInput.value = result;
                processInput();
            };
    
            recognition.onerror = function (event) {
                responseDiv.innerText = "Error occurred: " + event.error;
            };
    
            recognition.start();
        }
    
        function stopListening() {
            if (recognition && isListening) {
                recognition.stop();
                isListening = false;
                responseDiv.innerText = "Stopped listening.";
            }
            if (synth.speaking) {
                synth.cancel();
            }
        }
    </script>
    
</body>
</html>
