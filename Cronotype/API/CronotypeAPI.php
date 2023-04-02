<?php 
    ini_set('display_errors', 0);
    include 'API_TestResult.php';

    //AJAX function that returns the test result text from JSON
    if($_POST["GetTestResult"] == "true") 
    {
        $api = new CronotypeAPI();
        echo $api->ConvertResponsesToClass($_POST["ResponsesFromTest"]);
    }

    //AJAX function that returns the test name from JSON
    if($_POST["GetTestName"] == "true") 
    {
        $api = new CronotypeAPI();
        echo $api->GetTestName();
    }

    //AJAX function that returns the questions array from JSON
    if($_POST["GetQuestionsArray"] == "true") 
    {
        $api = new CronotypeAPI();
        echo json_encode($api->GetQuestionsArray());
    }

    //AJAX function that returns the responses array from JSON
    if($_POST["GetResponsesArray"] == "true") 
    {
        $api = new CronotypeAPI();
        echo json_encode($api->GetResponsesArray());
    }

    //AJAX function that returns the max question number from JSON
    if($_POST["GetMaxQuestionNumber"] == "true") 
    {
        $api = new CronotypeAPI();
        echo $api->GetMaxQuestionNumber();
    }

    class CronotypeAPI 
    {
        public $questionsData;
        public $responsesData;
        public $responsesPoints;
        private $testResult;

        //GetTestResult returns the test result text from JSON by giving the responses array and the points list from every question
        public function GetTestResult ($_responsesData, $_pointsList) 
        {
            $testResult = new TestResult();
            return $testResult->CalculateResult($_responsesData, $_pointsList);
        }

        //GetTestName returns the test name stored inside the JSON file
        public function GetTestName() 
        {
            $jsonFile = file_get_contents('Questionary.json', true);
            $jsonResult = json_decode($jsonFile);
            $indexJSON = 0;
                
            foreach ($jsonResult as &$configArray) 
            {
                if($indexJSON == 0) 
                {
                    $indexJSON++;
                    continue;
                }

                return $configArray->parameters->QuizName;
            }

            return "ERROR";
        }

        //GetMaxQuestionNumber returns the max question number inside the JSON file
        public function GetMaxQuestionNumber() 
        {
            $jsonFile = file_get_contents('Questionary.json', true);
            $jsonResult = json_decode($jsonFile);
            $indexJSON = 0;
                
            foreach ($jsonResult as &$configArray) 
            {
                if($indexJSON == 0) 
                {
                    $indexJSON++;
                    continue;
                }
                        
                return $configArray->parameters->MaxListedQuestions;
            }

            return 0;
        }

        //GetResponsesPointsArray returns the points list from every question stored inside the JSON file
        public function GetResponsesPointsArray() 
        {
            $jsonFile = file_get_contents('Questionary.json', true);
            $jsonResult = json_decode($jsonFile);

            $responsesPointsDataArray = array();

            foreach ($jsonResult as &$firstArray) 
            {
                foreach($firstArray as &$question) 
                {
                    foreach($question as &$content) 
                    {
                        array_push($responsesPointsDataArray, $content->points);
                    }
                }
            }

            return $responsesPointsDataArray;
        }

        //ConvertResponsesToClass is the function used to give all the test responses and translate them to the test result
        public function ConvertResponsesToClass($responsesArray) 
        {
            $pointsList = $this->GetResponsesPointsArray();
            return $this->GetTestResult($responsesArray, $pointsList);
        }

        //GetQuestionsArray returns the questions array stored inside JSON, function that returns a string array
        public function GetQuestionsArray() 
        {

            $jsonFile = file_get_contents('Questionary.json', true);
            $jsonResult = json_decode($jsonFile);

            $questionsArray = array();

            foreach ($jsonResult as &$firstArray) 
            {
                foreach($firstArray as &$question) 
                {
                    foreach($question as &$content) 
                    {
                        array_push($questionsArray, $content->title);
                    }
                }
                break;
            }

            return $questionsArray;
        }

        //GetResponsesArray returns the responses array stored inside JSON, function returns a bidimensional array where the first dimension is the question index and second every response
        public function GetResponsesArray() 
        {
            $jsonFile = file_get_contents('Questionary.json', true);
            $jsonResult = json_decode($jsonFile);

            $responsesDataArray = array();

            foreach ($jsonResult as &$firstArray) 
            {
                foreach($firstArray as &$question) 
                {
                    foreach($question as &$content) 
                    {
                        array_push($responsesDataArray, $content->responses);
                    }
                }
            }


            return $responsesDataArray;
        }
    }
?>