<?php session_start();
function Call($controller, $action){
	require_once("./app/controllers/" . $controller . "Controller.php");
	switch ($controller) {
		case 'Category':
			require_once("./app/models/CategoryModel.php");
			$ctr = new CategoryController();
			$ctr->{$action}();
			break;
		case 'Product':
			require_once("./app/models/ProductModel.php");
			require_once("./app/models/CategoryModel.php");
			$ctr = new ProductController();
			$ctr->{$action}();
			break;
		case 'User':
			require_once("./app/models/UserModel.php");
			$ctr = new UserController();
			$ctr->{$action}();
			break;
		default:
			require_once("./app/controllers/" . $controller . "Controller.php");
			$ctr = new CategoryController();
			$ctr->NotFound();
			break;
	}
}

// Tap hop cac controller va cac ham cua he thong
// Su dung de check 2 bien $ctr, $action tren url xem co hop le khong
$listCtr = [
	"Category" => ["ListCategory","SaveCategory", "AddNew", "Update", "Remove","NotFound","SearchCategory"],
	"Product" => ["ListProduct", "SaveProduct", "AddNew", "Update", "Remove"],
	"User" => ["ListUser", "SaveUser", "AddNew", "Update", "Remove","login","logout"]	
];
// // neu ma chua dang nhap thi se ve trang login
if(!isset($_SESSION["username"]))
{
	$ctr = "User";
	$action = "login";
	Call($ctr, $action);
}
else
{
	if(array_key_exists($ctr ,$listCtr)){ // Check gia tri cua $ctr co trong tap key cua listCtr hay khong
		if(in_array($action, $listCtr[$ctr])){ // Check gia tri cua $action co trong tap value cua listCtr hay khong 
			Call($ctr, $action);
		}else{
			$ctr = "Category";
			$action = "NotFound";
			Call($ctr, $action);
		}
	}else{
		//var_dump($action);
		$ctr = "Category";
		$action = "NotFound";
		Call($ctr, $action);
	}
}



?>