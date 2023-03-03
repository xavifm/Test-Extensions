<?php 
    ini_set('display_errors', 0);
    include 'API_TestResult.php';

    if($_POST["GetTestResult"] == "true") 
    {
        $api = new CronotypeAPI();
        echo $api->ConvertResponsesToClass($_POST["ResponsesFromTest"]);
    }

    class CronotypeAPI 
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

            //var_dump($responsesPointsDataArray);

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