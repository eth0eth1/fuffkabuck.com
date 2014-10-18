<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/
css?family=Open+Sans:400,300" />
<meta charset="UTF-8"/>
<title>Weathergrid</title>
</head>
<header>
<h2 class="previewText">Weather Grid.<br> Using the weather at your current location to generate some pretty grids.</h2>
</header>
<body style="margin:0px;overflow:hidden;">

    <canvas id ="weatherGrid">
                Your browser does not support this HTML5 tag, that sucks!
    </canvas>

<?php
//PHP Function finds users IP location and stores it for use in Javascript
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
$region = $geo["geoplugin_regionName"];
$country = $geo["geoplugin_countryName"];
echo "City: ".$city."<br>";
/*
geoplugin_request
geoplugin_status
geoplugin_credit
geoplugin_city
geoplugin_region
geoplugin_areaCode
geoplugin_dmaCode
geoplugin_countryCode
geoplugin_countryName
geoplugin_continentCode
geoplugin_latitude
geoplugin_longitude
geoplugin_regionCode
geoplugin_regionName
geoplugin_currencyCode
geoplugin_currencySymbol
geoplugin_currencySymbol_UTF8
geoplugin_currencyConverter
*/
?>

<script>
var ctx = document.getElementById("weatherGrid").getContext("2d");

var weather;
var location = <?php echo $city; ?>;
getWeather(location);


window.setInterval(function(){
  generateColorGrid();
}, 150);


function generateColorGrid(x,y)
{

    ctx.canvas.width = window.innerWidth;
    ctx.canvas.height = window.innerHeight;

    var tile_width = 50;
    var tile_height = 50;

    y = Math.ceil(window.innerWidth/tile_width);
    x = Math.ceil(window.innerHeight/tile_height);

    // Loop through x & y values passed
    for(xcount = x; xcount>0; xcount--){
        for(ycount = y; ycount>0; ycount--){
            colorArray = getColor(weather);

            ctx.fillStyle = "rgb("+colorArray[0]+","+colorArray[1]+","+colorArray[2]+")";

            ctx.fillRect((ycount-1) * tile_width, (xcount-1) * tile_height, tile_width, tile_height);  
        }   
    }
}

function getColor(str){

    switch(true){

        case /Rain/.test(str):
        var r = Math.floor((Math.random()*225)+1);
        var g = Math.floor((Math.random()*225)+1);
        var b = 225;
        return [r,g,b];

        case /Sun/.test(str):
        var r = 225;
        var g = Math.floor((Math.random()*225)+1);
        var b = Math.floor((Math.random()*225)+1);
        return [r,g,b];

        case /Clear/.test(str):
        var r = 225;
        var g = Math.floor((Math.random()*225)+1);
        var b = Math.floor((Math.random()*225)+1);
        return [r,g,b];

        case /cloud/.test(str):
        var r = Math.floor( (Math.random()* (50 - 1) ));
        var g = Math.floor( (Math.random()* (175- 1) ));
        var b = 255;
        return [r,g,b];

        case /ice/.test(str):
        var r = Math.floor( (Math.random()* (50 - 1) ));
        var g = Math.floor( (Math.random()* (175- 1) ));
        var b = 255;
        return [r,g,b];

        case /thunder/.test(str):
        var r = Math.floor( (Math.random()* (226 - 75) ));
        var g = Math.floor((Math.random()*226)+1);
        var b = Math.floor( (Math.random()* (226 - 75) ));
        return [r,g,b];

        default:
        //console.log("rndnum = "+rndnum);
        var r = Math.floor((Math.random()*225)+1);
        var g = Math.floor((Math.random()*225)+1);
        var b = 225;

        return [r,g,b];

    }

}

function getWeather(loc){
    
    if(typeof weather === 'undefined'){

        console.log("Getting weather from the internet...");

    // See definitions from http://openweathermap.org/weather-conditions
    var url = "http://api.openweathermap.org/data/2.5/find?q=" + loc + "&units=metric";
    // Initialise the HTTP request client
    var client = new XMLHttpRequest();

    //
    weather
    try {
        client.open("GET", url, false);
        client.send();
        var response = JSON.parse(client.responseText);
        weather = response.list[0].weather[0].description;
    }
    catch(err){
        console.log("Failed to get weather, defaulting to Rain");
        weather = "Rain";
    }
    console.log('Weather: ' + weather);
    } else{

        console.log("Weather already set; returning pre-cached weather...");
    }
}
</script>

</body>
</html>