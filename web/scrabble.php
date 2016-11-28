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

      $csv = file($selectedDic);
      $selectedLetters = [];
      $selectedLetters = $_POST["alphabet_letters"];
      $letterCount = count($selectedLetters);

      var_dump($letterCount); die;

    //  var_dump($csv[17]); die;

    }
?>
