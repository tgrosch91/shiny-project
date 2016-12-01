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
      //$letterCount = count($selectedLettersArray);
      //sort($selectedLettersArray);
    //  $selectedLettersString = implode($selectedLettersArray);

  /* function trim_spaces($dictionary){
      foreach ($dictionary as $value){
        $value = trim($value);
        //var_dump($value);die;
      }
      return $dictionary;
    }

    $csvDicShort = trim_spaces($csvDic);
    var_dump($csvDicShort);die;
    */

    $csvDicTrim = array_map('trim', $csvDic);
    //var_dump($csvDicTrim);die;

    function test_word($wordArray, $letterInput){
      $match =[];
      $existsList=[];
        foreach($wordArray as $letter){
          //var_dump($letter);die;
          if(in_array($letter,$letterInput)){
            $first_position = array_search($letter, $letterInput);
            unset($letterInput[$first_position]);
            //var_dump($letterInput);die;
            array_push($existsList, "True");
            //var_dump($existsList);die;
          }
          else{
            array_push($existsList, "False");
          }
        }
        //var_dump($existsList);die;
        $uniqueValues = count(array_unique($existsList));
        //var_dump($uniqueValues);die;
        if ($uniqueValues === 1 and $existsList[0] === "True"){
        //  var_dump($uniqueValues);die;
          $word = implode($wordArray);
          $match = $word;
        }
        return $match;
        //var_dump($match);die;
      }

    function test_and_add($dictionary, $letterInput) {
      $matches = [];
      foreach ($dictionary as $word){
        $wordArray = str_split($word);
        //var_dump($wordArray);die;
        $match = test_word($wordArray, $letterInput);
        if ($match != []){
        //var_dump($match);die;
          array_push($matches, $match);
        }
      }
      return $matches;
      //var_dump($matches);die;
    }

$testdic = ["blue", "but", "blt", "iii"];
$testinput = ["b", "l", "u", "t"];

$matchValues = test_and_add($csvDicTrim, $selectedLettersArray);
//var_dump($selectedLettersArray);die;
var_dump($matchValues);die;


    //  $csvDic = array_flip($csvDic);

    /*  function alphabetize($key, $value)
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
      } */

    /*  function custom_intersect($arrayOne, $arrayTwo){
        sort($arrayOne);
        sort($arrayTwo);
        if ($arrayOne === $arrayTwo){
          return $arrayTwo;
        }
      }




      function checking_for_match($dictionary, $allLetters, $matchArrayKeys){
        $allLettersArray = str_split($allLetters);
        $initial_count = count($allLettersArray);
        foreach ($dictionary as $word){
          $test_array = str_split($word);
          $return_array = custom_intersect($allLettersArray, $test_array);
          if($return_array != null){
            $matchString = implode($test_array);
            array_push($matchArrayKeys,$matchString);
          }
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

      function layer_two_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete){
        for ($ix = 0; $ix < strlen($allLetters); $ix++){
          $positions_to_delete = [$ix];
          $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
          for ($iz = 1; $iz < strlen($allLetters); $iz++){
            $position_addition = ($ix + $iz);
            array_push($positions_to_delete, $position_addition);
            $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
          }
        }
        return $matchArrayKeys;
      }


      function add_to_possibilities($dictionary, $allLetters){
        $matchArrayKeys = [];
        $matchArrayKeys = checking_for_match($dictionary, $allLetters, $matchArrayKeys);
        for ($iy = 0; $iy < strlen($allLetters); $iy++){
          for ($ix = 0; $ix < strlen($allLetters); $ix++){
            $positions_to_delete = [$ix];
            $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
            for ($iz = 1; $iz < strlen($allLetters); $iz++){
              $position_addition = ($ix + $iz);
              array_push($positions_to_delete, $position_addition);
              $matchArrayKeys = layer_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
            }
          }
          $matchArrayKeys = layer_two_search($allLetters, $dictionary, $matchArrayKeys, $ix, $positions_to_delete);
          $allLettersArray = str_split($allLetters);
          $front = array_shift($allLettersArray);
          $allLettersArray[-1] = $front;
          $allLetters = implode($allLettersArray);
        }
      return $matchArrayKeys;
      }

      $matchArrayKeys = add_to_possibilities($csvDic,$selectedLettersString);

      $uniqueMatches = array_unique($matchArrayKeys);

      */
    //  var_dump($uniqueMatches); die;



    }
?>
