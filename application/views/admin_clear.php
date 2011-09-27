<?php $this->load->view('admin_header'); ?>

<h2>Clear Database</h2>

<p>Use this to clear all players from the database.</p>
<p><b>NOTE: This can NOT be reversed.</b></p>

<p>
	<form>
		<input type="button" value="Clear Database" onclick="window.location.href='clear_database'"> 
	</form>
</p>

<?php $this->load->view('admin_footer'); ?>