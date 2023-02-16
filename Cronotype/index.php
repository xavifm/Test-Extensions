<html>
    <head>
        <title> Chronotype </title>
    </head>

    <body>
        Hi!
    </body>

    <?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        print_r($api->GetTestResult());
    ?>

</html>
