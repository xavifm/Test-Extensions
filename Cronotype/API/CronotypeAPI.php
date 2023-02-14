<?php 
    include 'API_Questions.php';

    class CronotypeAPI 
    {
        private $questionsData = new QuestionsData();

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