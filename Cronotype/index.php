<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title> Chronotype </title>
    </head>

    <body>

    <?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        
        $api->responsesData = new ResponsesData();
        //$result = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        //print_r($api->ConvertResponsesToClass($result));
        $questionsArray = $api->GetQuestionsArray();
        $responseArray = $api->GetResponsesArray();

        $index = 0;
        $size = 34;

        ?>

        <script>
            const responsesArrayData = [ [] <?php for ($i = 0; $i <= $size-1 ; $i++) { echo ",[]"; } ?>];
            const responsesFromTest = [];
        </script>

        <form name="cronotype" action="" method="post" style='text-align:center; vertical-align:middle'>

        <?php

        foreach($questionsArray as $question) 
        {
            ?>
                <h5 class="card-title" style='text-align:center; vertical-align:middle; font-size: 23px; font-weight: bolder;'> <?php echo $question ?> </h5>

                <script>
                    responsesArrayData.push(<?php echo $index ?>);
                </script>

                <?php 

                $index_2 = 0;

                foreach($responseArray[$index] as $response) 
                { 
                    ?>
                        <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
                            <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption( <?php echo $index ?>, <?php echo $index_2 ?>)" type="radio" name="<?php echo $question ?>" id="<?php echo $response ?>" value="option<?php echo $index_2 ?>">
                            <label class="form-check-label" for="<?php echo $response ?>">
                                <?php echo $response ?>
                            </label>
                        </div>
                        
                        <script>

                            responsesArrayData[<?php echo $index ?>][<?php echo $index_2 ?>] = "<?php echo $response ?>";

                            function SetOption(index1, index2) 
                            {
                                console.log(responsesArrayData[index1][index2]);
                                responsesFromTest[index1] = index2;
                                console.log(responsesFromTest[index1]);
                            }

                        </script>
                        
                    <?php

                    $index_2++;

                }

                $index++;

                ?>
                    <hr class="mt-1 mb-1"/>
                <?php
        }
    ?>

    <p id="points"></p>
    <br>
    <p id="testResult"></p>

    <br>

    <button type="button" name="submit" class="btn btn-primary" onclick="GetOutput();" >See result</button>

    </form>
    
    <script>
        function GetOutput() 
        {
            for(var index = 0 ; index < <?php echo $size ?> ; index++)
            {
                if(responsesFromTest[index] == null)
                    return alert("Faltan preguntas para rellenar")
            }

            $.ajax({
                url: 'API/CronotypeAPI.php',
                type: 'post',
                dataType: 'text',
                data: { "GetTestResult": "true", "ResponsesFromTest": responsesFromTest },
                success: function(response) { 
                    console.log(responsesFromTest); 
                    console.log(response); 
                    document.getElementById("testResult").innerHTML = response;
                }
            });
        }
    </script>

    </body>

</html>
