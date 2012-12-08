<style type="text/css">
	div#chat_viewport {
		height: 500px;
		padding: 10px;
		border: 1px solid black;
		overflow: auto;
	}
	
	#chat_message {
		margin-left: 10px;
		min-width: 300px;
	}
	
	#chat_name {
		margin-left: 29px;
		min-width: 300px;
	}
	
	#delete_messages {
		margin-left: 20px;
	}
	
	.message {
		background-color: #F0F0F0;
		border: 1px dotted black;
		margin: 10px;
		padding: 10px;
	}
	
</style>

<p>Use the form below to write in the guestbook!</p>

<div id="chat_viewport">
	<?php 		
		$i = 0;
		if($page_messages) {
			foreach ($page_messages as $messages) {
					echo "<div class='message'>";
					echo '<b>' . $messages['name'] . '</b>: ' . $messages['message'] . '<br/>';
					echo '<br/>Created: ' . $messages['date'] . '<br/>';
					echo "</div>";
					$i++;
			}
		}
		else {
			echo 'No messages found!';
		}
	?>
</div>

<div id="chat_input">
	<?php 
	echo form_open('guestbook/handler');
		
		echo '<p>Name:   ';
		echo form_input(array('id' => 'chat_name', 'name' => 'chat_name', 'value' => ''));
		echo '</p>';
		
		echo '<p>Message: ';	
		echo form_textarea(array('id' => 'chat_message', 'name' => 'chat_message', 'value' => ''));
		echo '</p>';
		
		echo form_submit(array('id' => 'add_message', 'name' => 'doAdd'), 'Send message');
		echo form_submit(array('id' => 'delete_messages', 'name' => 'doDelete'), 'Delete all messages');
	
		echo validation_errors();
	echo form_close();
	?>
	<div class="clearer"></div>
</div>