<?php $this->load->view('admin_header');
$this->load->helper('form');

$races = array(
                  '0'   => '-',
                  '1'   => 'Random',
                  '2'   => 'Zerg',
                  '3'   => 'Protoss',
                  '4'   => 'Terran',
                );
$ranks = array(                  
                  '0'   => '-',
                  '1'   => 'Bronze',
                  '2'   => 'Silver',
                  '3'   => 'Gold',
                  '4'   => 'Platnium',
                  '5'   => 'Diamond',
                  '6'   => 'Masters',
                  '7'   => 'Grandmasters'
                );
                
$limit = array(
                  '1'   => '1',
                  '2'   => '2',
                  '3'   => '3',
                  '4'   => '4',
                  '10'   => '10',
                  '15'   => '15',
                  '25'   => '25',
                  '50'   => '50',
                  '100'   => '100',
                );                
 
 ?>

<h2>Your Players... (10 Players)</h2>

<p>Here are some random players. Refresh to get a new list. You can also use to player search option at the bottom to narrow down your list.</p>

<table id="ptable" cellspacing="0">
<tr>
  <th scope="col">Player Name</th>
  <th scope="col">Player Number</th>
  <th scope="col">Race</th>
  <th scope="col">Rank</th>
  
</tr>

<?php if (isset($players)): foreach ($players as $p): ?>
<tr> 
<td><?php echo $p['account_name']; ?></td> 
<td><?php echo $p['account_number']; ?></td>
<td>
<?php 
switch ($p['race']) {
    case 1:
        echo '<img src="/media/random.png"/> Random';
        break;
    case 2:
        echo '<img src="/media/zerg.png"/> Zerg';
        break;
    case 3:
        echo '<img src="/media/protoss.png"/> Protoss';
        break;
    case 4:
        echo '<img src="/media/terran.png"/> Terran';
        break;
}
?>
</td>
<td>
<?php 
switch ($p['rank']) {
    case 1:
        echo "Bronze";
        break;
    case 2:
        echo "Silver";
        break;
    case 3:
        echo "Gold";
        break;
    case 4:
        echo "Platnium";
        break;
    case 5:
        echo "Diamond";
        break;
    case 6:
        echo "Masters";
        break;
    case 7:
        echo "Grand Masters";
        break;
}
 ?>
 </td>
 </tr>
<?php endforeach; else: ?>
 
    <h2>No Players Found</h2>
 
<?php endif; ?>

</table>
<p> </p>
<h2>Player Search</h2>
<p>Narrow down your list of players:</p>
<?php echo form_open(''); ?>
<p>Player(s) play(s) <?php echo form_dropdown('race', $races); ?> and is in the <?php echo form_dropdown('rank', $ranks); ?> league. ( Limit: <?php echo form_dropdown('limit', $limit); ?> )
<?php echo form_submit('submit', 'Search'); ?></p>


<?php $this->load->view('admin_footer'); ?>