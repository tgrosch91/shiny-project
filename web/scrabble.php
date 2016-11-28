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

      $csvarray = fgetcsv($csv, "/n");
      //Here I'm trying to turn the csv file into an array. Not sure if I've done this correctly.
      //It's saying in the error message that $csv at this point is an array?

      $csvarray = array('strtolower', $csvarray);
      //Change all strings in the array to lower case?

      $test = var_dump($csvarray[15]);

      echo $test;


    }
?>
