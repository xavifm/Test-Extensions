<?php 
    include 'API_Questions.php';
    include 'API_Responses.php';

    class CronotypeAPI 
    {
        private $questionsData = new QuestionsData();
        private $responsesData = new ResponsesData();

        private $bearPoints = 0;
        private $lionPoints = 0;
        private $wolfPoints = 0;
        private $dolphinPoints = 0;

        private $cronotypeResult;

        function CalculateResult() 
        {
            //Calculate our test result
            //Every question response will increment points from every type.
            //The bigger score is gonna show up
        }

        function GetTestResult () 
        {
            $this->CalculateResult();
            return $this->cronotypeResult;
        }
    }
?>