<?php 
    include 'API_Responses.php';

    class TestResult 
    {
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

        public function CheckDraw($_points) 
        {
            $index1 = 0;
            $index2 = 0;
      
            foreach($_points as $element1)
            {
                $index2 = 0; 
                foreach($_points as $element2)
                {
                    if($index1 != $index2 && $element1 == $element2)
                        return true;
      
                    $index2++;
                }
                $index1++;
            }
      
            return false;
        }
        
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
                    if($this->CheckDraw($elementsList) == true)
                     return $elementsListNameSearch[$element];

                    foreach($textResponseArray as $text) 
                    {
                        if($text[0] == $element)
                            return $elementsListNameSearch[$element];
                    }
                }
            }

            return "ERROR!!!!!";
        }

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
                        $pointsListArray[$point[0]] += intval($point[1]);
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