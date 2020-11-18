<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);   
    $result = json_decode($response);
?>

    <body>
        <div class="container">
                <?php for ($i=0; $i<count($result->tracks->items); $i++){
                    if ($i%3==0){
                        echo '<div class="row">';
                    }
                echo '<div class="col-4 pb-4"><div class="card"><img src="';
                echo $result->tracks->items[$i]->album->images[0]->url.'"';
                echo 'class="card-img-top"><div class="card-body"><h5 class="card-title">'; 
                echo $result->tracks->items[$i]->album->name;
                echo '</h5><p class="card-text">Artist: ' ;
                echo $result->tracks->items[$i]->album->artists[0]->name;
                echo '</p><p class="card-text">Release date: ';
                echo $result->tracks->items[$i]->album->release_date;
                echo '</p><p class="card-text">Avaliable: ' ;
                echo count($result->tracks->items[$i]->album->available_markets); 
                echo ' countries</p></div></div></div>';
                if ($i%3==2){
                    echo '</div>';
                }
                 } ?>
        </div>
    </body>

</html>