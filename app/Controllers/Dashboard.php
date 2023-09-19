<?php 
	namespace App\Controllers;

    use App\Models\CommonModel;

    use CodeIgniter\I18n\Time;

	use CodeIgniter\Exceptions\PageNotFoundException;

	/**
	 * Dashboard
	 */
	class Dashboard extends BaseController
	{
        public $mdb;
        public $config;
        public $validation;

        public $users;
        public $sectors;
        public $products;
        public $prodchars;
        public $quotations;


        function __construct()
        {
            $this->mdb = new CommonModel();
            $this->sectors = "rp_product_sectors";
            $this->users = "rp_users";
            $this->products = "rp_products";
            $this->prodchars = "rp_productCharacteristics";
            $this->quotations = "rp_quotation";
            helper(['form','url','text','custom']);
            $this->validation = \Config\Services::validation();
        }
		function index(){

            if (!is_logged()) return redirect()->to('/login');

            $user_data = session()->get('user_data');

            $date = $this->mdb->getList($this->quotations);
            $i = 0;

            foreach ($date as $dat) { //Counting today's request

                $time = Time::parse($dat['created_at']);

                if($time->toDateString() == date('Y-m-d')){
                    $i++;
                }
            }
            $mod_sect = $this->mdb->getList($this->sectors, ['moderator' => $user_data['u_first_name']]);

            $j = 0;
            //Moderator's sectors
            foreach ($mod_sect as $item) {
                $data['sect'] = $item['sector_name'];
                $j++;
            }

            $tab = [];
            foreach ($mod_sect as $sect){
                array_push($tab,$sect->sector_name);
            }

            $data['sect_mod'] = $tab;

            $prod_mod = $this->mdb->getList($this->products);
            $k = 0;
            foreach ($prod_mod as $item) {
                if (in_array($item->product_sectors, $tab)) {
                    $k++;
                }
            }

            $quot_mod = $this->mdb->getList($this->quotations);
            $l = 0;
            foreach ($quot_mod as $qtm) {
                // if (in_array($qtm->prod_sect, $tab)) {
                //     $l++;
                // }
            }

            $data = [
                'title' => 'Dashboard',
                'org' => count($this->mdb->getList($this->users, ['u_role' => 'org manager'])),
                'sect' => count($this->mdb->getList($this->sectors)),
                'prod' => count($this->mdb->getList($this->products)),
                'prod_char' => count($this->mdb->getList($this->prodchars)),
                'quotation' => count($this->mdb->getList($this->quotations)),
                'pending' => count($this->mdb->getList($this->quotations, ['status' => 'pending'])),
                'processing' => count($this->mdb->getList($this->quotations, ['status' => 'processing'])),
                'done' => count($this->mdb->getList($this->quotations, ['status' => 'done'])),
                'cancelled' => count($this->mdb->getList($this->quotations, ['status' => 'cancelled'])),
                'quote_today' => $i,
                'mod_prod' => $k,
                'moderator' => count($this->mdb->getList($this->users, ['u_role' => 'moderator'])),
                'mod_sect' => count($this->mdb->getList($this->sectors, ['moderator' => $user_data['u_first_name']])),
                'customer' => count($this->mdb->getList($this->users, ['u_role' => 'customer'])),
                'admin' => count($this->mdb->getList($this->users, ['u_role' => 'admin'])),
                'users' => count($this->mdb->getList($this->users)),
            ];

            echo view('dashboard/index', $data);

		}

        function countReqOrg($user = null){

            $user_data = session()->get('user_data');

            if($user_data['u_role'] === 'org manager'){

                $data = [
                    'quot_org' => count($this->mdb->getList($this->quotations,['org' => $user_data['org_name']])),
                ];
                
                return $data['quot_org'];
            }
        }

        function countReqOrgPending($user = null){

            $user_data = session()->get('user_data');
            $user = $user_data['org_name'];

            $quot_org = $this->mdb->getList($this->quotations,['org' => $user_data['org_name']]);
            $m = 0;
            foreach ($quot_org as $qt){
                if($qt['status'] === 'pending'){
                    $m++;
                }
            }
            return $m;
        }
        function countReqOrgProcessing($user = null){

            $user_data = session()->get('user_data');
            $user = $user_data['org_name'];

            $quot_org = $this->mdb->getList($this->quotations,['org' => $user_data['org_name']]);
            $m = 0;
            foreach ($quot_org as $qt){
                if($qt['status'] === 'processing'){
                    $m++;
                }
            }
            return $m;
        }
        function countReqOrgToday ($user = null){

            $user_data = session()->get('user_data');
            $user = $user_data['org_name'];

            $quot_org = $this->mdb->getList($this->quotations,['org' => $user_data['org_name']]);
            $p = 0;
            foreach ($quot_org as $qt) { //Counting today's request
                $time = Time::parse($qt['created_at']);
                if($time->toDateString() == date('Y-m-d')){
                    $p++;
                }
            }
            return $p;
        }
	}