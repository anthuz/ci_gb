$(document).ready(function() {
	$("#submit_message").click(function() {
		//alert("name: " + $("#chat_name").val() + ", message: " + $("#chat_message").val());
	});
	
	
	$("#chat_name").click(function() {
		$("#chat_name").val('');
	});
	
	$("#chat_message").click(function() {
		$("#chat_message").val('');
	});
});