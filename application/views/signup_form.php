<?php $this->load->helper('form'); 

$attributes = array('id' => 'signupform');

$account_name_error = set_value('account_name');
$account_number_error = set_value('account_number');
$race_error = set_value('race');
$rank_name_error = set_value('rank');

$races = array(
                  '1'   => 'Random',
                  '2'   => 'Zerg',
                  '3'   => 'Protoss',
                  '4'   => 'Terran',
                );
$ranks = array(                  
                  '1'   => 'Bronze',
                  '2'   => 'Silver',
                  '3'   => 'Gold',
                  '4'   => 'Platnium',
                  '5'   => 'Diamond',
                  '6'   => 'Masters',
                  '7'   => 'Grandmasters'
                );
                
$account_name_field = array(
              'name'        => 'account_name',
              'id'          => 'account_name',
              'class'       => 'input',
              'value'       => $account_name_error,
              'maxlength'   => '15',
              'size'        => '15',
              //'style'       => 'width:50%',
            );
            
$account_number_field = array(
              'name'        => 'account_number',
              'id'          => 'account_number',
              'class'       => 'input',
              'value'       => $account_number_error,
              'maxlength'   => '3',
              'size'        => '15',
              //'style'       => 'width:50%',
            );
            
?>

<?php $this->load->view('header'); ?>

<?php echo form_open('signup'); ?>
<h3>Sign Up</h3>
<p>Sign up for your chance to play against an Evil Geniuses team member. Once you have signed up you will be added to our database and will have the chance to be randomly selected to play. Please be honest in your answer. The site will compare your answers to <a href="http://www.sc2ranks.com">SC2Ranks</a>. Your rank/race will not effect your chances to play!</p>
<p>&nbsp;</p>
<div class="signup_error"><?php echo validation_errors(); ?></div>

</p><div class="field">
    <label for="account_name">Character Name:</label>
        <?php echo form_input($account_name_field); ?>
    <p class="hint">Enter your SC2 Character Name.</p>
</div>
<div class="field">
    <label for="account_number">Character Number:</label>
        <?php echo form_input($account_number_field); ?>
    <p class="hint">Enter your SC2 Character Number.</p>
</div>
<div class="field">
    <label for="race">Race:</label>
        <?php echo form_dropdown('race', $races, $race_error, 'class="drop"');; ?>
    <p class="hint">Select your race.</p>
</div>
<div class="field">
    <label for="rank">League:</label>
        <?php echo form_dropdown('rank', $ranks, $rank_name_error, 'class="drop"');; ?>
    <p class="hint">Select your league.</p>
</div>
        <?php echo form_submit('submit', 'Submit', 'class="button"'); ?>

 
<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?> 
