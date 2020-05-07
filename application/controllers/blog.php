<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home(){

		$this->load->library('wurfl');

		if($this->wurfl->get('ux_full_desktop')){
			echo "This is a desktop browser <br/>\n";
		}
		else{
			echo "This is a mobile device. <br/>\n";
			echo 'Device: '.$this->wurfl->get('brand_name').' '.$this->wurfl->get('model_name')." <br/>\n";
		}

		$this->load->model('blog_model');

		//gather data from model
		$data['games'] = $this->blog_model->getGames();
		$data['categories']	= $this->blog_model->getCategories();

		//Load Multiple Pages Views(header, blog content, footer)
		$this->load->view('includes/header');
		$this->load->view('blog_view',$data);
		$this->load->view('includes/footer',$data);
	}

	public function games($category = NULL){
		$this->load->model('blog_model');
		
		//check if category isset or njot
		if($category)
			$data['games'] = $this->blog_model->getGamesOfCategory($category);
		else
			$data['games'] = $this->blog_model->getGames();

		$data['categories'] = $this->blog_model->getCategories();

		//Load Multiple Pages Views(header, blog content, footer)
		$this->load->view('includes/header');
		$this->load->view('blog_view',$data);
		$this->load->view('includes/footer',$data);
	}

	public function game($id){
		$this->load->model('blog_model');
		$data['game'] = $this->blog_model->getGame($id);
		$data['categories'] = $this->blog_model->getCategories();
		$data['device_os'] = "";


		$this->load->library('wurfl');
		if($this->wurfl->get('is_android')){
			$data['device_os'] = "android";
		}
		else if($this->wurfl->get('is_ios')){
			$data['device_os'] = "ios";
		}


		//Load Multiple Pages Views(header, blog content, footer)
		$this->load->view('includes/header');
		$this->load->view('game_view',$data);
		$this->load->view('includes/footer',$data);
	}

	public function admin(){
		$this->load->model('blog_model');
		$data['games'] = $this->blog_model->getAdminGames();
		$data['categories'] = $this->blog_model->getCategories();

		//load Multiple Pages (header, admin content , footer)
		$this->load->view('admin/includes/header');
		$this->load->view('admin/admin_view', $data);
		$this->load->view('admin/includes/footer');
	}

	public function add_game(){
		$this->load->model('blog_model');
		$data['categories'] = $this->blog_model->getCategories();
		//load Multiple Pages (header, add post content , footer)
		$this->load->view('admin/includes/header');
		$this->load->view('admin/add_game_view', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_game($id){

		$this->load->model('blog_model');
		$data['game'] = $this->blog_model->getGame($id);
		$data['categories'] = $this->blog_model->getCategories();
		//load Multiple Pages (header, add post content , footer)
		$this->load->view('admin/includes/header');
		$this->load->view('admin/edit_game_view', $data);
		$this->load->view('admin/includes/footer');
	}

	public function delete_game($id){

		$this->load->model('blog_model');
		$table = "games";
		if($this->blog_model->delete($table,$id))
		{
			$this->admin();
		}

	}

	private function do_upload($file){

         if($this->upload->do_upload($file))
         {
            $data = array('upload_data' => $this->upload->data());
            return  $data['upload_data']['file_name'];
         }
         else
         {
            //$msg = $this->upload->display_errors();
            $this->form_validation->set_rules($file, $file, 'required');
         }
	}

	public function submit_add_game(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Game Name", "required");
		$this->form_validation->set_rules("description", "Game Description", "required");

   		$config = array(
            'upload_path' => "./images/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
         );
         $this->load->library('upload', $config);

         $cover = $this->do_upload("cover");
         $screenshot1 = $this->do_upload("screenshot1");
         $screenshot2 = $this->do_upload("screenshot2");

		if($this->form_validation->run() == FALSE)
		{
			$this->add_game();
		}
		else
		{
			$this->load->model('blog_model');
			$table = "games";
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');

			$row = array(
				"name" => $name,
				"description" => $description,
				"category" => $category,
				"cover" => $cover,
				"screenshot1" => $screenshot1,
				"screenshot2" => $screenshot2
				);
			$this->blog_model->insert($table,$row);
			$this->admin();
		}

	}
	
	public function submit_edit_game($id){

		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Game Name", "required");
		$this->form_validation->set_rules("description", "Game Description", "required");


		if($this->form_validation->run() == FALSE)
		{
			$this->edit_game($id);
		}
		else
		{

			$this->load->model('blog_model');
			$table = "games";
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$category = $this->input->post('category');
			$row = array(
				"name" => $name,
				"description" => $description,
				"category" => $category
				);
			$this->blog_model->update($table, $row, $id);
			$this->admin();
		}

	}

	public function add_category(){
		//load Multiple Pages (header, add post content , footer)
		$this->load->view('admin/includes/header');
		$this->load->view('admin/add_category_view');
		$this->load->view('admin/includes/footer');
	}
	
	public function edit_category($id){
		$this->load->model('blog_model');
		$data['category'] = $this->blog_model->getCategory($id);

		//load Multiple Pages (header, edit category content , footer)
		$this->load->view('admin/includes/header');
		$this->load->view('admin/edit_category_view', $data);
		$this->load->view('admin/includes/footer');
	}
	
	public function submit_add_category(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Category", "required");

		if($this->form_validation->run() == FALSE)
		{
			$this->add_category();
		}
		else
		{
			$this->load->model('blog_model');
			$table = "categories";
			$type = $this->input->post('name');
			$row = array(
				"type" => $type
				);
			$this->blog_model->insert($table,$row);
			$this->admin();
		}
	}
	
	public function submit_edit_category($id){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Category" , "required");

		if($this->form_validation->run() == FALSE)
		{
			$this->edit_category($id);
		}
		else
		{
			$this->load->model('blog_model');
			$table = "categories";
			$type = $this->input->post('name');
			$row = array(
				"type" => $type
				);
			$this->blog_model->update($table, $row, $id);
			$this->admin();

		}
	}

}
