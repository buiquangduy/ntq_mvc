<?php
class ProductController
{
	//--------remove product-----------------
	function Remove(){
		if(isset($_GET['id'])){
			$pId = $_GET['id'];
			// Kiểm tra giá trị của id có tồn tại trong cơ sở dữ liệu hay không
			if($product = ProductModel::GetOne($pId)){
				ProductModel::Remove($pId);//delete
				unlink("./app/assets/img/product/$product->image"); //delete file image in directory
				Call("Product", "ListProduct");
			}else{
				$errMsg = "Product ID không tồn tại.";
				include './app/views/category/notfound.php';
			}
			
		}else{ // Trường hợp không có biến id trên url thì sẽ hiển thị view notfound với message
			$errMsg = "Đường dẫn không hợp lệ.";
			include './app/views/category/notfound.php';			
		}
	}
	//----------- output list product------
	function ListProduct(){
		$products = ProductModel::All();
		include "./app/views/product/list.php";
	}
	//  function display form to create product
	function AddNew(){
		$product = new ProductModel();
		$categories = CategoryModel::All();
		include './app/views/product/productform.php';
	}
	//  function display form to update product
	function Update(){
		$id = $_GET['id'];    
		$product = ProductModel::GetOne($id);
		$categories = CategoryModel::All();
		include './app/views/product/productform.php';
	}
	//  function create or update product
	function SaveProduct(){
		$product_id = isset($_POST["txtProduct_id"]) == true ? $_POST["txtProduct_id"] : null;
		$product_name = isset($_POST["txtName"]) == true ? $_POST["txtName"] : null;
		$product_description = isset($_POST["txtDescription"]) == true ? $_POST["txtDescription"] : null;
		$product_active = isset($_POST["txtActive"]) == true ? $_POST["txtActive"] : null;	
		$product_content = isset($_POST["txtContent"]) == true ? $_POST["txtContent"] : null;
		$product_price = isset($_POST["txtPrice"]) == true ? $_POST["txtPrice"] : null;
		//$product_image = isset($_POST["pro_image"]) == true ? $_POST["pro_image"] : $_POST["img_change"];
		$pr_cate = isset($_POST["txtCategory"]) == true ? $_POST["txtCategory"] : null;
		$user_id = $_SESSION["id"];
		if($product_id==0)
		{
			if($_FILES['pro_image']['size'] > 0){			
				$images = $_FILES['pro_image']['name'];			
			}else
				$images = ""; 
		}
		else
		{
			if($_FILES['pro_image']['size'] > 0){			
				$images = $_FILES['pro_image']['name'];			
			}else
				$images = $_POST['img_change']; 
		}	
		$product = new ProductModel($product_id,$product_name,$product_price, $product_content, $images,$product_description, $product_active,$user_id,$pr_cate);
		$rs = ProductModel::Save($product);
		if($rs == true){
			$dich="./app/assets/img/product/".$images;
			move_uploaded_file($_FILES['pro_image']['tmp_name'],$dich);
			header('location: index.php?ctr=Product&action=ListProduct');
		}
		else
		{
			$errMsg = "action fail";
			header('location: index.php?ctr=Category&action=NotFound');
		}
	}
}

?>