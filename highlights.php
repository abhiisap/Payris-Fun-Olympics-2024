<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Highlights</title>
    <style>
        body {
            background-image: url('high.jpg'); /* Path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Ensures the background image stays fixed as the user scrolls */
            font-family: Arial, sans-serif; /* Optional: Specify a fallback font */
        }



        .container {
            display: flex;
            flex-wrap: wrap; /* Allow cards to wrap to the next line */
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc; /* Optional: Add a separator */
        }
        .card {
            width: calc(33.33% - 20px); /* Set width to 1/3 of the container minus margin */
            margin: 100px; /* Adjust spacing between cards */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card video {
            width: 100%;
            height: auto;
        }
        .card-content {
            padding: 10px 0;
            color: white;
            font-weight:bold;
            font-size: 20px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        .card-description {
            color: white; /* Set text color to white */
            font-weight: bold;
            font-size: 20px;
        }

        h2 {
            color: white; /* Set text color to white */
            text-align: center; /* Center align the text */
            margin-top: 20px; /* Add some top margin */
        }

        
    </style>
</head>
<body>
    <h2>Sports Highlights</h2>

    <div class="container">
        <div class="card">
            <video controls>
                <source src="football.mp4" type="video/mp4">
                
            </video>
            <div class="card-content">
                <h3 class="card-title">Football Highlights</h3>
                
            </div>
        </div>

        

        <div class="card">
            <video controls>
                <source src="basket.mp4" type="video/mp4">
                
            </video>
            <div class="card-content">
                <h3 class="card-title">Basketball Highlights</h3>
                
            </div>
        </div>


        <div class="card">
            <video controls>
                <source src="f1.mp4" type="video/mp4">
                
            </video>
            <div class="card-content">
                <h3 class="card-title">F1 Racing Highlights</h3>
                
            </div>
        </div>



        <div class="card">
            <video controls>
                <source src="box.mp4" type="video/mp4">
                
            </video>
            <div class="card-content">
                <h3 class="card-title">Boxing Highlights</h3>
                
            </div>
        </div>



       
    </div>

</body>
</html>
