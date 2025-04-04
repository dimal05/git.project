<?php
session_start();
include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Tuning</title>
</head>
<body>
    
    <div class="car-container">
      
        <div class="car">
            <img src="img/images (11).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Mercedes C-class</p>
                <p>Viti Prodhimit: 2020</p>
                <p>Cmimi: 36000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (12).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Audi Q8</p>
                <p>Viti Prodhimit: 2021</p>
                <p>Cmimi: 54000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (13).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Golf 8</p>
                <p>Viti Prodhimit: 2019</p>
                <p>Cmimi: 19000</p>
                <p>Kilometrazha: 74629</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (14).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Opel Corsa</p>
                <p>Viti Prodhimit: 2020</p>
                <p>Cmimi: 14000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (17).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Golf 7</p>
                <p>Viti Prodhimit: 2016</p>
                <p>Cmimi: 11000</p>
                <p>Kilometrazha: 124634</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (16).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: BMW M4</p>
                <p>Viti Prodhimit: 2021</p>
                <p>Cmimi: 20000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

        <div class="car">
            <img src="img/images (15).jpg" alt="Car 3">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Mercedes GT63s</p>
                <p>Viti Prodhimit: 2023</p>
                <p>Cmimi: 100000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>


        <div class="car">
            <img src="img/images (18).jpg" alt="Car 2">
            <div class="description">
                <h3>Te Dhenat</h3>
                <p>Modeli: Jeep</p>
                <p>Viti Prodhimit: 2020</p>
                <p>Cmimi: 17000</p>
                <p>Kilometrazha: 00-00</p>
                <p>Numri Kontaktues: 044123456</p>
            </div>
        </div>

       
    </div>
    <style>
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
    background-color: #617e92;
}

ul li {
    padding: 10px 20px;
    cursor: pointer;
}

ul a {
    text-decoration: none;
    color: #0e0d0d;
}

main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
}
   

        h2 {
            text-align: center;
            color: rgb(12, 12, 12);
            margin-top: 20px;
        }

        .car-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .car {
            width: 30%;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .car:hover {
            transform: scale(1.05);
        }

        img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            border-radius: 8px 8px 0 0;
        }

        .description {
            padding: 10px;
            border-radius: 0 0 8px 8px;
            background-color: #f8f8f8;
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
       
       var carList = [
           {
               model: 'BMW SERIES 7',
               year: 2019,
               price: 14000,
               mileage: 249456,
               contact: '044123456',
               image: 'img/images (10).jpg'
           },
         
       ];

    var carContainer = document.querySelector('.car-container');

       carList.forEach(function(car) {
           var carDiv = document.createElement('div');
           carDiv.classList.add('car');

           var carImage = document.createElement('img');
           carImage.src = car.image;
           carImage.alt = car.model;

           var carDescription = document.createElement('div');
           carDescription.classList.add('description');
           carDescription.innerHTML = `
               <h3>Te Dhenat</h3>
               <p>Modeli: ${car.model}</p>
               <p>Viti Prodhimit: ${car.year}</p>
               <p>Cmimi: ${car.price}</p>
               <p>Kilometrazha: ${car.mileage}</p>
               <p>Numri Kontaktues: ${car.contact}</p>
           `;

           carDiv.appendChild(carImage);
           carDiv.appendChild(carDescription);
           carContainer.appendChild(carDiv);
       });
   });
    </script>
</body>
</html>
<?php
include 'footer.php'
?>
