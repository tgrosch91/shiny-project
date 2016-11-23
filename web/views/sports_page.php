<div class="container">
    <div class="sports-header">
        <h2>Sports Stats</h2>
        <p>
            We have preloaded players with their stats, please select the stats you would like to display in the table!
        </p>
        <p>
            Use control to select multiple stats.
        </p>
    </div>
    <form action="sports.php" method="post">
        <div class="form-group">
            <select id="sports-stats" name="stats[]" class="form-control" multiple>
              <option>AVG</option>
              <option>OBP</option>
              <option>SLG</option>
              <option>OPS</option>
              <option>SB</option>
              <option>RBI</option>
              <option>RUNS</option>
              <option>HR</option>
              <option>Walks</option>
              <option>GP</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Show Stats!</button>
        </div>
    </form>
    <?php if(!empty($data)): ?>
        <table class = "table table-bordered players">
            <thead>
                <tr>
                    <?php foreach($keys as $key): ?>
                        <?php switch($key):
                        case 'player': ?>
                        <th class="player">Player</th>
                        <?php break;?>
                        <?php case 'avg': ?>
                        <th class="player">AVG</th>
                        <?php break;?>
                        <?php case 'obp': ?>
                        <th class="player">OBP</th>
                        <?php break;?>
                        <?php case 'slg': ?>
                        <th class="player">SLG</th>
                        <?php break;?>
                        <?php case 'ops': ?>
                        <th class="player">OPS</th>
                        <?php break;?>
                        <?php case 'sb': ?>
                        <th class="player">SB</th>
                        <?php break;?>
                        <?php case 'rbi': ?>
                        <th class="player">RBI</th>
                        <?php break;?>
                        <?php case 'runs': ?>
                        <th class="player">RUNS</th>
                        <?php break;?>
                        <?php case 'hr': ?>
                        <th class="player">HR</th>
                        <?php break;?>
                        <?php case 'walks': ?>
                        <th class="player">Walks</th>
                        <?php break;?>
                        <?php case 'gp': ?>
                        <th class="player">GP</th>
                        <?php break;?>
                        <?php endswitch ?>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody class = "players-table">
                <?php foreach($data as $player): ?>
                    <tr>
                        <?php foreach($player as $key=>$value): ?>
                            <td><?= $value?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>
