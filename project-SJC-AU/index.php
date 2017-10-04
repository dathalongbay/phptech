
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

<?php
$url = 'http://www.sjc.com.vn/xml/tygiavang.xml';
$xml = file_get_contents($url);
$data = simplexml_load_string($xml);

$ratelist = $data->ratelist;

$city = $ratelist->city;

$source = $data->title;

$url_source = $data->url;

$data_exchange = array();

?>

<div class="container">
    <h2>Tỷ giá vàng SJC</h2>
    <p> Được cập nhật lúc <?php echo $ratelist['updated']; ?></p>
    <p> Đơn vị <?php echo $ratelist['unit']; ?></p>
    <table class="table">
        <thead>
        <tr>
            <th>Thành phố</th>
            <th>Tên</th>
            <th>Giá mua vào</th>
            <th>Giá bán ra</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($city as $item) :
        ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item->item['type']; ?></td>
            <td><?php echo $item->item['buy'];?></td>
            <td><?php echo $item->item['sell']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container">

    <footer>
        <p>Nguồn <?php echo $source . ' - ' . $url_source; ?></p>
    </footer>
</div> <!-- /container -->


</body>
</html>
