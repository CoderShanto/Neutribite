<!--connect file -->
<?php  
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriBite Landing Page</title>
    <!--!bootstrap css link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="3D_index.css">
    <style>


    /* Global Styles */
    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background: linear-gradient(120deg, #f4f4f9, #d6d6e7);
    color: #333;
    scroll-behavior: smooth;
}

.back{  
    background-image: url('images/26.jpg');
    background-size: cover; /* Ensures the image covers the entire container */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents tiling */
    background-attachment: fixed; /* Optional parallax effect */
    z-index: 2; /* Keeps the banner in the background */
    background-color:rgb(250, 250, 250); /* Fallback color to test if background image is loading */
    width: 100%; /* Ensures the container spans the full width */


}



/* Logo Styling */
.logo {
    width: 50px;
    height: 50px; /* Ensure it’s a square to make it circular */
    display: block;
    margin: 10px 6px 8px 8px;
    transition: transform 0.4s ease, filter 0.4s ease;
    filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.8));
    border-radius: 50%; /* Makes the element round */
    object-fit: cover; /* Ensures the image fits well inside the circle */
}

.logo:hover {
    transform: scale(1.2);
    filter: drop-shadow(0 8px 10px rgba(0, 0, 0, 0.3));
}

/* Hero Section */
.hero {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 100vh;
    background: linear-gradient(135deg, #6ab04c, #22a6b3); /* Natural tones */
    color: #fff;
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
    animation: fadeInDown 1.5s ease-in-out;
}

.hero p {
    font-size: 1.25rem;
    margin-bottom: 30px;
    animation: fadeIn 2s ease-in-out;
}

.hero .cta {
    padding: 15px 30px;
    background-color: #2ecc71; /* Green for natural products */
    color: #fff;
    font-size: 1.2rem;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    animation: bounce 3s infinite ease-in-out;
}

.hero .cta:hover {
    background-color: #27ae60; /* Darker green for hover effect */
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Content Section */
.content-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 50px 10%;
    background: #f9f9f9;
}

.content-card {
    background: #e9f7ef; /* Light green for a natural feel */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.content-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.content-card h3 {
    font-size: 1.5rem;
    color: #27ae60; /* Green for titles */
    margin-bottom: 15px;
}

.content-card p {
    font-size: 1rem;
    color: #555;
    line-height: 1.8em;
}

/* Video Section */
.video-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 60px 0;
    padding: 0 10%;
}

.video-container video {
    width: 90%;
    max-width: 800px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease-in-out;
}

.video-container video:hover {
    transform: scale(1.05);
}

/* Footer */
footer {
    background: #27ae60; /* Dark green */
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-top: 0px;
}

footer p {
    font-size: 1rem;
    margin: 0;
}

footer a {
    color:rgb(255, 255, 255); /* Highlight links in a soft yellow */
    text-decoration: none;
    font-weight: bold;
}

footer a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .content-card {
        padding: 15px;
    }
}
/* Testimonials Section */
.testimonials {
  background-color: #f1f1f1;
  padding: 60px 20px; /* Spacious padding */
  position: relative;
  overflow: hidden;
}

.testimonials h2 {
  text-align: center;
  font-size: 2.5rem;
  margin-bottom: 40px;
  color: #333;
  font-weight: bold;
  animation: fadeInDown 1.5s ease-out;
}

/* Container for each testimonial */
.testimonial {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  max-width: 300px;
  margin: 0 auto 40px;
  background: linear-gradient(135deg, #ffffff, #f9f9f9);
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15); /* Elevated shadow for card effect */
  border-radius: 15px;
  padding: 20px;
  overflow: hidden;
  transform: scale(1);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.testimonial:hover {
  transform: scale(1.05);
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.25); /* Enhance shadow on hover */
}

/* Image styling */
.testimonial-image {
  margin-bottom: 20px;
  animation: zoomIn 1.2s ease-out;
}

.testimonial-image img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid #28a745; /* Green border for emphasis */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.testimonial:hover .testimonial-image img {
  transform: rotate(360deg); /* Smooth rotation on hover */
}

/* Text inside testimonial */
.testimonial p {
  color: #555;
  font-size: 1.1rem;
  line-height: 1.5;
  margin: 0;
  animation: fadeIn 1.2s ease;
}

.testimonial p strong {
  color: #28a745; /* Highlight name in green */
  font-weight: bold;
  animation: bounceHighlight 2s infinite;
}

/* Background animation for section */
.testimonials::before {
  content: '';
  position: absolute;
  top: -100px;
  left: -100px;
  width: 300px;
  height: 300px;
  background: rgba(40, 167, 69, 0.2); /* Soft green circle */
  border-radius: 50%;
  animation: floating 6s ease-in-out infinite;
  z-index: 1;
}

.testimonials::after {
  content: '';
  position: absolute;
  bottom: -100px;
  right: -100px;
  width: 400px;
  height: 400px;
  background: rgba(40, 167, 69, 0.1); /* Larger green circle */
  border-radius: 50%;
  animation: floating 8s ease-in-out infinite reverse;
  z-index: 1;
}

/* Responsive Layout */
@media screen and (min-width: 768px) {
  .testimonials h2 {
    
  }
  .testimonial {
    max-width: 400px;
    margin: 20px auto;
  }
  .testimonial-image img {
    width: 200px;
    height: 200px;
  }
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes zoomIn {
  0% {
    transform: scale(0.8);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes bounceHighlight {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
}

@keyframes floating {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(20px);
  }
}

/* General Navigation Styling */
.nav-item {
    list-style: none;
    margin: 0 10px;
}

/* Button Styling */
.btn {
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
    display: inline-block;
}

/* Login Button Styling */
.login-btn {
    background-color: #4CAF50; /* Green */
    color: #fff;
    border: 2px solid #4CAF50;
    margin-top: 12px;
}

.login-btn:hover {
    background-color: #fff;
    color: #4CAF50;
    border: 2px solid #4CAF50;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Logout Button Styling */
.logout-btn {
    background-color: #f44336; /* Red */
    color: #fff;
    border: 2px solid #f44336;
}

.logout-btn:hover {
    background-color: #fff;
    color: #f44336;
    border: 2px solid #f44336;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}


/* Additional for responsive design */
@media screen and (max-width: 768px) {
    .btn {
        font-size: 14px;
        padding: 8px 16px;
    }
}


/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Navbar Styling */
.navbar {
  background-color:transparent; /* A rich green color for the navbar background */
  padding:  0rem 1rem; /* Adds spacing inside the navbar */
  font-family: 'Arial', sans-serif; /* Professional font choice */
   /* Adds a slight shadow for depth */
}

/* Logo Styling */
.navbar .logo {
  max-height: 50px; /* Ensures the logo is proportionate */
  margin-right: 15px; /* Adds spacing between the logo and the menu */
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
  background-color:rgb(0, 0, 0); /* White background for a hover effect */
  border-radius: 8px; /* Slight rounding for hover effect */
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

/* Blog Section Styling */
.blogs {
  padding: 60px 20px;
  background-color: #f9f9f9;
  text-align: center;
}

.blogs h2 {
  font-size: 3rem;
  color: #333;
  margin-bottom: 40px;
  animation: fadeInDown 1.5s ease-out;
}

/* Blog Container */
.blog-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

/* Individual Blog Card */
.blog-card {
  background: #fff;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
  overflow: hidden;
  max-width: 350px;
  text-align: left;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}

.blog-card:hover {
  transform: scale(1.05);
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.25);
}

/* Blog Card Image */
.blog-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.blog-card:hover img {
  transform: scale(1.1);
}

/* Blog Card Content */
.blog-content {
  padding: 20px;
}

.blog-content h3 {
  font-size: 1.5rem;
  color: #28a745;
  margin-bottom: 10px;
  animation: fadeIn 1.5s ease-out;
}

.blog-content p {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

.read-more {
  color: #fff;
  background: #28a745;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 20px;
  font-size: 1rem;
  font-weight: bold;
  transition: background-color 0.3s ease;
  display: inline-block;
}

.read-more:hover {
  background: #1e7e34;
  color: black;
}

/* Responsive Design */
@media (max-width: 768px) {
  .blog-container {
    flex-direction: column;
    align-items: center;
  }
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
/* General styles for About Us Section */
.about-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #fff;
  padding: 60px 20px;
  border-radius: 15px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
  margin: 40px 0;
  gap: 20px;
  overflow: hidden;
  animation: fadeIn 1.5s ease-in-out;
}

/* Text Content */
.about-content {
  flex: 1;
  max-width: 600px;
}

.about-title {
  font-size: 36px;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
  text-transform: capitalize;
  position: relative;
}

.about-title::after {
  content: '';
  width: 60px;
  height: 4px;
  background-color: #ff6b6b;
  position: absolute;
  bottom: -8px;
  left: 0;
  border-radius: 2px;
  animation: growLine 1s ease-in-out;
}

.about-text {
  font-size: 18px;
  line-height: 1.8;
  color: #555;
  margin-bottom: 30px;
  animation: slideIn 1.2s ease-in-out;
}

.about-button {
  padding: 12px 30px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  background-color: #ff6b6b;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.about-button:hover {
  background-color: #e05555;
  transform: scale(1.05);
}

/* Image Content */
.about-image {
  flex: 1;
  text-align: center;
}

.about-image img {
  width: 100%;
  max-width: 500px;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.8);
  transform: scale(1);
  transition: transform 0.3s ease;
}

.about-image img:hover {
  transform: scale(1.05);
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideIn {
  0% {
    opacity: 0;
    transform: translateX(-20px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes growLine {
  0% {
    width: 0;
  }
  100% {
    width: 60px;
  }
}
/* General styles for Our Goal Section */
.goal-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f8f9fa;
  padding: 60px 20px;
  border-radius: 15px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
  margin: 40px 0;
  gap: 20px;
  overflow: hidden;
  animation: fadeIn 1.5s ease-in-out;
}

/* Text Content */
.goal-content {
  flex: 1;
  max-width: 600px;
  animation: slideInLeft 1.5s ease-in-out;
}

.goal-title {
  font-size: 36px;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
  position: relative;
}

.goal-title::after {
  content: '';
  width: 80px;
  height: 4px;
  background-color: #28a745;
  position: absolute;
  bottom: -8px;
  left: 0;
  border-radius: 2px;
}

.goal-text {
  font-size: 18px;
  line-height: 1.8;
  color: #555;
  margin-bottom: 30px;
}

.goal-points {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.goal-point {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #ffffff;
  padding: 15px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.goal-point:hover {
  transform: translateY(-5px);
  background-color: #e9f7ea;
}

.goal-icon {
  font-size: 24px;
  color: #28a745;
}

/* Image Content */
.goal-image {
  flex: 1;
  text-align: center;
  animation: slideInRight 1.5s ease-in-out;
}

.goal-image img {
  width: 100%;
  max-width: 500px;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.8);
}
.goal-image img {
  transition: transform 0.3s ease-in-out;
}

.goal-image img:hover {
  transform: scale(1.05);
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  0% {
    opacity: 0;
    transform: translateX(-30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  0% {
    opacity: 0;
    transform: translateX(30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}
/* General styles for Why Choose Us Section */
.choose-us-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #ffffff;
  padding: 60px 20px;
  border-radius: 15px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
  margin: 40px 0;
  gap: 20px;
  overflow: hidden;
  animation: fadeIn 1.5s ease-in-out;
}

/* Text Content */
.choose-us-content {
  flex: 1;
  max-width: 600px;
  animation: slideInLeft 1.5s ease-in-out;
}

.choose-us-title {
  font-size: 36px;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
  position: relative;
}

.choose-us-title::after {
  content: '';
  width: 80px;
  height: 4px;
  background-color: #ff7f50;
  position: absolute;
  bottom: -8px;
  left: 0;
  border-radius: 2px;
}

.choose-us-text {
  font-size: 18px;
  line-height: 1.8;
  color: #555;
  margin-bottom: 30px;
}

.choose-us-points {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.choose-us-point {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #f9f9f9;
  padding: 15px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.choose-us-point:hover {
  transform: translateY(-5px);
  background-color: #fff8e1;
}

.choose-us-icon {
  font-size: 24px;
  color: #ff7f50;
}

/* Image Content */
.choose-us-image {
  flex: 1;
  text-align: center;
  animation: slideInRight 1.5s ease-in-out;
}

.choose-us-image img {
  width: 100%;
  max-width: 500px;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.8);
}
.choose-us-image img {
  transition: transform 0.3s ease-in-out;
}

.choose-us-image img:hover {
  transform: scale(1.05);
}
.text-center{
  position: relative;
  width: 100%;
  overflow: hidden;
}



 .texth3{
  color: white;
  font-weight: 500;
  letter-spacing: 0.1em;
  text-shadow:0 0 10px #2ecc71 ,
              0 0 20px #2ecc71 ,
              0 0 40px #2ecc71 ,
              0 0 80px #2ecc71 ,
              0 0 120px #2ecc71 ;
              animation: scroll 20s linear infinite;
              max-width: 100%;
  mask-image: linear-gradient(
    to right,
    rgba(0, 0, 0, 0) 0%,   /* Start fully transparent at 0% */
    rgba(0, 0, 0, 1) 10%,  /* Fully visible at 10% */
    rgba(0, 0, 0, 1) 90%,  /* Fully visible until 90% */
    rgba(0, 0, 0, 0) 100%  /* End fully transparent at 100% */
  );
  -webkit-mask-image: linear-gradient(
    to right,
    rgba(0, 0, 0, 0) 0%,   /* Start fully transparent at 0% */
    rgba(0, 0, 0, 1) 10%,  /* Fully visible at 10% */
    rgba(0, 0, 0, 1) 90%,  /* Fully visible until 90% */
    rgba(0, 0, 0, 0) 100%  /* End fully transparent at 100% */
  );
}
@keyframes scroll{
  0%{
    transform: translateX(-50%);
  }
  100%{
    transform: translateX(+50%);
  }
}
.text-center::after {
  content: '';
  position: absolute;
  top: 0;
  left: 50%; /* Start mask after 70% width */
  width: 50%; /* Remaining area */
  height: 100%;
  background: transparent; /* Same as the background color of the container */
  pointer-events: none; /* Ensure it doesn't block interaction */
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  0% {
    opacity: 0;
    transform: translateX(-30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  0% {
    opacity: 0;
    transform: translateX(30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}



   </style>
</head>
<body>
  
<!--navbar -->
<div class="container-fluid p-0">
    <!--first child -->

    <nav class="navbar navbar-expand-lg navbar-light bg-success"> <!--bg-info for doing colors look -->
<img src="./images/pure1.jpg" alt="" class="logo">
<!--<video width="320" height="240" controls>
  <source src="./images/log.mp4" type="video/mp4">
  
  Your browser does not support the video tag.
</video>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent"><!-- if i change id or data target it will not give any output -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <!--<li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a></a>
      </li>-->

    
       <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li>";


}else{
    echo "<li class='nav-item'>
  <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
</li>";
}

      ?>


      <li class="nav-item">
        <a class="nav-link" href="locations.php">Our Branches</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>/-</a>
      </li>    

 
      <!--<li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
      </li>-->
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search your food" aria-label="Search" name="search_data">
    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
</form>

  </div>
  </nav>

<!-- calling cart function -->
<?php
cart();
?>

<!-- Second child -->
<nav class="navbar navbar-expand-lg alert" style="background-color: #6ab04c, #22a6b3;">
<div class="text-center">
    <!-- Your content goes here -->
    <h3 class="texth3" style="text-align: center; margin-top: 15px">
    ❤️ Your health is our priority, and NutriBite is here to make it fun and exciting!
</h3>


</div>

    <div class="navbar-collapse justify-content-end"> <!-- Align items to the right -->
        <ul class="navbar-nav font-weight-bold text-center">
            <?php 
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item' >
                            <h3 style='color: green; margin-top: 10px; font-weight: bold;><a class='nav-link' href='#'>Welcome Guest</a></h3>
                          </li>";
                } else {
                    echo "<li class='nav-item'>
                            <h3 style=''color: green; margin-top: 10px; font-weight: bold;><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></h3>
                          </li>";
                }

                
if (!isset($_SESSION['username'])) {
    echo "<li class='nav-item'>
            <a class='nav-link btn login-btn' href='human_check.html'>Login</a>
          </li>";
} else {
    echo "<li class='nav-item'>
            <a class='nav-link btn logout-btn' href='./users_area/logout.php'>Logout</a>
          </li>";
}

            ?>
      
        </ul>
    </div>
</nav>
<div class="back">
<div class="banner">
        <div class="slider" style="--quantity: 10">
            <div class="item" style="--position: 1"><img src="images/11.jpg" alt=""></div>
            <!--<div class="item" style="--position: 3"><video src="images/logo.mp4" autoplay muted loop></video></div>--> 
            <div class="item" style="--position: 2"><img src="images/12.jpg" alt=""></div>
            <div class="item" style="--position: 3"><img src="images/last2.jpg" alt=""></div>
            <div class="item" style="--position: 4"><img src="images/14.jpg" alt=""></div>
            <div class="item" style="--position: 5"><img src="images/15.jpg" alt=""></div>
            <div class="item" style="--position: 6"><img src="images/last.jpg" alt=""></div>
            <div class="item" style="--position: 7"><img src="images/17.jpg" alt=""></div>
            <div class="item" style="--position: 8"><img src="images/18.jpg" alt=""></div>
            <div class="item" style="--position: 9"><img src="images/19.jpg" alt=""></div>
            <div class="item" style="--position: 10"><img src="images/20.jpg" alt=""></div>
          
        </div>
    </div>
    </div>

<!-- third child -->



<!--  fourth child -->

<!-- 5th child -->

<div class="about-section">
  <div class="about-content">
    <h2 class="about-title">About Us</h2>
    <p class="about-text">
      Welcome to our nutrition paradise! We are passionate about bringing you the best culinary experiences from around the world. 
      From mouth-watering recipes to food trends, our platform is a celebration of flavors and creativity. Join us on this delicious journey!
    </p>
    <button class="about-button">Learn More</button>
  </div>
  <div class="about-image">
    <img src="./images/about.jpg" alt="About Us Image">
  </div>
</div>

<!--5.5th child-->

<div class="goal-section">
  <div class="goal-content">
    <h2 class="goal-title">Our Goal</h2>
    <p class="goal-text">
      At NutritionBite, our goal is to inspire healthier lifestyles by providing 
      accessible, reliable, and practical information about nutrition and wellness. 
      We aim to create a world where everyone has the tools and knowledge to make 
      better food choices and lead fulfilling, healthy lives.
    </p>
    <div class="goal-points">
      <div class="goal-point">
        <i class="fas fa-apple-alt goal-icon"></i>
        <p>Promote healthy eating habits</p>
      </div>
      <div class="goal-point">
        <i class="fas fa-heart goal-icon"></i>
        <p>Improve overall well-being</p>
      </div>
      <div class="goal-point">
        <i class="fas fa-leaf goal-icon"></i>
        <p>Encourage sustainable food choices</p>
      </div>
    </div>
  </div>
  <div class="goal-image">
    <img src="./images/prof9.jpg" alt="Our Goal Image">
  </div>
</div>

<!--5.6th child-->

<div class="choose-us-section">
  <div class="choose-us-content">
    <h2 class="choose-us-title">Why Choose Us</h2>
    <p class="choose-us-text">
      At NutritionBite, we are committed to delivering the best nutritional guidance 
      and healthy living resources. Here's why we are the perfect choice for you:
    </p>
    <div class="choose-us-points">
      <div class="choose-us-point">
        <i class="fas fa-seedling choose-us-icon"></i>
        <p>Expert-verified nutritional advice</p>
      </div>
      <div class="choose-us-point">
        <i class="fas fa-carrot choose-us-icon"></i>
        <p>Personalized meal plans</p>
      </div>
      <div class="choose-us-point">
        <i class="fas fa-users choose-us-icon"></i>
        <p>A community-driven approach</p>
      </div>
    </div>
  </div>
  <div class="choose-us-image">
    <img src="./images/why2.jpg" alt="Why Choose Us Image">
  </div>
</div>



<!--6th child-->

<!-- Testimonials Section -->
<section class="testimonials">
  <div class="container">
    <h2>What Our Customers Are Saying</h2>
    
    <div class="testimonial">
      <div class="testimonial-image">
        <img src="images/lending.jpg" alt="John D." />
      </div>
      <p>"Best food delivery service ever! Super quick and always fresh." - John D.</p>
    </div>
    
    <div class="testimonial">
      <div class="testimonial-image">
      <img src="images/tell.jpg" alt="John D." />
      </div>
      <p>"I love the variety and quality of meals they offer. Totally recommend!" - Sarah L.</p>
    </div>

  </div>
  
</section>

<section class="blogs">
  <h2>Our Latest Blogs</h2>
  <div class="blog-container">
    <div class="blog-card">
      <img src="images/blog1.jpg" alt="Blog 1">
      <div class="blog-content">
        <h3>10 Tips for a Healthy Lifestyle</h3>
        <p>Discover effective tips to maintain a healthy and nutritious lifestyle.</p>
        <a href="https://www.youtube.com/watch?v=7_tRwLQJ5p4" class="read-more">Read More</a>
      </div>
    </div>
    <div class="blog-card">
      <img src="images/blog2.jpg" alt="Blog 2">
      <div class="blog-content">
        <h3>The Secrets of Meal Prep You Must try</h3>
        <p>Learn how to plan and prepare your meals for the week like a pro.</p>
        <a href="https://greatist.com/eat/easy-meal-prep-ideas-in-30-minutes-or-less" class="read-more">Read More</a>
      </div>
    </div>
    <div class="blog-card">
      <img src="images/blog3.jpg" alt="Blog 3">
      <div class="blog-content">
        <h3>Superfoods You Need to Try</h3>
        <p>Explore the top superfoods that can enhance your health and well-being.</p>
        <a href="https://www.vitalnutrients.co/blogs/education/9-superfoods-everyone-should-try-to-incorporate-into-their-diet-plan-superfoods-for-diet" class="read-more">Read More</a>
      </div>
    </div>
  </div>
</section>




<!-- last child -->
<!-- include foter-->
<!-- Footer Section -->
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

