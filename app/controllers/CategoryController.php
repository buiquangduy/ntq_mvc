<?php
/**
*	Category controller - se xu ly nhung logic lien quan den trang hien thi Loai san pham, tim kiem,..
*/
class CategoryController
{
	// Hien thi trang chu (co data)
	function ListCategory(){
		$category =CategoryModel::All();
		include "./app/views/category/list.php";
	}
	
	function AddNew(){
		$category = new CategoryModel();
		include './app/views/category/category_form.php';
	}

	function Update()
	{
		$id = $_GET['id'];  
		$category = CategoryModel::GetOne($id);
		include './app/views/category/category_form.php';
	}

	// Hàm hiển thị form để tạo mới 1 sản phẩm
	function SaveCategory(){
		$cate_id = isset($_POST["txtCate_id"]) == true ? $_POST["txtCate_id"] : null;
		$name 	 = isset($_POST["txtCateName"]) == true ? $_POST["txtCateName"] : null;
		$active  = isset($_POST["txtActive"]) == true ? $_POST["txtActive"] : null;
		$description = isset($_POST["txtDescription"]) == true ? $_POST["txtDescription"] : null;
		$category = new CategoryModel($cate_id, $name, $active, $description);
		CategoryModel::Save($category);
		header('location: index.php');
		
	}
	// Hàm xóa 1 bản ghi trong table product
	function Remove(){
		// 1. Kiểm tra xem biến id có tồn tại hay không
		if(isset($_GET['id'])){
			$cate_id = $_GET['id'];
			// Kiểm tra giá trị của id có tồn tại trong cơ sở dữ liệu hay không
			if(CategoryModel::GetOne($cate_id)) {
				// Xoá bản ghi trong db
				CategoryModel::Remove($cate_id);
				Call("Category", "ListCategory");
			} else {
				$errMsg = "Category ID không tồn tại.";
				include './app/views/category/notfound.php';
			}
			
		} else { // Trường hợp không có biến id trên url thì sẽ hiển thị view notfound với message
			$errMsg = "Đường dẫn không hợp lệ.";
			include './app/views/category/notfound.php';			
		}
	}

	function SearchCategory()
	{
		$search = $_POST['search'];
		$category_search = CategoryModel::get_search($search);
		include './app/views/category/search_category.php';
	}

	function NotFound(){
		include './app/views/category/notfound.php';	
	}
}
?>