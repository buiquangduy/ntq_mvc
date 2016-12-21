<?php
/**
* 
*/
class UserModel
{

	public $user_id;
	public $user_name;
	public $active;
	public $level;
	public $email;
	public $password;
	public $created_at;
	function __construct($user_id = null, 
			$user_name = null, $password = null,$email = null,$level = null,$active = null,$created_at=null)
	{
		$this->user_id = $user_id;
		$this->user_name = $user_name;
		$this->password = $password;
		$this->email = $email;
		$this->level = $level;
		$this->active = $active;
		$this->created_at = $created_at;
	}

	/**
	*	Hàm lấy toàn bộ dữ liệu trong bảng category
	*/
	public static function All(){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				select 	u.user_id as user_id,
						u.user_name as user_name,
						u.password as password,
						u.email as email,
						u.level as level,
						u.active as active,
						u.created_at as created_at
				from users as u
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng category
		$stmt->execute(); // Thực thi câu query ở trên 
		$rs = $stmt->fetchAll(); // Lấy ra toàn bộ dữ liệu trả về
		$arr = [];
		if(count($rs) > 0){
			foreach ($rs as $v) {
				array_push($arr, 
					new UserModel($v["user_id"], $v["user_name"], $v["password"],$v["email"],$v["level"],$v["active"],$v["created_at"])
				);
			}
		}
		return $arr;
	}
	/**
	*	Hàm lấy 1 bản ghi từ csdl với id truyền vào
	*/
	public static function GetOne($id){
			$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
			$stmt = $db->prepare("
				select 	u.user_id as user_id,
						u.user_name as user_name,
						u.password as password,
						u.email as email,
						u.level as level,
						u.active as active,
						u.created_at as created_at
				from users as u
				where u.user_id = :id
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng product
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute(); // Thực thi câu query ở trên 
			$rs = $stmt->fetch(); // Lấy ra 1 bản ghi trả về
			if($rs){
				$result = new UserModel($rs["user_id"], $rs["user_name"], $rs["password"],$rs["email"],$rs["level"],$rs["active"],$rs["created_at"]);
			}else{
				$result = null;
			}
			return $result;
		}

	public static function Save($user){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		if($user->user_id == 0){
			$stmt = $db->prepare("
				insert into users
					(user_name, password, email, level,active,created_at)
				values
					(:user_name, :password, :email,:level,:active, now())
			"); // Chuẩn bị 1 câu query để insert dữ liệu trong bảng product
		}else{
			$stmt = $db->prepare("
				update 	users
				set 	user_name 	= :user_name, 
						password 	= :password, 
						email 		= :email,
						level 		= :level,
						active 		= :active, 
						created_at 	= now()
				where 	user_id 	= :user_id
			"); // Chuẩn bị 1 câu query để update dữ liệu trong bảng product
			$stmt->bindParam(':user_id', $user->user_id, PDO::PARAM_INT);
		}
		$stmt->bindParam(':user_name', $user->user_name, PDO::PARAM_STR);
		$stmt->bindParam(':password', $user->password, PDO::PARAM_STR);
		$stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
		$stmt->bindParam(':level', $user->level, PDO::PARAM_STR);		
		$stmt->bindParam(':active', $user->active, PDO::PARAM_INT);
		//$stmt->bindParam(':created_at', $category->created_at, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		return true;
	}

	/**
	*	Hàm xóa 1 bản ghi trong db
	*/
	public static function Remove($id){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				delete from users where user_id = :id
			"); // Chuẩn bị 1 câu query xóa 1 bản ghi trong
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		return true;
	}
	public static function login($user,$pass,$level)
	{
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				select 	u.user_id as user_id,
						u.user_name as user_name,
						u.password as password,
						u.email as email,
						u.level as level,
						u.active as active,
						u.created_at as created_at
				from users as u
				where u.user_name = :user_name and u.password = :password and u.level = :level
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng product
			$stmt->bindParam(':user_name', $user, PDO::PARAM_STR);
			$stmt->bindParam(':password', $pass, PDO::PARAM_STR);
			$stmt->bindParam(':level', $level, PDO::PARAM_INT);
			$stmt->execute();
			$rs = $stmt->fetch(); // Lấy ra 1 bản ghi trả về
			if($rs){
				$result = new UserModel($rs["user_id"], $rs["user_name"], $rs["password"],$rs["email"],$rs["level"],$rs["active"],$rs["created_at"]);
			}else{
				$result = null;
			}
			return $result;
	}
}
?>