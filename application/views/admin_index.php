<?php $this->load->view('admin_header'); ?>
<h2>Admin Panel</h2>
<p>Welcome. This panel will allow you to get players and manage the database. Click on "Get Players" in the top right to get players.</p>

<p>There are currently <b><?php echo $player_count; ?></b> players in the database.</center></p>
<p><a href="/auth/logout">Logout</a></p>
	<?php $this->load->view('admin_footer'); ?>
