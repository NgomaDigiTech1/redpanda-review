<?php 
	namespace App\Controllers;

	use CodeIgniter\Exceptions\PageNotFoundException;
	use App\Models\CommonModel;

	/**
	 * Pages controller
	 */
	class Pages extends BaseController
	{
		public $mdb;
		public $users;
		
		public function __construct(){
			$this->mdb = new  CommonModel();
            helper(['form','url','text','custom']);
		}

		public function views($page = 'home'){
            $data = [
                'title' => ucfirst($page),
				'sectors'=> $this->sectModel->getEnabledSectors(),
            ];	
						
			if(session()->has('client_data')){
				session()->remove('client_data');
			}
            echo view('pages/'.$page, $data);
		}

	}