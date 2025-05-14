<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);


include('db.php');
	Class Operations{

	protected $db;

	function __construct()
 {      
				global $db;
				global $hostname;
				global $username;
				global $dbname;
				global $password;

				//$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
				 try {
								$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

								$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

								//echo "Connected to $dbname at $host successfully.";
						} catch (PDOException $pe) {
										die("Could not connect to the database $dbname :" . $pe->getMessage());
						}
					
 }
		

	public function getAll($table){

		 global $db;
 
		 $sel  =  $db->query("select * from ".$table);
		 return $sel->fetchAll(PDO::FETCH_ASSOC);
 }
 
 public function getAlldistinct($table,$where){

		 global $db;
 
		 $sel  =  $db->query("select distinct ".$where." from ".$table."");
		 return $sel->fetchAll(PDO::FETCH_ASSOC);
 }


public function getList($table,$where){

		 global $db;
 
		 $sel  =  $db->query("select * from ".$table . "  " .$where);

		 echo "select * from ".$table . "  " .$where;

		 return $sel->fetchAll(PDO::FETCH_ASSOC);
 }
 
 public function getListdistinct($table,$where){

		 global $db;
 
		 $sel  =  $db->query("select distinct from ".$table . "  " .$where);

		 //echo "select * from ".$table . "  " .$where;

		 return $sel->fetchAll(PDO::FETCH_ASSOC);
 }

public function delete($table,$id){

	global $db;

		$sql="delete from ".$table." where id =:id";

	$stmt = $db->prepare($sql); 

	$stmt->execute(array(':id' => $id)); 


}

 public function getdistinctimg($table,$where){

     global $db;
 
     $sel  =  $db->query("select distinct blg_images from ".$table . "  " .$where);

     //echo "select * from ".$table . "  " .$where;

     return $sel->fetchAll(PDO::FETCH_ASSOC);
     
}

public function delete_bnr($table,$id){

	global $db;

		$sql="delete from ".$table." where bnr_id =:id";

	$stmt = $db->prepare($sql); 

	$stmt->execute(array(':id' => $id)); 


}


public function delete_prod($table,$id){

	global $db;

		$sql="delete from ".$table." where prod_id =:id";

	$stmt = $db->prepare($sql); 

	$stmt->execute(array(':id' => $id)); 


}

public function wishdel($table,$id,$user_email){

	global $db;

		$sql="delete from ".$table." where id =:id and cust_email =:user_email";

	$stmt = $db->prepare($sql); 

	$stmt->execute(array(':id' => $id,':user_id' => $user_email)); 


}


public function delete_records($table,$id){


	global $db;

	echo $sql="delete from ".$table." where pid =:id";

	$stmt = $db->prepare($sql); 

	$stmt->execute(array(':id' => $id)); 




}

public function insert($table,$data){

	global $db;

	$fields = array_keys($data);

		//echo "<pre/>";
	 // print_r($fields);



	 $sql = "INSERT INTO ".$table."(".implode(',', $fields).")";

	 // insert into register (fname,lname)

		$sets = array();

		foreach($data as $column => $value)
		{
				 $sets[] =  ":".$column;
		}


	 //echo "<pre/>";
	 //print_r($sets);




		$sql .= "values(".implode(', ', $sets).")";  // values($fname,$lname)

		$stmt = $db->prepare($sql);  

		//$data['f_name'];

		$final_bind = array();



		foreach($data as $column => $value){

			 $final_bind[] =  $value;

		}   

		$stmt->execute($final_bind);  
	
	$id = $db->lastInsertId();
	return $id;




}



	/*public function getSingle($table,$where){

			global $db;

			$sel  =  $db->query("select * from ".$table."  ". $where);
			return $sel->fetch(PDO::FETCH_ASSOC);
 }*/


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
	public function getSingle($table,$where){

			global $db;

			$sel  =  $db->query("select * from ".$table."  ". $where);

			return $sel->fetch(PDO::FETCH_ASSOC);
 }


	public function getCounts($table,$where){

			global $db;

			$sel  =  $db->query("select count(*) from ".$table."  where ". $where);

			return $number_of_rows = $sel->fetchColumn(); 
 }
 public function getSingleLimit($table){

			global $db;

			$sel  =  $db->query("select * from ".$table." order by id desc limit 1");

			return $sel->fetch(PDO::FETCH_ASSOC);
 }
 
 public function getAllnew($table,$where){
	 
		global $db;
			$sel  =  $db->query("select * from ".$table."  ". $where);
			return $sel->fetchAll(PDO::FETCH_ASSOC);
 
 }
 public function paginationList($table,$search_keyword,$row_per_page,$where,$data){

  global $db;
  

  //$sql = 'SELECT * FROM posts WHERE post_title LIKE :post_title OR description LIKE :description  ORDER BY id DESC ';
  $sql = 'SELECT * FROM '.$table.'   '.$where;
  
  
  $per_page_html = '';
  $page = 1;
  $start=0;
  
 // echo 'AA'.$_GET["page"];
  
  if(!empty($_GET["page"])) {
    $page = $_GET["page"];
    $start=($page-1) * $row_per_page;
  }
  if($start<0){
   $start=0;          
   $limit=" limit " . $start . "," . $row_per_page;
  }
  else{
     $limit=" limit " . $start . "," . $row_per_page;  
  }
  //echo $limit;
 // die();
// pagination

  $pagination_statement = $db->prepare($sql);
  $pagination_statement->execute($data);

  echo$row_count = $pagination_statement->rowCount();
  if(!empty($row_count)){
    $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
    $page_count=ceil($row_count/$row_per_page);
    if($page_count>1) {
      for($i=1;$i<=$page_count;$i++){
        if($i==$page){
          $per_page_html .= '<a href="' . $page_url."?page=".$i . '" class="btn-page current" />'.$i.'</a>';
        } else {
          $per_page_html .= '<a href="' . $page_url."?page=".$i . '" class="btn-page" />'.$i.'</a>';
        }
      }
    }
    
    $per_page_html .= "</div>";
  }

  // pagination ends here

  // Below list is for first time generating  list

  $query = $sql.$limit;
  $stmt = $db->prepare($query);
  $stmt->execute($data);
  $results = $stmt->fetchAll();


  return array('pagination'=>$per_page_html,'list'=>$results);
  //returning two values. One for result and another for pagination
}



	public function getLimit($table){
	 
	 global $db;
			
		$select= $db->query("select * from ".$table." where parent_id=0 order by id asc LIMIT 0,12");
		
		return $select->fetchAll(PDO::FETCH_ASSOC);
	 
 }

 public function getlastid($table,$userid){

	 global $db;

//SELECT * FROM `classified` WHERE user_id=3 order by id desc limit 1

	 $select = $db->query("SELECT * FROM ".$table." where user_id=".$userid." order by id desc limit 1");

	 return $select->fetch(PDO::FETCH_ASSOC);


 }

	public function get_last_id($table,$userid){

	 global $db;

//SELECT * FROM `classified` WHERE user_id=3 order by id desc limit 1

	 $select = $db->query("SELECT * FROM ".$table." where userid=".$userid." order by id desc limit 1");

	 return $select->fetch(PDO::FETCH_ASSOC);


 }


 public function join_records(){


	global $db;

	$select = $db->query("SELECT * FROM classified LEFT JOIN classified_img_tbl ON classified.id = classified_img_tbl.classified_id ORDER BY classified.id");

	return $select->fetchAll(PDO::FETCH_ASSOC);
 }


 public function join_records_album(){


	 global $db;

	$select = $db->query("SELECT * FROM album_tbl LEFT JOIN album_img_tbl ON album_tbl.id = album_img_tbl.albumid ORDER BY album_tbl.id");

	return $select->fetchAll(PDO::FETCH_ASSOC);

 }



 public function sort_audio_records($tags)

 {

	 global $db;

	 $query = 'SELECT * from `audio` where FIND_IN_SET("'.$tags.'",post_tags)';
	 $select = $db->query($query);
	return $select->fetchAll(PDO::FETCH_ASSOC);



 }


 public function join_subcategory_records(){

	
	 global $db;

	$select = $db->query("SELECT  FROM category_tbl, subcategory_tbl WHERE category_tbl.id = subcategory_tbl.catid");
	return $select->fetchAll(PDO::FETCH_ASSOC);

 }


 public function join_records_video_tag($tag_name){

	 global $db;

	 $query = 'SELECT * from `video` where FIND_IN_SET("'.$tag_name.'",post_tags)';
	 $select = $db->query($query);
	return $select->fetchAll(PDO::FETCH_ASSOC);


 }



 public function getLogin($table,$where){

			global $db;

			$sel  =  $db->query("select * from ".$table."  where ". $where);

			return $number_of_rows = $sel->fetchColumn(); 
 }

 
 
 
 
 

/*public function update($table,$data,$id){

	 global $db;

	//$fields = array_keys($data);
	
		$sql = "UPDATE ".$table." SET ";
 
		// loop and build the column /
		$sets = array();

		foreach($data as $column => $value)
		{
				 $sets[] = $column." = :".$column;
		}

		$sql .= implode(', ', $sets);
		 
	 $sql .= '  where id = :id';

		$stmt = $db->prepare($sql); 
		 $final_bind = array();   
	 
		foreach($data as $column => $value){

			 $final_bind[] =  $value;


		}


//echo "<pre/>";
//print_r($final_bind);

$ids =  array('id'=>$id);

$final_bind = array_merge($final_bind, $ids);


//echo "<pre/>";
//print_r($final_bind); 



		/* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


		//$stmt->execute($final_bind);

/*}*/


public function update($table,$data,$id){

	 global $db;

	//$fields = array_keys($data);
	
		$sql = "UPDATE ".$table." SET ";
 
		// loop and build the column /
		$sets = array();

		foreach($data as $column => $value)
		{
				 $sets[] = $column." = :".$column;
		}

		$sql .= implode(', ', $sets);
		 
	 $sql .= '  where id = :id';

		$stmt = $db->prepare($sql); 
		 $final_bind = array();   
	 
		foreach($data as $column => $value){

			 $final_bind[] =  $value;


		}


//echo "<pre/>";
//print_r($final_bind);

$ids =  array('id'=>$id);

$final_bind = array_merge($final_bind, $ids);


//echo "<pre/>";
//print_r($final_bind); 



		/* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


		$stmt->execute($final_bind);
	
	

}

public function update_prod($table,$data,$id){

	 global $db;

	//$fields = array_keys($data);
	
		$sql = "UPDATE ".$table." SET ";
 
		// loop and build the column /
		$sets = array();

		foreach($data as $column => $value)
		{
				 $sets[] = $column." = :".$column;
		}

		$sql .= implode(', ', $sets);
		 
	 $sql .= '  where prod_id = :id';

		$stmt = $db->prepare($sql); 
		 $final_bind = array();   
	 
		foreach($data as $column => $value){

			 $final_bind[] =  $value;


		}


//echo "<pre/>";
//print_r($final_bind);

$ids =  array('id'=>$id);

$final_bind = array_merge($final_bind, $ids);


//echo "<pre/>";
//print_r($final_bind); 



		/* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


		$stmt->execute($final_bind);
	
	

}

public function update_bnr($table,$data,$id){

	 global $db;

	//$fields = array_keys($data);
	
		$sql = "UPDATE ".$table." SET ";
 
		// loop and build the column /
		$sets = array();

		foreach($data as $column => $value)
		{
				 $sets[] = $column." = :".$column;
		}

		$sql .= implode(', ', $sets);
		 
	 $sql .= '  where bnr_id = :id';

		$stmt = $db->prepare($sql); 
		 $final_bind = array();   
	 
		foreach($data as $column => $value){

			 $final_bind[] =  $value;


		}


//echo "<pre/>";
//print_r($final_bind);

$ids =  array('id'=>$id);

$final_bind = array_merge($final_bind, $ids);


//echo "<pre/>";
//print_r($final_bind); 



		/* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


		$stmt->execute($final_bind);
	
	

}


public function ifExists($table,$where){

			global $db;

			$sel  =  $db->query("select * from ".$table."  where ". $where);

		 // echo "select * from ".$table."  where ". $where;

			return $number_of_rows = $sel->fetchColumn(); 
 }



}


?>