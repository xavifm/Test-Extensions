<?php 
    include 'API_Responses.php';

    class TestResult 
    {
        //ReturnResponseTextArray returns the JSON text for every test result, stored inside the json as an array called: ResultText, returns an string array
        public function ReturnResponseTextArray() 
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

                return $configArray->parameters->ResultText; 
            }  

            return "ERROR!!!!!";
        }
        
        //ReturnBiggestResult sorts your test scores from smallest to biggest, and returns the highest score element as the test result string stored inside the JSON file
        public function ReturnBiggestResult($_pointsListArray) 
        {
            $elementsList = $_pointsListArray;
            $elementsListNameSearch = $_pointsListArray;
            $textResponseArray = $this->ReturnResponseTextArray();
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
                {
                    foreach($textResponseArray as $text) 
                    {
                        if($text[0] == $element)
                            return $text[1];
                    }
                }
            }

            return "ERROR!!!!!";
        }

        //ReturnBiggestResult starts building your test result points list for every test result element and calls the ReturnBiggestResult to returen the test result
        public function CalculateResult($responsesData, $pointsList) 
        {
            $pointsListArray = array();

            $index = 0;
            foreach($pointsList as $points) 
            {
                $index2 = 0;
                foreach($points as $point) 
                {
                    if($responsesData[$index] == $index2) 
                    {
                        foreach($point as $element) 
                        {
                            $pointsListArray[$element]++;
                        }
                    }
                    $index2++;
                }
                $index++;
            }

            //Calculate our test result
            //Every question response will increment points from every type.
            //The bigger score is gonna show up
            //Test points zone

            return $this->ReturnBiggestResult($pointsListArray);
        }
    }
?>