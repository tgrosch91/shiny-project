<?php
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("scrabble_page.php", ["title"=>"Scrabble Page"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //We can access what is submitted by $_POST[{name}] where {name} is the name field in select tag.
      $selectedDic = "";
      $selectedDic = $_POST["dictionaries"];

      $csvDic = file($selectedDic);

      $selectedLetters = $_POST["alphabet_letters"];
      preg_match_all("/[a-z]/i", $selectedLetters, $selectedLettersArrayLong);
      $selectedLettersArray = $selectedLettersArrayLong[0];
      $letterCount = count($selectedLettersArray);
      sort($selectedLettersArray);
      $selectedLettersString = implode($selectedLettersArray);

      $letterValues = [1 => ["a","e","i","l","n","o","r","s","t","u"], 2 => ["d","g"], 3 => ["b","c","m","p"], 4 => ["f","h","v","w","y"], 5 => ["k"], 8 => ["j","x"], 10 => ["q","z"]];


      foreach ($csvDic as &$value){

        $value = trim($value);
      }

      $csvDic = array_flip($csvDic);

      function alphabetize($key, $value)
      {
        $keyParts = str_split($key);
        sort($keyParts);
        $value = implode($keyParts);
        return $value;
      }

      function sort_by_tile_value($letterValues, $letterArray){
        $size = count($letterArray);
        for ($i=0; $i<$size; $i++) {
          for ($j=0; $j<$size-1-$i; $j++) {
            $first=$letterArray[$j];
            //right now this isn't working because array_keys is just searching for first, not the value that contains first
            //may need to switch up how i'v organized letter_values
            $first_value = array_keys($letterValues, $first);
            $second_value = array_values(array_keys($letterValues, $letterArray[$j+1]));
            var_dump($first); die;
            if ($second_value < $first_value) {
              swap($letterArray, $first_value, $second_value);
            }
          }
        }
        return $letterArray;
      }

      function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
        }

      $test_array = ["a","z","d"];

      $testResult = sort_by_tile_value($letterValues, $test_array);
      var_dump($testResult); die;


      $csvDicSorted = [];

      foreach($csvDic as $key => $value){
        $newValue = alphabetize($key, $value);
        $csvDicSorted[$key] = $newValue;
      }

      function add_to_possibilities($dictionary, $allLetters){
        $matchArrayKeys = [];

      }

      $matchArrayKeys = array_keys($csvDicSorted, $selectedLettersString);


      //var_dump($letterValues); die;



    }
?>
