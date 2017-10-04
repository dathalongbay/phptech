<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            background: url("background.jpg") no-repeat scroll center top / cover;
        }
        .weather {
            margin: 300px auto;
            padding: 20px;
            width: 400px;
            border: 1px solid #fff;
        }
        #clima {
            width: 100%;
            text-align: center;
        }
        .date {
            font-size: 18px;
            color: #252445;
        }
        .temp {
            font-size: 125px;
            color: #252445;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <?php

        $apikey = "b36b9229bf22443c5598b8b4084a6c34";
        $city_id = "1581130";

        //units=For temperature in Celsius use units=metric
        //5128638 is new york ID

        $url = "http://api.openweathermap.org/data/2.5/weather?id={$city_id}&lang=en&units=metric&APPID={$apikey}";

        $contents = file_get_contents($url);
        $clima = json_decode($contents);

        $temp = $clima->main->temp;

        $temp_max = $clima->main->temp_max;
        $temp_min = $clima->main->temp_min;
        $icon = $clima->weather[0]->icon.".png";
        //how get today date time PHP :P
        $today = date("F j, Y, g:i a");
        $cityname = $clima->name;
        ?>
        <div class="col-md-12">
            <div class="weather">
                <div id="clima">
                    <p class="date"><?php echo $cityname . " - " .$today; ?></p>
                    <p class="temp"><?php echo $temp; ?>°<span>c</span></p>
                    <p class="icon"><?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >"; ?></p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div> <!-- /container -->




</body>
</html>
