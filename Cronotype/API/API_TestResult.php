<?php 
    require_once 'API_Responses.php';

    class TestResult 
    {
        public $lionPoints; //1
        public $bearPoints; //2
        public $wolfPoints; //3
        public $dolphinPoints; //4

        public function ReturnBiggestResult($_lionPoints, $_bearPoints, $_wolfPoints, $_dolphinPoints) 
        {
            $elementsList = array("lion" => $_lionPoints, "bear" => $_bearPoints, "wolf" => $_wolfPoints, "dolphin" => $_dolphinPoints);
            $elementsListNameSearch = array("lion" => $_lionPoints, "bear" => $_bearPoints, "wolf" => $_wolfPoints, "dolphin" => $_dolphinPoints);
            sort($elementsList);

            $lastElement = 0;
            
            print_r($elementsListNameSearch);

            foreach($elementsList as $element)
            {
                $lastElement = $element;
            }

            foreach(array_keys($elementsListNameSearch) as $element)
            {
                if($elementsListNameSearch[$element] == $lastElement)
                    return $element;
            }

            return "ERROR!!!!!";
        }

        public function CalculateResult(ResponsesData $responsesData) 
        {
            $lionPoints = 50;
            $bearPoints = 0;
            $wolfPoints = 200;
            $dolphinPoints = 20;

            //Calculate our test result
            //Every question response will increment points from every type.
            //The bigger score is gonna show up
            //Test points zone

            //Bool
            
            if($responsesData->soundsWakeMeUp == true) 
                $dolphinPoints++;
            else
            {
                $lionPoints++;
                $bearPoints++;
                $wolfPoints++;
            }

            //______________________________________________________________

            //SnoreQuestion

            if($responsesData->snoreWhileSleeping == true) 
            {
                $lionPoints++;
                $bearPoints++;
                
                //Subquestion_1

                if($responsesData->snoreWhileSleeping_often == 0)
                    $bearPoints++;

                if($responsesData->snoreWhileSleeping_often == 1)
                    $bearPoints++;

                if($responsesData->snoreWhileSleeping_often == 2)
                    $lionPoints++;

                if($responsesData->snoreWhileSleeping_often == 3)
                    $lionPoints++;

                //Subquestion_2

                if($responsesData->snoringType == 0)
                    $lionPoints++;

                if($responsesData->snoringType == 1)
                    $lionPoints++;

                if($responsesData->snoringType == 2)
                    $bearPoints++;

                if($responsesData->snoringType == 3)
                    $bearPoints++;
            }
            else
            {
                $wolfPoints++;
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->foodPassion == true) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            else
            {
                $wolfPoints++;
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->wakeUpBeforeMyAlarmRings == true) 
            {
                $lionPoints++;
            }
            else
            {
                $bearPoints++;
                $wolfPoints++;
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->sleepOnPlanes == true) 
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
            else
            {
                $lionPoints++;
                $bearPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->irritableDueFatigue == true) 
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
            else
            {
                $lionPoints++;
                $bearPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->worriesInSmallDetails == true) 
            {
                $dolphinPoints++;
            }
            else
            {
                $wolfPoints++;
                $lionPoints++;
                $bearPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->irritableDueFatigue == true) 
            {
                $dolphinPoints++;
            }
            else
            {
                $lionPoints++;
                $bearPoints++;
                $wolfPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->anxiousAboutMyGrades == true) 
            {
                $lionPoints++;
                $bearPoints++;
                $wolfPoints++;
            }
            else
            {
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->SleepRumiation == true) 
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
            else
            {
                $lionPoints++;
                $bearPoints++;
            }

            //______________________________________________________________

            //Bool

            if($responsesData->perfectionist == true) 
            {
                $dolphinPoints++;
            }
            else
            {
                $wolfPoints++;
                $lionPoints++;
                $bearPoints++;
            }

            //______________________________________________________________

            //Multichoice

            if($responsesData->wakeUpHourFreeMode == 0)
                $lionPoints++;
        
            if($responsesData->wakeUpHourFreeMode == 1)
                $bearPoints++;
        
            if($responsesData->wakeUpHourFreeMode == 2)
            {
                $wolfPoints++;
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Multichoice

            if($responsesData->alarmClock == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
        
            if($responsesData->alarmClock == 1) 
            {
                $dolphinPoints++;
            }
        
            if($responsesData->alarmClock == 2)
            {
                $wolfPoints++;
            }

            //______________________________________________________________

            //Multichoice

            if($responsesData->wakeUpOnWeekends == 0) 
            {
                $lionPoints++;
            }
            
            if($responsesData->wakeUpOnWeekends == 1) 
            {
                $bearPoints++;
            }
            
            if($responsesData->wakeUpOnWeekends == 2)
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
           
            //______________________________________________________________

            //Multichoice

            if($responsesData->jetLag == 0) 
            {
                $dolphinPoints++;
            }
            
            if($responsesData->jetLag == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->jetLag == 2)
            {
                $lionPoints++;
                $bearPoints++;
            }
                       
            //______________________________________________________________

            //Multichoice

            if($responsesData->favoriteMeal == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->favoriteMeal == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->favoriteMeal == 2)
            {
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Multichoice

            if($responsesData->concentration == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->concentration == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->concentration == 2)
            {
                $dolphinPoints++;
            }

            //______________________________________________________________

            //Multichoice

            if($responsesData->workout == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->workout == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->workout == 2)
            {
                $dolphinPoints++;
            }

            //______________________________________________________________


            //Multichoice

            if($responsesData->mostAlert == 0) 
            {
                $lionPoints++;
            }
            
            if($responsesData->mostAlert == 1) 
            {
                $bearPoints++;
                $wolfPoints++;
            }
                        
            if($responsesData->mostAlert == 2)
            {
                $dolphinPoints++;
            }
            
            //______________________________________________________________
            
            //Multichoice

            if($responsesData->fiveHourWorkday == 0) 
            {
                $lionPoints++;
            }
            
            if($responsesData->fiveHourWorkday == 1) 
            {
                $bearPoints++;
            }
            
            if($responsesData->fiveHourWorkday == 2)
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
            
            //______________________________________________________________

            //Multichoice

            if($responsesData->brainQuestion == 0) 
            {
                $lionPoints++;
            }
                        
            if($responsesData->brainQuestion == 1) 
            {
                $wolfPoints++;
                $bearPoints++;
            }
                        
            if($responsesData->brainQuestion == 2)
            {
                $dolphinPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->nap == 0) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->nap == 1) 
            {
                $lionPoints++;
                $bearPoints++;
            }
                        
            if($responsesData->nap == 2)
            {
                $dolphinPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->efficiencyAndSaferHours == 0) 
            {
                $bearPoints++;
            }
            
            if($responsesData->efficiencyAndSaferHours == 1) 
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
            
            if($responsesData->efficiencyAndSaferHours == 2)
            {
                $lionPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->betterStatement == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->betterStatement == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->betterStatement == 2)
            {
                $dolphinPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->riskTakingComfort == 0) 
            {
                $dolphinPoints++;
            }
            
            if($responsesData->riskTakingComfort == 1) 
            {
                $bearPoints++;
                $wolfPoints++;
            }
            
            if($responsesData->riskTakingComfort == 2)
            {
                $lionPoints++;
            }
                        
            //______________________________________________________________


            //Multichoice

            if($responsesData->selfConsider == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->selfConsider == 1) 
            {
                $dolphinPoints++;
            }
            
            if($responsesData->selfConsider == 2)
            {
                $lionPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->studentType == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
            
            if($responsesData->studentType == 1) 
            {
                $wolfPoints++;
            }
            
            if($responsesData->studentType == 2)
            {
                $dolphinPoints++;
            }
                        
            //______________________________________________________________

            //Multichoice <-- MISSING

            if($responsesData->firstWakeUp == 0) 
            {
            }
            
            if($responsesData->firstWakeUp == 1) 
            {
            }
            
            if($responsesData->firstWakeUp == 2)
            {
            }
                        
            //______________________________________________________________

            //Multichoice

            if($responsesData->appetiteInMorning == 0) 
            {
                $lionPoints++;
            }
            
            if($responsesData->appetiteInMorning == 1) 
            {
                $bearPoints++;
            }
            
            if($responsesData->appetiteInMorning == 2)
            {
                $wolfPoints++;
                $dolphinPoints++;
            }
                                    
            //______________________________________________________________

            //Multichoice

            if($responsesData->insomniaIntensity == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
                        
            if($responsesData->insomniaIntensity == 1) 
            {
                $wolfPoints++;
            }
                        
            if($responsesData->insomniaIntensity == 2)
            {
                $dolphinPoints++;
            }
                                                
            //______________________________________________________________

            //Multichoice

            if($responsesData->lifeSatisfaction == 0) 
            {
                $lionPoints++;
                $bearPoints++;
            }
                        
            if($responsesData->lifeSatisfaction == 1) 
            {
                $wolfPoints++;
            }
                        
            if($responsesData->lifeSatisfaction == 2)
            {
                $dolphinPoints++;
            }
                                                
            //______________________________________________________________

            return $this->ReturnBiggestResult($lionPoints, $bearPoints, $wolfPoints, $dolphinPoints);
        }
    }
?>