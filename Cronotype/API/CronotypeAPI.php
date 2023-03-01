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
        private $testResult;

        public function GetTestResult ($_responsesData) 
        {
            $testResult = new TestResult();
            return $testResult->CalculateResult($_responsesData);
        }

        public function ConvertResponsesToClass($responsesArray) 
        {
            $responsesData = new ResponsesData();

            $responsesData->gender = $responsesArray[0];
            $responsesData->age = $responsesArray[1];
            $responsesData->soundsWakeMeUp = $responsesArray[2];
            $responsesData->snoreWhileSleeping = $responsesArray[3];
            $responsesData->snoreWhileSleeping_often = $responsesArray[4];
            $responsesData->snoringType = $responsesArray[5];
            $responsesData->foodPassion = $responsesArray[6];
            $responsesData->wakeUpBeforeMyAlarmRings = $responsesArray[7];
            $responsesData->sleepOnPlanes = $responsesArray[8];
            $responsesData->irritableDueFatigue = $responsesArray[9];
            $responsesData->worriesInSmallDetails = $responsesArray[10];
            $responsesData->insomniacDiagnosis = $responsesArray[11];
            $responsesData->anxiousAboutMyGrades = $responsesArray[12];
            $responsesData->SleepRumiation = $responsesArray[13];
            $responsesData->perfectionist = $responsesArray[14];
            $responsesData->wakeUpHourFreeMode = $responsesArray[15];
            $responsesData->alarmClock = $responsesArray[16];
            $responsesData->wakeUpOnWeekends = $responsesArray[17];
            $responsesData->jetLag = $responsesArray[18];
            $responsesData->favoriteMeal = $responsesArray[19];
            $responsesData->concentration = $responsesArray[20];
            $responsesData->workout = $responsesArray[21];
            $responsesData->mostAlert = $responsesArray[22];
            $responsesData->fiveHourWorkday = $responsesArray[23];
            $responsesData->brainQuestion = $responsesArray[24];
            $responsesData->nap = $responsesArray[25];
            $responsesData->efficiencyAndSaferHours = $responsesArray[26];
            $responsesData->betterStatement = $responsesArray[27];
            $responsesData->riskTakingComfort = $responsesArray[28];
            $responsesData->selfConsider = $responsesArray[29];
            $responsesData->studentType = $responsesArray[30];
            $responsesData->firstWakeUp = $responsesArray[31];
            $responsesData->appetiteInMorning = $responsesArray[32];
            $responsesData->insomniaIntensity = $responsesArray[33];
            $responsesData->lifeSatisfaction = $responsesArray[34];

            return $this->GetTestResult($responsesData);
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