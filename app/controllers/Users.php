<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Users extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->call->model(array('users_model'));
	}

	public function index()
	{
		$data = $this->users_model->get_all_users();
		$this->call->view('homepage', $data);
	}

	public function add_users()
	{

		if ($this->form_validation->submitted()) {
			$this->form_validation
				->name('lastname')->required('User not added! Lastname is required.')
				->name('firstname')->required('User not added! Firstname is required.')
				->name('email')->required('User not added! Email is required.')
				->valid_email()
				->name('Gender')->required()
				->name('address')->required('User not added! address is required.');
			if ($this->form_validation->run()) {
				$lastname = $this->io->post('lastname', TRUE);
				$firstname = $this->io->post('firstname', TRUE);
				$email = $this->io->post('email', TRUE);
				$gender = $this->io->post('Gender', TRUE);
				$address = $this->io->post('address', TRUE);
				if (
					$this->users_model->add_users(
						$lastname,
						$firstname,
						$email,
						$gender,
						$address
					)
				)
					set_flash_alert('success', 'New user added successfully!');
			redirect('home');
			} else {
				set_flash_alert('danger', $this->form_validation->errors());
				redirect('add_users');
			}
		}
		$this->call->view('add_users');
	}

	public function edit_users($id)
	{

		$user = $this->users_model->get_user_by_id($id);

		// Handle form submission for updating user
		if ($this->form_validation->submitted()) {
			$this->form_validation
				->name('lastname')->required()
				->name('firstname')->required()
				->name('email')->required()->valid_email()
				->name('Gender')->required()
				->name('address')->required();

			if ($this->form_validation->run()) {
				$lastname = $this->io->post('lastname', TRUE);
				$firstname = $this->io->post('firstname', TRUE);
				$email = $this->io->post('email', TRUE);
				$gender = $this->io->post('Gender', TRUE);
				$address = $this->io->post('address', TRUE);

				// Update user in the database
				if ($this->users_model->update_user($id, $lastname, $firstname, $email, $gender, $address)) {
					set_flash_alert('success', 'Edited successfully!');
					redirect('home');
					 // Redirect after successful update
				
				}
			}
			else {
				set_flash_alert('danger', $this->form_validation->errors());
				redirect('edit_users');
			}
		}
		$this->call->view('edit_users', ['user' => $user]);
	}

	public function delete_users($id)
	{
		if ($this->users_model->delete_users($id)) {

			set_flash_alert('success', 'deleted successfully!');
					redirect('home');
			
			
		}
	}
}
