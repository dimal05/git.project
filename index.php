<?php
session_start();
require_once 'Database.php';
require_once 'User.php';
$database = new Database("localhost", "root", "", "webprojekti");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = new User($database);

        if ($user->login($email, $password)) {
            
            $userData = $user->getUserByEmail($email);
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['user_role'] = $userData['role'];

            
            header("Location: index.php");
            exit();
        } else {
            
            echo "Invalid login credentials. Please try again.";
        }
    }
}

include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style> 
       
body, h1, h2, h3, p, ul, li, img {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f1f1;
    line-height: 1.6;
}

header {
    background-color:#617e92;
    color: #fff;
    padding: 10px 0;
}

.headeri {
    max-width: 1200px;
    margin: 0 auto;
}

.headeri p {
    font-size: 24px;
}

ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    background-color: #444444;
}

ul li {
    padding: 10px 20px;
    cursor: pointer;
}

ul a {
    text-decoration: none;
    color: #fff;
}

main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
}

.bgfoto {
    display: flex;
    margin-bottom: 20px;
}

.bgfoto input {
    flex: 1;
    padding: 10px;
}

.bgfoto button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.Photos {
    background-color: #ffffff;
    color: #fff;
    padding: 10px;
}

.fotografit {
    display: flex;
    flex-wrap: wrap;
}

.rubrika {
    width: calc(33.33% - 20px);
    margin: 10px;
    overflow: hidden;
    position: relative;
}

.rubrika img {
    width: 100%;
    height: auto;
    border: 1px solid #ccc;
}

.Creation {
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

.f h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.ff {
    display: flex;
}

.ff a {
    margin-right: 10px;
}

.footermain {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}




@media screen and (max-width: 768px) {
    .fotografit .rubrika {
        width: calc(50% - 20px);
    }
}

        </style>
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-200 via-gray-300 to-gray-800">
<div class="bgfoto">
        </div>
        <div class="Photos bg-gradient-to-r from-gray-200 via-gray-300 to-gray-800">
            <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img/images (11).jpg" style="width:100%">
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img/images (12).jpg" style="width:100%">
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img/images (13).jpg" style="width:100%">
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
            <h3>Photos</h3>
        </div>
        <div class="fotografit">
            <div class="rubrika">
                <img src="img/images (3).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>19,10,2020</p>
                    <p>10,460 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (1).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>12,6,2020</p>
                    <p>19,461 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (5).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>23,3,2021</p>
                    <p>23,643 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (6).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>19,5,2019</p>
                    <p>16,633 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (8).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>12,3,2018</p>
                    <p>14,453 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (2).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>27,1,2019</p>
                    <p>18,858 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (7).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>23,11,2019</p>
                    <p>97,469 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (4).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>26,12,2021</p>
                    <p>105,469 Views</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images (3).jpg" alt="" class="img">
                <div class="Creation Date">
                    <p>14,11,2021</p>
                    <p>107,646 Views</p>
                </div>
            </div>
    </main>
    <script>
        
        var photosData = [
            { src: 'img/images (3).jpg', date: '19,10,2020', views: 10460 },
            { src: 'img/images (1).jpg', date: '12,6,2020', views: 19461 },
            { src: 'img/images (5).jpg', date: '23,3,2021', views: 23643 },
            { src: 'img/images (6).jpg', date: '19,5,2019', views: 16633 },
            { src: 'img/images (8).jpg', date: '12,3,2018', views: 14453 },
            { src: 'img/images (2).jpg', date: '27,1,2019', views: 18858 },
            { src: 'img/images (7).jpg', date: '23,11,2019', views: 97469 },
            { src: 'img/images (4).jpg', date: '26,12,2021', views: 105469 },
            { src: 'img/images (9).jpg', date: '14,11,2021', views: 107646 }
        ];
        
        function createPhotoElement(photo) {
            var photoDiv = document.createElement('div');
            photoDiv.classList.add('rubrika');

            var imgElement = document.createElement('img');
            imgElement.src = photo.src;
            imgElement.alt = '';
            
            var creationDateDiv = document.createElement('div');
            creationDateDiv.classList.add('Creation', 'Date');
            creationDateDiv.innerHTML = `
            <p>${photo.date}</p>
            <p>${photo.views} Views</p>
            `;
            
            photoDiv.appendChild(imgElement);
            photoDiv.appendChild(creationDateDiv);
            
            return photoDiv;
        }
 function searchPhotos() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            var filteredPhotos = photosData.filter(function (photo) {
                return photo.date.includes(searchTerm) || photo.views.toString().includes(searchTerm);
            });

            displayPhotos(filteredPhotos);
        }

        function displayPhotos(photos) {
            var photoContainer = document.getElementById('photoContainer');
            photoContainer.innerHTML = '';

            photos.forEach(function (photo) {
                var photoElement = createPhotoElement(photo);
                photoContainer.appendChild(photoElement);
            });
        }

        window.onload = function () {
            displayPhotos(photosData);
        };
        let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
    </script>
    </body>
</html>
<?php
include 'footer.php'
?>
