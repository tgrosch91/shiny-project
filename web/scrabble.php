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
      $selectedLetters = [];
      $selectedLetters = $_POST["alphabet_letters"];
      $letterCount = count($selectedLetters);


      foreach ($csvDic as &$value){
        $value = trim($value);
      }

      $csvDic = array_flip($csvDic);

      function alphabetize($key, $value)
      {
        $keyParts = str_split($key);
        sort($keyParts);
        $value = implode('', $keyParts);
      }

      

      $csvDicSorted = array_map("alphabetize", array_keys($csvDic), $csvDic);


      var_dump($csvDicSorted); die;



    }
?>
