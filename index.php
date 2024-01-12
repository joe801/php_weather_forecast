<?php 

    $city = $_GET["city"];

    if ($city) {
        $url = "https://www.weather-forecast.com/locations/$city/forecasts/latest";
        $content = file_get_contents($url);

        if ($content !== false) {
            // Define a regular expression pattern
            $pattern = '/<span class="phrase">(.*?)<\/span>/s';
        
            // Perform the regular expression match
            if (preg_match($pattern, $content, $matches)) {
                $extractedText = $matches[1];
            } else {
                echo "Pattern not found";
            }
        } else {
            echo "";
        }
    } else{
        echo "";
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Forecast</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('bg.jpg');
        }
        .contain{
            width: 50%;
            margin: 5rem auto;
        }
    </style>
  </head>
  <body >
    <div class="container contain">
        <h1 class="text-center">What's The Weather?</h1>
        <p class="text-center">Enter the name of a City</p>
        <form action="">
            <div class="mb-3">
                <input type="text" name="city" class="form-control" placeholder="E.g Lagos, Tokyo" value="<?php echo $city ?>" required>
            </div>
            <div class="d-grid col-2 mx-auto mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class=" mt-5" id="result">
            <?php 
                if ($city) {
                    if ($extractedText) {
                        echo '<div class="alert alert-light" >'.$extractedText."</div>";
                    } else {
                        echo '<div class="alert alert-danger">'."That city could not be found"."</div>";
                    }
                }
                
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>