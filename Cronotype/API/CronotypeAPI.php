<?php 
    include 'API_Questions.php';
    include 'API_Responses.php';
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
            $questionsData = new QuestionsData();

            $questionsArray = array(
                $questionsData->gender,
                $questionsData->age,
                $questionsData->soundsWakeMeUp,
                $questionsData->snoreWhileSleeping,
                $questionsData->snoreWhileSleeping_often,
                $questionsData->snoringType,
                $questionsData->foodPassion,
                $questionsData->wakeUpBeforeMyAlarmRings,
                $questionsData->sleepOnPlanes,
                $questionsData->irritableDueFatigue,
                $questionsData->worriesInSmallDetails,
                $questionsData->insomniacDiagnosis,
                $questionsData->anxiousAboutMyGrades,
                $questionsData->SleepRumiation,
                $questionsData->perfectionist,
                $questionsData->wakeUpHourFreeMode,
                $questionsData->alarmClock,
                $questionsData->wakeUpOnWeekends,
                $questionsData->jetLag,
                $questionsData->favoriteMeal,
                $questionsData->concentration,
                $questionsData->workout,
                $questionsData->mostAlert,
                $questionsData->fiveHourWorkday,
                $questionsData->brainQuestion,
                $questionsData->nap,
                $questionsData->efficiencyAndSaferHours,
                $questionsData->betterStatement,
                $questionsData->riskTakingComfort,
                $questionsData->selfConsider,
                $questionsData->studentType,
                $questionsData->firstWakeUp,
                $questionsData->appetiteInMorning,
                $questionsData->insomniaIntensity,
                $questionsData->lifeSatisfaction
            );

            return $questionsArray;
        }

        public function GetResponsesArray() 
        {
            $questionsData = new QuestionsData();

            $responsesDataArray = array(
                $questionsData->gender_R,
                $questionsData->age_R,
                $questionsData->soundsWakeMeUp_R,
                $questionsData->snoreWhileSleeping_R,
                $questionsData->snoreWhileSleeping_often_R,
                $questionsData->snoringType_R,
                $questionsData->foodPassion_R,
                $questionsData->wakeUpBeforeMyAlarmRings_R,
                $questionsData->sleepOnPlanes_R,
                $questionsData->irritableDueFatigue_R,
                $questionsData->worriesInSmallDetails_R,
                $questionsData->insomniacDiagnosis_R,
                $questionsData->anxiousAboutMyGrades_R,
                $questionsData->SleepRumiation_R,
                $questionsData->perfectionist_R,
                $questionsData->wakeUpHourFreeMode_R,
                $questionsData->alarmClock_R,
                $questionsData->wakeUpOnWeekends_R,
                $questionsData->jetLag_R,
                $questionsData->favoriteMeal_R,
                $questionsData->concentration_R,
                $questionsData->workout_R,
                $questionsData->mostAlert_R,
                $questionsData->fiveHourWorkday_R,
                $questionsData->brainQuestion_R,
                $questionsData->nap_R,
                $questionsData->efficiencyAndSaferHours_R,
                $questionsData->betterStatement_R,
                $questionsData->riskTakingComfort_R,
                $questionsData->selfConsider_R,
                $questionsData->studentType_R,
                $questionsData->firstWakeUp_R,
                $questionsData->appetiteInMorning_R,
                $questionsData->insomniaIntensity_R,
                $questionsData->lifeSatisfaction_R
            );

            return $responsesDataArray;
        }
    }
?>