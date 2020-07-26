<?php
require('vendor/autoload.php');

$client = new \Petfinder\Client('YOUR_API_KEY_HERE', 'YOUR_SECRET_KEY_HERE');

$data = $client->animal->search(['type' => 'Dog']);
$name = $data->data["animals"][0]["name"];
$info = (object) [
    "name" => $data->data["animals"][0]["name"],
    "type" => $data->data["animals"][0]["type"],
    "image" => $data->data["animals"][0]["photos"][0]["medium"],
    "url" => $data->data["animals"][0]["url"] ? null : "",
    "status" => $data->data["animals"][0]["status"],
    "desc" => $data->data["animals"][0]["description"]
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Error | Too Many Cute Animals</title>
    <style>
        html,body {
            padding: 0;
            margin: 0;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="container" class="center">
        <h1>404 Error</h1>
        <p>We may not have found that page you were looking for, but we found this <?=$info->type?> that needs a loving family!</p>
        <img src="<?=$info->image?>" alt="<?=$info->name?>">
        <h3><a href="<?=$info->url?>" title="View More Information!"><?=$info->name?></a></h3>
        <p><?=$info->desc?></p>
        <p>Status: <?=$info->status?></p>

    </div>
</body>
</html>
