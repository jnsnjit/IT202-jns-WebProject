<?php
require_once('database_njit.php');
require_once('check_login.php');
$db = getDB();
// Access the passed variable using the $_GET 
$toyCode = $_GET["toy_code"];
// now use this for the query
$queryToy = 'SELECT * FROM toy WHERE toyCode = :toy_code';
$statement3 = $db->prepare($queryToy);
$statement3->bindValue(':toy_code', $toyCode);
$statement3->execute();
$toys = $statement3->fetchAll();
$statement3->closeCursor();

//print_r($toy);
?>
<html>
    <head>
       <title>Blockitic Inc</title>
       <!-- link to stylesheet -->
       <link rel="stylesheet" href="style.css"/>
       <style>
            #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }

            #myImg:hover {opacity: 0.7;}

            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            }

            /* Caption of Modal Image */
            #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            }

            /* Add Animation */
            .modal-content, #caption {  
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @keyframes zoom {
            from {transform: scale(0.1)} 
            to {transform: scale(1)}
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

            .close:hover,
            .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
        </style>
    </head>
    <body>
        <script src="details.js"></script>
        <?php include("header.php"); ?>
        <?php foreach ($toys as $t) : ?>
            <h1><?php echo $t['toyName']; ?></h1>
            <p>Toy Code: <?php echo $t['toyCode']; ?></p>
            <p>Description: <?php echo $t['description']; ?></p>
            <p>Price: <?php echo $t['price']; ?></p>
            <p>Sale Price: <?php echo $t['onSale']; ?></p>
            <span class='toys'>
                <img length =150px width =150px id='toyImage' src="toyCode_images/<?php echo $t['toyCode']; ?>.jpg" alt="<?php echo $t['toyName']; ?>">
                <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"><?php echo $t['toyName'];?></div>
                </div>
            </span>
        <?php endforeach; ?>
        <?php include("footer.php"); ?>
        <script>
            //script for modal image
            
            // Get the modal
            addEventListener("DOMContentLoaded", (event) => {
                console.log("DOM fully loaded and parsed");
                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var modal = document.getElementById('myModal');
                var img = document.getElementById('toyImage');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                console.log(img);
                console.log(modalImg);
                console.log(captionText);
                
                img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                modal.style.display = "none";
                }
        });
        </script>
    </body>
</html>
