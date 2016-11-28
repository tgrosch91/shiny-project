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
      //I'm hoping what this does is pull the value(the file path)

      $csv = file($selectedDic);


      var_dump($csv[17]); die;

    }
?>
