<?php 
        include 'API/CronotypeAPI.php';
        $api = new CronotypeAPI();
        
        $api->responsesData = new ResponsesData();
        $questionsArray = $api->GetQuestionsArray();
        $responseArray = $api->GetResponsesArray();
        $questionListSize = $api->GetMaxQuestionNumber();

        $index = 0;
        $size = sizeof($questionsArray);

        ?>

        <script>
            var questionsIndex = 0;
            var resetButton;
            var testFinished = false;
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
       BuildTest();
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
            resetButton.style.display = "none";
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
                    
                    if(testFinished == true)
                        resetButton.style.display = "";
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
        
        function NQuestion() 
        {
            if(responsesFromTest[questionsIndex] != null && questionsIndex < <?php echo $size+1 ?>) 
            {
                questionsIndex++;
                ShowQuestion(questionsIndex);
            }
            else if(responsesFromTest[questionsIndex] == null)
                alert("Falta responder esta pregunta!")
        }

        function LQuestion() 
        {
            if(questionsIndex > 0) 
            {
                questionsIndex--;
                ShowQuestion(questionsIndex);
            }
        }

        async function SetOption(index1, index2) 
        {
            console.log(responsesArrayData[index1][index2]);
            responsesFromTest[index1] = index2;
            console.log(responsesFromTest[index1]);
            await new Promise(resolve => setTimeout(resolve, 100));
            NQuestion();
        }

        function ResetWebpage() 
        {
            window.location.reload();
        }

        function PlaceTestName() 
        {
            $.ajax({
                url: 'API/CronotypeAPI.php',
                type: 'post',
                dataType: 'text',
                data: { "GetTestName": "true" },
                success: function(response) { 
                    console.log(response); 
                    var responseName = response.substring(response.indexOf(")")+1);
                    document.getElementById("testName").innerHTML = responseName;
                }
            });
        }

        function BuildTest() 
        {
            PlaceTestName();
            BuildQuestionary();
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
                    var responseName = response.substring(response.indexOf(")")+1);
                    document.getElementById("testResult").innerHTML = responseName;
                }
            });

            testFinished = true;
            resetButton.style.display = "";

        }

        function BuildQuestionary() 
        {
            var html = '';
            <?php
                    for ($questionIndex = 0; $questionIndex <= $questionListSize; $questionIndex++) 
                    {
                            ?>
					        html += '<label class="radio" id="label<?php echo $questionIndex ?>">';
							html += '<input type="radio" onclick="SetOption(questionsIndex, <?php echo $questionIndex ?>)" name="question" id="res<?php echo $questionIndex ?>" value="option">';
							html += '<span class="responsebtn" id="response<?php echo $questionIndex ?>"> </span>';
							html += '</label>';
                            <?php
                    }
                    ?>
						    html += '<div class="button-region">';
							html += '<button type="button" id="LastQuestion" class="btn btn-primary btn-lg" onclick="LQuestion();"> Anterior </button> <span>';
							html += '<button type="button" id="NextQuestion" class="btn btn-primary btn-lg" onclick="NQuestion();"> Siguiente </button> <span>';
							html += '<button type="button" id="SeeTestResult" class="btn btn-primary btn-lg" onclick="GetOutput();"> See result </button> <span>';
							html += '<button type="button" id="ResetTest" class="btn btn-primary btn-lg" onclick="ResetWebpage();"> Reset Test </button>';
						    html += '<br>';
					        html += '<br>';
					        html += '<p class="test-result" id="testResult"/>';

                            document.getElementById("html").innerHTML += html;
                            document.getElementById("SeeTestResult").style.display = "none";
                            resetButton = document.getElementById("ResetTest");
                            resetButton.style.display = "none";
        }

</script>