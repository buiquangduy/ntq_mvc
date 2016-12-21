<?php
class UserController
{
	// Hàm xóa 1 bản ghi trong table product
	function Remove(){
		// 1. Kiểm tra xem biến id có tồn tại hay không
		if(isset($_GET['id'])){
			$Id = $_GET['id'];
			// Kiểm tra giá trị của id có tồn tại trong cơ sở dữ liệu hay không
			if($users=UserModel::GetOne($Id)){
				//-----------admin can not delete superadmin and admin can not delete another admin
				if($_SESSION["id"]!=2 && ($Id == 2|| ($users->level==1 && ($_SESSION["id"]!=$Id))))
				{
					echo "<script>alert('You are not allowed to delete');location='index.php?ctr=User&action=ListUser';</script>";
				}
				else
				{
					// delete user
					UserModel::Remove($Id);
					Call("User", "ListUser");
				}
			}else{
				$errMsg = "User ID không tồn tại.";
				include './app/views/category/notfound.php';
			}
			
		}else{ // Trường hợp không có biến id trên url thì sẽ hiển thị view notfound với message
			$errMsg = "Đường dẫn không hợp lệ.";
			include './app/views/category/notfound.php';			
		}
	}
	// ham in ra list product
	function ListUser(){
		$users = UserModel::All();
		include "./app/views/user/list.php";
	}
	// Hàm hiển thị form để tạo mới 1 sản phẩm
	function AddNew(){
		$users = new UserModel();
		include './app/views/user/userform.php';
	}

	// Hàm hiển thị form để update thông tin 1 sản phẩm
	function Update(){
		$id = $_GET['id'];  
		$users = UserModel::GetOne($id);
		include './app/views/user/userform.php';
	}

	// Hàm hiển thị form để tạo mới 1 sản phẩm
	function SaveUser(){
		$id = $_GET['id'];
		$users = UserModel::GetOne($id);  
		$user_id = isset($_POST["txt_user_id"]) == true ? $_POST["txt_user_id"] : null;
		$user_name 	 = isset($_POST["txt_user_name"]) == true ? $_POST["txt_user_name"] : null;
		$password  = isset($_POST["txt_user_password"]) == true ? $_POST["txt_user_password"] : null;
		$email = isset($_POST["txt_user_email"]) == true ? $_POST["txt_user_email"] : null;
		$level = isset($_POST["txt_user_level"]) == true ? $_POST["txt_user_level"] : null;
		$active = isset($_POST["txt_user_active"]) == true ? $_POST["txt_user_active"] : null;
		$user = new UserModel($user_id, $user_name, $password, $email,$level,$active);
		if($user_id==0)
		{
			UserModel::Save($user);
			header('location: index.php?ctr=User&action=ListUser');
		}
		else
		{	////-----------admin can not edit superadmin and admin can not edit another admin
			if($_SESSION["id"]!=2 && ($id == 2|| ($users->level==1 && ($_SESSION["id"]!=$id))))
			{
				echo "<script>alert('You are not allowed to edit');location='index.php?ctr=User&action=ListUser';</script>";
				//header('location: index.php?ctr=User&action=ListUser');	
			}
			else
			{
				UserModel::Save($user);
				header('location: index.php?ctr=User&action=ListUser');	
			}
		}
	}
	function login()
	{	
		if(isset($_POST['txtUsername']))
		{
			$u = $_POST['txtUsername'];
		}
		if(isset($_POST['txtPassword']))
		{
			$p = $_POST['txtPassword'];
		}
		if(isset($u)&&isset($p))
		{
			$users = UserModel::login($u,$p,1);
		}
		if(isset($users))
     	{
            if(count($users) > 0){
                $_SESSION["username"] = $_POST['txtUsername'];
                $_SESSION["id"] = $users->user_id;
                header("location:?ctr=Category&action=ListCategory");
            }
            else
            {
                 $err = "";
            }
        }
        else
        {
        	$err = "This user is unavailable";
        }
		include './app/views/login.php';
	}
	function logout()
	{
		session_destroy(); // hoặc dùng hàm này để hủy toàn bộ session
		header("location:?ctr=User&action=login");
	}
}

?>