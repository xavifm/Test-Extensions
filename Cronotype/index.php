<style>

    div {
            background-color: white;
            color: #00AAA1;
    }

    label.radio {
    cursor: pointer;
    }

    label.radio input {
    position: absolute;
    top: 0; 
    left: 0;
    visibility: hidden;
    pointer-events: none;
    }

    label.radio span {
    padding: 10px 0px;
    border: 1px solid #00AAA1;
    display: inline-block;
    color: black;
    width: 500px;
    text-align: center;
    
    border-radius: 3px;
    margin-top: 7px;
    text-transform: uppercase;
    }

    label.radio input:checked + span {
    border-color: #00AAA1;
    background-color: #00AAA1;
    color: #fff;
    }

    .ans {
    text-align: center;
    }

    .btn:focus {
    outline: 0 !important;
    box-shadow: none !important;
    }

    .btn:active {
    outline: 0 !important;
    box-shadow: none !important;
    }

</style>

<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title> Chronotype </title>
    </head>

    <body style="background-color: #00AAA1">

    <img src="images/logo.png" style="padding: 10px">

    <div class="col-12 col-md-12">
    <div class="container mt-5" style="display: flex; justify-content: center">

        <form name="cronotype" id="form" action="" method="post">

        <hr class="d-flex justify-content-center row"/>

        <div class="col-md-10 col-lg-10">

        <div class="border">

            <div class="question p-3 border-bottom">
                <div class="d-flex flex-row justify-content-between align-items-center mcq">
                    <h4>Descubre tu Cronotipo</h4><span>(<label id="indexQuestion"> </label> de <label id="questionsSize"> </label>)</span></div>
            </div>

            <div class="question p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger" style="color: black">Pregunta:</h3>
                            <h5 class="mt-1 ml-2"><p id="question"> </p></h5>
                        </div><div class="ans ml-2">
        
            <?php 
                $questionListSize = 15;
                for ($questionIndex = 0; $questionIndex <= $questionListSize; $questionIndex++) 
                {
                    ?> 
                        <label class="radio" id="label<?php echo $questionIndex ?>"> <input type="radio" onclick="SetOption(questionsIndex, <?php echo $questionIndex ?>)" name="question" id="res<?php echo $questionIndex ?>" value="option"> <span> <label id="response<?php echo $questionIndex ?>"> </label> </span> </label> 
                    <?php
                }
            ?>

            
            </form>

            </div>
            </div>
            </div>
            </div>
            
            </div>
            <div class="text-center" style="display: flex; justify-content: space-between;">
                    <button type="button" style='text-align:center; font-size: 22px; border-color:#00AAA1; background-color:#00AAA1; align-items: center;' id="LastQuestion" name="submit" class="btn btn-primary" onclick="LastQuestion();" >&#11164;</button>
                    <button type="button" style='text-align:center; font-size: 22px; border-color:#00AAA1; background-color:#00AAA1; align-items: center;' id="NextQuestion" name="submit" class="btn btn-primary" onclick="NextQuestion();" >&#11166;</button>
                    <button type="button" style='text-align:center; font-size: 22px; border-color:#00AAA1; background-color:#00AAA1; align-items: center;' id="SeeTestResult" name="submit" class="btn btn-primary" onclick="GetOutput();" >See result</button>
            </div>
            <br>
            <p class="text-center" id="testResult" style='width: 50rem;height: 10rem; text-align:center; vertical-align:middle; font-size: 42px; align-items: center;'></p>
            </div>
            </div>

    <br>

    <?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        
        $api->responsesData = new ResponsesData();
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
       document.getElementById("questionsSize").innerHTML = questionsArrayData.length-1;
       ShowQuestion(questionsIndex);

       function ShowQuestion(_index) 
        {
            document.getElementById("indexQuestion").innerHTML = _index;
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

            for (var _index2 = 0; _index2 < <?php echo $questionListSize+1 ?>; _index2++) 
            {
                var checkItem = document.getElementById("label" + String(_index2));
                var checkElement = document.getElementById("res" + String(_index2));
                var response = document.getElementById("response" + String(_index2));

                if(responsesArrayData[_index][0] == null) 
                {
                    question.style.display = "none";
                    testResult.style.display = "";
                    nextQuestion.style.display = "none";
                    checkItem.style.display = "none";
                }
                else 
                    question.style.display = "";

                if(responsesArrayData[_index][_index2] == null) 
                {
                    checkElement.style.display = "none";
                    response.style.display = "none";
                    checkItem.style.display = "none";
                }
                else 
                {
                    checkElement.style.display = "";
                    response.style.display = "";
                    checkItem.style.display = "";

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
