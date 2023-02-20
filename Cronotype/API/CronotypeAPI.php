<?php 
    include 'API_Questions.php';
    include 'API_Responses.php';
    include 'API_TestResult.php';

    class CronotypeAPI 
    {
        public $questionsData;
        public $responsesData;
        private $testResult;

        public function ConvertResponsesToClass($responsesArray) 
        {
            
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

        public function GetTestResult ($_responsesData) 
        {
            $testResult = new TestResult();
            return $testResult->CalculateResult($_responsesData);
        }
    }
?>