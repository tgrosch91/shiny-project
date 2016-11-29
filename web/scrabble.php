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


      $csvDicSorted = [];

      foreach($csvDic as $key => $value){
        $newValue = alphabetize($key, $value);
        $csvDicSorted[$key] = $newValue;
      }

      function add_to_possibilities($dictionary, $allLetters){
        $matchArrayKeys = []

      }

      $matchArrayKeys = array_keys($csvDicSorted, $selectedLettersString);

      $letterValues = [1 => ["a","e","i","l","n","o","r","s","t","u"], 2 => ["d","g"], 3 => ["b","c","m","p"], 4 => ["f","h","v","w","y"], 5 => ["k"], 8 => ["j","x"], 10 => ["q","z"]];

      var_dump($letterValues); die;



    }
?>
