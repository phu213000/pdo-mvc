<?php
class category extends Dcontroller{
  public $load;
  
  public function __construct(){
      $data =array();
      parent::__construct();
      $this->load = new Load(); // Khởi tạo Load
  }
  public function list_category(){
      $this->load->view('header');

      $categorymodel = $this->load->model('categorymodel'); 
      $table_category_product = 'tbl_category_product';
      $data['category'] = $categorymodel->category($table_category_product);
      $this->load->view('category', $data);

      $this->load->view('footer');
  }
  public function catebyid(){
    $this->load->view('header');
    $categorymodel = $this->load->model('categorymodel'); 
    $id =1 ;
    $table_category_product = 'tbl_category_product';
    $data['categorybyid'] = $categorymodel->categorybyid($table_category_product,$id);
    $this->load->view('categorybyid', $data);
    $this->load->view('footer');
  }

}

?>