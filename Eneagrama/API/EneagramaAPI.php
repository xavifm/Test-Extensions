<?php 
    ini_set('display_errors', 0);
    include 'API_TestResult.php';

    if($_POST["GetTestResult"] == "true") 
    {
        $api = new EneagramaAPI();
        echo $api->ConvertResponsesToClass($_POST["ResponsesFromTest"]);
    }

    if($_POST["GetTestName"] == "true") 
    {
        $api = new EneagramaAPI();
        echo $api->GetTestName();
    }

    class EneagramaAPI 
    {
        public $questionsData;
        public $responsesData;
        public $responsesPoints;
        private $testResult;

        public function GetTestResult ($_responsesData, $_pointsList) 
        {
            $testResult = new TestResult();
            return $testResult->CalculateResult($_responsesData, $_pointsList);
        }

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

        public function ConvertResponsesToClass($responsesArray) 
        {
            $pointsList = $this->GetResponsesPointsArray();
            return $this->GetTestResult($responsesArray, $pointsList);
        }

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