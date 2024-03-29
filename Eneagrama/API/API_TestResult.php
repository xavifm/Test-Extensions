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

        public function CheckDraw($_points, $_higherPoints) 
        {
            $index1 = 0;
            $index2 = 0;
      
            foreach($_points as $element1)
            {
                $index2 = 0; 
                foreach($_points as $element2)
                {
                    if($element1 == $_higherPoints && $index1 != $index2 && $element1 == $element2)
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

            if($this->CheckDraw($elementsList, $lastElement) == true)
                return "Se ha detectado un empate en el test, modifica algunas preguntas!";
            
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