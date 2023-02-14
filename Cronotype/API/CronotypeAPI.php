<?php 
    include 'API_Questions.php';
    include 'API_Responses.php';

    class CronotypeAPI 
    {
        private $questionsData = new QuestionsData();
        private $responsesData = new ResponsesData();

        private $cronotypeResult;

        function CalculateResult() 
        {
            //calculate our test result
        }

        function GetTestResult () 
        {
            $this->CalculateResult();
            return $this->cronotypeResult;
        }
    }
?>