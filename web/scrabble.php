<?php
    ini_set('max_execution_time', 300);

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

      $letterValueArray = ['a'=>1,'e'=>1,'i'=>1,'l'=>1,'n'=>1,'o'=>1,'r'=>1,'s'=>1,'t'=>1,'u'=>1,'d'=>2,'g'=>2,'b'=>3,'c'=>3,'m'=>3,'p'=>3,'f'=>4,'h'=>4,'v'=>4,'w'=>4,'y'=>4,'k'=>5,'j'=>8,'x'=>8,'q'=>10,'z'=>10];
      // may not end up using the following function. not sure how much time it would save and its a pain going back and forth from sorted alphabetically to sorted by value and i think i miss string values if i don't switch back and forth
    /*  function sort_by_tile_value($letterValues, $letterArray){
        $size = count($letterArray);
        for ($i=0; $i<$size; $i++) {
          for ($j=0; $j<$size-1-$i; $j++){
            $first = $letterArray[$j];
            $second = $letterArray[$j+1];
            $first_value = $letterValues[$first];
            $second_value = $letterValues[$second];
            if ($second_value < $first_value) {
                $a = $letterArray[$j];
                $b = $letterArray[$j+1];
                $letterArray[$j] = $b;
                $letterArray[$j+1] = $a;
                }
            }
          }
        return $letterArray;
      } */

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


      function checking_for_match($dictionary, $allLetters, $matchArrayKeys){
        $potentialMatch = array_keys($dictionary, $allLetters);
        if($potentialMatch != []){
          array_push($matchArrayKeys,$potentialMatch);
        }
        return $matchArrayKeys;
      }

      function layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete){
        $allLettersArray = str_split($allLetters);
        $allLettersArray = delete_at_positions($allLettersArray, $positions_to_delete);
        $allLettersShort = implode($allLettersArray);
        $matchArrayKeys = checking_for_match($dictionary, $allLettersShort, $matchArrayKeys);
        return $matchArrayKeys;
      }

      function delete_at_positions($array, $position_value_array){
        foreach ($position_value_array as $position){
          unset($array[$position]);
        }
        return $array;
      }


      function add_to_possibilities($dictionary, $allLetters){
        $matchArrayKeys = [];
        $matchArrayKeys = checking_for_match($dictionary, $allLetters, $matchArrayKeys);
        for ($ix = 0; $ix < strlen($allLetters); $ix++){
          $positions_to_delete = [$ix];
          $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
          for ($iz = 1; $iz < (strlen($allLetters) - $iz); $iz++){
            $position_addition = ($ix + $iz);
            array_push($positions_to_delete, $position_addition);
            $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
          }
        }
        return $matchArrayKeys;
      }

      $matchArrayKeys = add_to_possibilities($csvDicSorted,$selectedLettersString);




    var_dump($matchArrayKeys); die;



    }
?>
