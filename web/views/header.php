<!DOCTYPE html>

<html>

    <head>
        <!-- viewport to make things more responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- http://getbootstrap.com/ -->

        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Project Shiny : <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Project Shiny 2016</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/youtube-scripts.js"></script>

        <script src="js/ign-scripts.js"></script>


    </head>

    <body>
        <div id="top">
          <ul class="nav nav-pills">
              <li><a href="index.php" >Home</a></li>
              <li><a href="scrabble.php">Scrabble&trade;</a></li>
              <li><a href="sports.php">Sports Stats</a></li>
              <li><a href="youtube.php">Youtube</a></li>
              <li><a href="bands.php">Find Bands</a></li>
              <li><a href="ign.php">IGN API</a></li>
              <li><a href="convertdate.php">Convert Date</a></li>
          </ul>
        </div>

        <div id="middle">
