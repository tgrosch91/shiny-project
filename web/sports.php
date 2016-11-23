<?php
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("sports_page.php",["title"=>"Sports Stats"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Get file and turn each row into an array
        $csv = array_map('str_getcsv', file("../includes/batters_stats.csv"));
        //The first line in csv is the "key" to key-value pairs for rest of the rows
        $headers = $csv[0];
        //Took the first row in $headers, then removing the first row
        unset($csv[0]);

        //New array that will hold the objects (each row being an object)
        $rowsWithKeys = [];
        foreach ($csv as $row) {
            //New row is going to be associative array (or object)
            $newRow = [];
            foreach ($headers as $k => $key) {
                $newRow[$key] = $row[$k];
            }
            //Short hand way to append or add $newRow into $rowsWithKeys array
            $rowsWithKeys[] = $newRow;
        }

        //We can access what is submitted by $_POST[{name}] where {name} is the name field in select tag.
        //Usually for statement not needed if only one parameter passed, but this was a multiple select tag.
        $selectedStats = [];
        foreach ($_POST["stats"] as $selectedStat) {
            $selectedStats[] = $selectedStat;
        }

        //Change all strings to lower case to match the key in the rowsWithKeys object
        $selectedStats = array_map('strtolower', $selectedStats);

        //Find keys that match selectedStats and then put them into data for each player (or row)
        $data = [];
        //Array of keys so the table in views know what to display
        foreach($rowsWithKeys as $row){
            $newRow = [];
            foreach($row as $key => $value){
                if ($key == "player" || in_array($key, $selectedStats)){
                    $newRow[$key] = $value;
                }
            }
            $data[] = $newRow;
        }

        //Prepend players string in selected stats. PLayer is always first row in table
        array_unshift($selectedStats, "player");
        //You can pass in data to the view through render
        render("sports_page.php", ["data" => $data, "keys" => $selectedStats, "title" => "Scrabble Results"]);
    }
?>
