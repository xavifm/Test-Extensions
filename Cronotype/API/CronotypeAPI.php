<?php 
    include 'API_Questions.php';
    include 'API_Responses.php';
    include 'API_TestResult.php';

    class CronotypeAPI 
    {
        private $questionsData;
        private $responsesData;
        private $testResult;

        public function GetTestResult () 
        {
            $responsesData = new ResponsesData();
            $questionsData = new QuestionsData();
            $testResult = new TestResult();
            return $testResult->CalculateResult($responsesData);
        }
    }
?>