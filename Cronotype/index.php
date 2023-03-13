<html>
	<head>
		<link rel="stylesheet" href="style.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
			<title> Chronotype </title>
		</head>
		<body style="background-color: #abdbd7">
			<img src="images/logo.png" style="padding: 10px">
				<div class="col-12 col-md-12">
					<div class="container mt-5" style="display: flex; justify-content: center">
						<form name="cronotype" id="form" action="" method="post">
							<hr class="d-flex justify-content-center row"/>
							<div class="col-lg-10" style="width: 100%;">
								<div class="border">
									<div class="question p-3 border-bottom">
										<div class="d-flex flex-row justify-content-between align-items-center mcq" style="color: #00aaa0">
											<h4 id="testName"></h4>
											<span>(<label id="indexQuestion"> </label> de <label id="questionsSize"> </label>)</span>
										</div>
									</div>
									<div class="question p-3 border-bottom">
										<div class="d-flex flex-row align-items-center question-title">
											<h5 class="mt-1 ml-2" style="font-size: 20; color: #3D322D; font-weight: bold;">
												<p id="question"> </p>
											</h5>
										</div>
										<div class="ans ml-2">
        
            <?php
                $jsonFile = file_get_contents('API/Questionary.json', true);
                $jsonResult = json_decode($jsonFile);
                $indexJSON = 0;
                $questionListSize = 0;
                    
                foreach ($jsonResult as &$configArray) 
                {
                    if($indexJSON == 0) 
                    {
                        $indexJSON++;
                        continue;
                    }
                            
                    $questionListSize = $configArray->parameters->MaxListedQuestions;
                    
                    ?>
                        <script>
                            document.getElementById("testName").innerHTML = "<?php echo $configArray->parameters->QuizName; ?>";
                        </script>
                    <?php
                    
                }  

                for ($questionIndex = 0; $questionIndex <= $questionListSize; $questionIndex++) 
                {
                    ?>
											<label class="radio" id="label<?php echo $questionIndex ?>">
												<input type="radio" onclick="SetOption(questionsIndex, <?php echo $questionIndex ?>)" name="question" id="res<?php echo $questionIndex ?>" value="option">
													<span id="response<?php echo $questionIndex ?>" style="font-weight: normal;"> </span>
												</label> 
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
							<button type="button" id="LastQuestion" class="btn btn-primary btn-lg" style="background-color:#00AAA1;" onclick="LastQuestion();"> Anterior </button>
							<button type="button" id="NextQuestion" class="btn btn-primary btn-lg" style="background-color:#00AAA1;" onclick="NextQuestion();"> Siguiente </button>
							<button type="button" id="SeeTestResult" class="btn btn-primary btn-lg" style="background-color:#00AAA1;" onclick="GetOutput();"> See result </button>
						</div>
						<br>
						</div>
					</div>
					<br>
					<p class="text-center" id="testResult" style='text-align:center; vertical-align:middle; font-size: 42px; align-items: center;'/>
    </body>
</html>

<?php include 'form.php'; ?>