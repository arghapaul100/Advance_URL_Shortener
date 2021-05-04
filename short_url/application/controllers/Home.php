<?php
    class Home extends CI_controller{
        function _construct(){
            parent::_construct();
           
        }
        public function index(){
            $this->load->helper('url');
            if(isset($_GET['u'])){
                $data = $_GET['u'];
                $this->load->model('Application','app');
                $res = $this->app->search($data);
                if($res == 0){
                    echo "Your URL isn't valid";

                }else{
                    $redirect_url = $res['original_url'];
                    $this->app->updateClicks($data);
                    header('location:'.$redirect_url);
                }
            }else{
                $this->load->view('home');
            }
            
        }

        public function generateShortLink(){
            $ran_num = substr(md5(microtime()), rand(0,25), 5);
            echo $ran_num;
        }
        public function insert(){
           
            if (isset($_POST['original_url']) && isset($_POST['short_url']) && isset($_POST['title'])) {

                 $original_url = $this->input->post('original_url');
                 $short_url = $this->input->post('short_url');
                 $url_title = $this->input->post('title');

                 $short_url_query = substr(parse_url(gethostbyname($short_url))['query'], 2);

                 $insertdata = array(
                        "original_url" => $original_url,
                        "short_url" => $short_url_query,
                        "title" => $url_title,
                        "clicks" => 0
                    );

                 $this->load->model('Application','app');
                 $returnData = $this->app->insertData($insertdata);
                 if($returnData == 0){
                    return false;
                 }else{
                    echo "Saved Successfuly";
                 }
            }else{
                echo "Not Inserted";
            }   
        }

        public function getHostName(){
        	$url = $_POST['data'];
        	if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        		$hostname = gethostbyname($url);
        		$host = parse_url($hostname)['host'];
                echo $host;
        	}else{
        		echo false;
        	}
        }
        public function dashboard(){
            $this->load->helper('url');
            $this->load->model('Application','app');
            $response = $this->app->searchAll();

            if($response == 0){
                $data['error'] = "No more records into the database ";
            }else{
                $data['all_data'] = $response; 
            }
            $this->load->view('dashboard', $data);
        }
        public function delete(){
            $data = $_GET['code'];
            $this->load->helper('url');
            $this->load->model('Application','app');
            $res = $this->app->delete($data);
            redirect(site_url()."/dashboard");
        }
    }
?>
