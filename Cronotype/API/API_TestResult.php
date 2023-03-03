<?php 
    require_once 'API_Responses.php';

    class TestResult 
    {
        public $leonPoints; //1
        public $bearPoints; //2
        public $wolfPoints; //3
        public $dolphinPoints; //4

        public function ReturnBiggestResult($_pointsListArray) 
        {
            $elementsList = $_pointsListArray;
            $elementsListNameSearch = $_pointsListArray;
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