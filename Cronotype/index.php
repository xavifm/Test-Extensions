<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title> Chronotype </title>
    </head>

    <body>

    <hr class="mt-1 mb-1"/>

    <h5 class="card-title" style='text-align:center; vertical-align:middle; font-size: 23px; font-weight: bolder;'> <p id="question"> </p> </h5> 
    
    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 0)" type="radio" name="question1" id="res0" value="option">
    <label class="form-check-label" for="response">
        <p id="response0"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 1)" type="radio" name="question1" id="res1" value="option">
    <label class="form-check-label" for="response">
        <p id="response1"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 2)" type="radio" name="question1" id="res2" value="option">
    <label class="form-check-label" for="response">
        <p id="response2"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 3)" type="radio" name="question1" id="res3" value="option">
    <label class="form-check-label" for="response">
        <p id="response3"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 4)" type="radio" name="question1" id="res4" value="option">
    <label class="form-check-label" for="response">
        <p id="response4"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 5)" type="radio" name="question1" id="res5" value="option">
    <label class="form-check-label" for="response">
        <p id="response5"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 6)" type="radio" name="question1" id="res6" value="option">
    <label class="form-check-label" for="response">
        <p id="response6"> </p>
    </label>
    </div> 

    <div class="form-check" style='text-align:center; vertical-align:middle; font-size: 20px;'>
    <input class="form-check-input" style="width: 2rem;height: 2rem;" onclick="SetOption(questionsIndex, 7)" type="radio" name="question1" id="res7" value="option">
    <label class="form-check-label" for="response">
        <p id="response7"> </p>
    </label>
    </div> 

    </input>

    <hr class="mt-1 mb-1"/>

    <p id="points"></p>
    <br>
    <p id="testResult"></p>

    <br>

    <button type="button" id="SeeTestResult" name="submit" class="btn btn-primary" onclick="GetOutput();" >See result</button>

    </form>

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
            var questionsIndex = 0;
            const questionsArrayData = [];
            const responsesArrayData = [ [] <?php for ($i = 0; $i <= $size-1 ; $i++) { echo ",[]"; } ?>];
            const responsesFromTest = [];
        </script>

        <form name="cronotype" action="" method="post" style='text-align:center; vertical-align:middle'>

        <?php

        foreach($questionsArray as $question) 
        {
            ?>  
                <script>
                    questionsArrayData[<?php echo $index ?>] = "<?php echo $question ?>";
                    responsesArrayData.push(<?php echo $index ?>);
                </script>

                <?php 

                $index_2 = 0;

                foreach($responseArray[$index] as $response) 
                { 
                    ?>  
                        <script>

                            responsesArrayData[<?php echo $index ?>][<?php echo $index_2 ?>] = "<?php echo $response ?>";

                        </script>
                        
                    <?php

                    $index_2++;

                }

                $index++;
        }
    ?>
    
    <script>

       document.getElementById("SeeTestResult").style.display = "none";
       ShowQuestion(questionsIndex);

       function ShowQuestion(_index) 
        {

            document.getElementById("question").innerHTML = questionsArrayData[_index];

            for (var _index2 = 0; _index2 < 8; _index2++) 
            {
                if(responsesArrayData[_index][0] == null) 
                {
                    document.getElementById("question").style.display = "none";
                    document.getElementById("SeeTestResult").style.display = "";
                }

                var checkElement = document.getElementById("res" + String(_index2));
                var response = document.getElementById("response" + String(_index2));

                if(responsesArrayData[_index][_index2] == null) 
                {
                    checkElement.style.display = "none";
                    response.style.display = "none";
                }
                else 
                {
                    checkElement.style.display = "";
                    response.style.display = "";
                    document.getElementById("response" + String(_index2)).innerHTML = responsesArrayData[_index][_index2];
                }
            }

        }

        function SetOption(index1, index2) 
        {
            console.log(responsesArrayData[index1][index2]);
            responsesFromTest[index1] = index2;
            console.log(responsesFromTest[index1]);

            questionsIndex++;
            ShowQuestion(questionsIndex);
        }

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
