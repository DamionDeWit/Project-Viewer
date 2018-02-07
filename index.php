<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    $projects = glob("./*", GLOB_ONLYDIR);  //  Gets every directory
    //  var_dump($projects);
    
    
?>
<header>
    <h1>Projects</h1>
</header>

<main>

    <?php   

    //  Create card for every directory
    for($project = 0; $project < count($projects); $project++){

            $xml_path = $projects[$project] . "/config.xml";
            //echo $xml_path;

            $xml = simplexml_load_file($xml_path);
            //var_dump($xml);
            if((string) $xml->image == "")
            {
                $img_url = "./no_img.png";
            }
            else
            {
                $img_url = $projects[$project] . (string) $xml->image;
            }

    ?>
        <a class="card" href="<?php echo $projects[$project] ?>">
            <div class="thumbnail">
            <img src="<?php echo $img_url; ?>" alt="">
            </div>
            
            <div class="description">
                <h1><?php echo (string) $xml->name;?></h1>
                <p><?php echo (string) $xml->description ?></p>
            </div>
        </a>
    <?php } ?>

</main>


</body>
</html>