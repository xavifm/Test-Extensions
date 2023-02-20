<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title> Chronotype </title>
    </head>

    <body>
        Hi!
    </body>

    <?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        
        $api->responsesData = new ResponsesData();
        $result = $api->responsesData;
        //print_r($api->GetTestResult($result));
        $questionsArray = $api->GetQuestionsArray();
        $responseArray = $api->GetResponsesArray();

        $index = 0;
        $size = 34;

        ?>

        <script>
            const responsesArrayData = [ [] <?php for ($i = 0; $i <= $size-1 ; $i++) { echo ",[]"; } ?>];
        </script>

        <form>

        <?php

        foreach($questionsArray as $question) 
        {
            ?>
                <h5 class="card-title"> <?php echo $question ?> </h5>

                <script>
                    responsesArrayData.push(<?php echo $index ?>);
                </script>

                <?php 

                $index_2 = 0;

                foreach($responseArray[$index] as $response) 
                { 
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" onclick="SetOption( <?php echo $index ?>, <?php echo $index_2 ?>)" type="radio" name="<?php echo $question ?>" id="<?php echo $response ?>" value="option<?php echo $index_2 ?>">
                            <label class="form-check-label" for="<?php echo $response ?>">
                                <?php echo $response ?>
                            </label>
                        </div>
                        
                        <script>

                            responsesArrayData[<?php echo $index ?>][<?php echo $index_2 ?>] = "<?php echo $response ?>";

                            function SetOption(index1, index2) 
                            {
                                console.log(responsesArrayData[index1][index2]);
                            }
                        </script>
                        
                    <?php


                    $index_2++;

                }

                $index++;
        }
    ?>

    <br>

    <button type="submit" class="btn btn-primary">See result</button>

    </form>

</html>
