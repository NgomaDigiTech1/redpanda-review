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
		
		public function __construct(){
			$this->mdb = new  CommonModel();
            helper(['form','url','text','custom']);
		}

		public function views($page = 'home'){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
           		return PageNotFoundException::forPageNotFound();
        	}
            $data = [
                'title' => ucfirst($page),
				'sectors'=> $this->sectModel->getEnabledSectors(),
            ];			
            echo view('pages/'.$page, $data);
		}

	}