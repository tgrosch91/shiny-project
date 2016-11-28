<div class="container scrabble">
  <div class="scrabble-header">
    <h2>Scrabble&trade; Word Helper<h2>
    </div>
<p>  Welcome to the Scrabble&trade; word program that will find words for you given a list of letters. To use this program enter the list of letters you have, select which dictionary you want to pull words from, and select how many results you wish to display! Results will display by top points. For more information on scrabble: <a href="http://www.puzzlers.org/dokuwiki/doku.php?id=solving%3awordlists%3aabout%3astart">Dictionaries To Use</a> <a href="http://www.scrabblepages.com/scrabble/rules/">Scrabble Rules</a></p>

<form action="scrabble.php" method="post">
    <div class="form-group">
        <select id="dictionary-choices" name="dictionaries" class="form-control">
          <option value = "../includes/ospd.csv">Official Scrabble Player's Dictionary</option>
          <option value = "../includes/enable1dictionary.csv">Enable</option>
          <option value = "../includes/web2dictionary.csv">Webster's New International</option>
          <option value = "../includes/mbsingledictionary.csv">Moby Words</option>
          <option value = "../includes/unixdict.csv">UNIX</option>
        </select>
    </div>
    <div class="form-group">
        <select id="letter-choices" name="alphabet_letters[]" class="form-control" multiple>
          <option value = "a">A</option>
          <option value = "b">B</option>
          <option value = "c">C</option>
          <option value = "d">D</option>
          <option value = "e">E</option>
          <option value = "f">F</option>
          <option value = "g">G</option>
          <option value = "h">H</option>
          <option value = "i">I</option>
          <option value = "j">J</option>
          <option value = "k">K</option>
          <option value = "l">L</option>
          <option value = "m">M</option>
          <option value = "n">N</option>
          <option value = "o">O</option>
          <option value = "p">P</option>
          <option value = "q">Q</option>
          <option value = "r">R</option>
          <option value = "s">S</option>
          <option value = "t">T</option>
          <option value = "u">U</option>
          <option value = "v">V</option>
          <option value = "w">W</option>
          <option value = "x">X</option>
          <option value = "y">Y</option>
          <option value = "z">Z</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit">View Options</button>
    </div>
</form>


</div>
