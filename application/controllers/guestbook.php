<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guestbook extends CI_Controller {
	
	public function Guestbook() {
		parent::__construct();
	}
	
	public function index() {
		$messages = $this->Guestbook_model->getMessages();
		
		$this->view_data['page_title'] = 'Andreas CodeIgniter Guestbook';
		$this->view_data['page_header'] = 'Welcome to my CodeIgniter Guestbook!';
		$this->view_data['page_messages'] = $messages;
		
		$this->view_data['page_content'] = 'view_guestbook';
		$this->load->view('template', $this->view_data);
	}
	
	public function handler() {
		
		if(isset($_POST['doAdd'])) {
			$this->add_message();
			
		} 
		elseif(isset($_POST['doDelete'])) {
			$this->delete_messages();
		}
	}
	
	public function add_message() {
		$this->form_validation->set_rules('chat_name', 'Name', 'required|trim|max_length[20]|xss_clean|prep_for_form');
		$this->form_validation->set_rules('chat_message', 'Message', 'required|trim|max_length[500]|xss_clean|prep_for_form');
		
		if ($this->form_validation->run() == FALSE) {
			$messages = $this->Guestbook_model->getMessages();
		
			$this->view_data['page_title'] = 'Andreas CodeIgniter Guestbook!';
			$this->view_data['page_header'] = 'Welcome to my CodeIgniter Guestbook!';
			$this->view_data['page_messages'] = $messages;
			
			$this->view_data['page_content'] = 'view_guestbook';
			$this->load->view('template', $this->view_data);
		}
		else {
			$username = $this->input->post('chat_name');
			$password = $this->input->post('chat_message');
			
			$this->Guestbook_model->addMessage($username, $password); /* ADD THE INPUT! */
		
			redirect('guestbook');
		}
	}
	
	function delete_messages() {
		$this->Guestbook_model->deleteMessages(); /* ADD THE INPUT! */
		
		redirect('guestbook');
	}
	
}