<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title> Chronotype </title>
    </head>

    <body>

    <form name="cronotype" id="form" action="" method="post" style='text-align:center; vertical-align:middle'>

    <div class="col-12 col-md-12">

        <hr class="mt-1 mb-1"/>

        <h5 class="card-title" style='text-align:left; vertical-align:middle; font-size: 43px; font-weight: bolder;'> <p id="question"> </p> </h5> 
        
        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 0)" type="radio" name="question1" id="res0" value="option">
        <label class="form-check-label" for="response">
            <p id="response0"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 1)" type="radio" name="question1" id="res1" value="option">
        <label class="form-check-label" for="response">
            <p id="response1"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 2)" type="radio" name="question1" id="res2" value="option">
        <label class="form-check-label" for="response">
            <p id="response2"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 3)" type="radio" name="question1" id="res3" value="option">
        <label class="form-check-label" for="response">
            <p id="response3"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 4)" type="radio" name="question1" id="res4" value="option">
        <label class="form-check-label" for="response">
            <p id="response4"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 5)" type="radio" name="question1" id="res5" value="option">
        <label class="form-check-label" for="response">
            <p id="response5"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 6)" type="radio" name="question1" id="res6" value="option">
        <label class="form-check-label" for="response">
            <p id="response6"> </p>
        </label>
        </div> 

        <div class="form-check" style='text-align:center; text-align:left; font-size: 42px;'>
        <input class="form-check-input" style="width: 5rem;height: 5rem;" onclick="SetOption(questionsIndex, 7)" type="radio" name="question1" id="res7" value="option">
        <label class="form-check-label" for="response">
            <p id="response7"> </p>
        </label>
        </div> 

        </input>

        <hr class="mt-1 mb-1"/>

    </div>

    </form>

    <div class="col-12 col-md-12" style = "position:absolute; left:0%; top:85%; background-color:white;">

    <div class="text-center">
            <button type="button" style='width: 50rem;height: 10rem; text-align:center; vertical-align:middle; font-size: 42px;' id="LastQuestion" name="submit" class="btn btn-primary" onclick="LastQuestion();" ><</button>
            <button type="button" style='width: 50rem;height: 10rem; text-align:center; vertical-align:middle; font-size: 42px;' id="NextQuestion" name="submit" class="btn btn-primary" onclick="NextQuestion();" >></button>
            <button type="button" style='width: 50rem;height: 10rem; text-align:center; vertical-align:middle; font-size: 42px;' id="SeeTestResult" name="submit" class="btn btn-primary" onclick="GetOutput();" >See result</button>
        </div>
    <br>
    <p class="text-center" id="testResult" style='width: 50rem;height: 10rem; text-align:center; vertical-align:middle; font-size: 42px;'></p>

    <br>

    <?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        
        $api->responsesData = new ResponsesData();
        //$result = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        //print_r($api->ConvertResponsesToClass($result));
        $questionsArray = $api->GetQuestionsArray();
        $responseArray = $api->GetResponsesArray();

        $index = 0;
        $size = sizeof($questionsArray);

        ?>

        <script>
            var questionsIndex = 0;
            const questionsArrayData = [];
            const responsesArrayData = [ [] <?php for ($i = 0; $i <= $size-1 ; $i++) { echo ",[]"; } ?>];
            const responsesFromTest = [];
        </script>

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

       document.getElementById('form').reset();
       document.getElementById("SeeTestResult").style.display = "none";
       ShowQuestion(questionsIndex);

       function ShowQuestion(_index) 
        {

            document.getElementById("question").innerHTML = questionsArrayData[_index];
            var nextQuestion = document.getElementById("NextQuestion");
            var lastQuestion = document.getElementById("LastQuestion");
            var question = document.getElementById("question");
            var testResult = document.getElementById("SeeTestResult");

            nextQuestion.style.display = "";
            lastQuestion.style.display = "";
            testResult.style.display = "none";

            if(_index <= 0) 
                lastQuestion.style.display = "none";

            for (var _index2 = 0; _index2 < 8; _index2++) 
            {
                if(responsesArrayData[_index][0] == null) 
                {
                    question.style.display = "none";
                    testResult.style.display = "";
                    nextQuestion.style.display = "none";
                }
                else 
                    question.style.display = "";

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

                    var response = document.getElementById("response" + String(_index2));
                    response.innerHTML = responsesArrayData[_index][_index2];

                    var responseCheck = document.getElementById("res" + String(_index2));
                    
                    if(responsesFromTest[_index] != null) 
                    {
                        console.log(responsesFromTest[_index]);
                        if(responsesFromTest[_index] == _index2) 
                            responseCheck.checked = true;
                        else
                            responseCheck.checked = false;
                    }
                    else
                        responseCheck.checked = false;
                }
            }

        }

        function SetOption(index1, index2) 
        {
            console.log(responsesArrayData[index1][index2]);
            responsesFromTest[index1] = index2;
            console.log(responsesFromTest[index1]);
        }

        function NextQuestion() 
        {
            if(questionsIndex < <?php echo $size+1 ?>) 
            {
                questionsIndex++;
                ShowQuestion(questionsIndex);
            }
        }

        function LastQuestion() 
        {
            if(questionsIndex > 0) 
            {
                questionsIndex--;
                ShowQuestion(questionsIndex);
            }
        }

        function GetOutput() 
        {
            for(var index = 0 ; index < <?php echo $size - 2 ?> ; index++)
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
