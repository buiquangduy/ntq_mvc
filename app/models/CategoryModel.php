<?php
/**
* 
*/
class CategoryModel
{

	public $cate_id;
	public $name;
	public $active;
	public $description;
	public $created_at;
	function __construct($cate_id = null, 
			$name = null, $active = null,$description = null,$created_at = null)
	{
		$this->cate_id = $cate_id;
		$this->name = $name;
		$this->active = $active;
		$this->description = $description;
		$this->created_at = $created_at;
	}

	/**
	*	Hàm lấy toàn bộ dữ liệu trong bảng category
	*/
	public static function All(){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				select 	c.cate_id as cate_id,
						c.name as name,
						c.active as active,
						c.description as description,
						c.created_at as created_at
				from categories as c
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng category
		$stmt->execute(); // Thực thi câu query ở trên 
		$rs = $stmt->fetchAll(); // Lấy ra toàn bộ dữ liệu trả về
		$arr = [];
		if(count($rs) > 0){
			foreach ($rs as $v) {
				array_push($arr, 
					new CategoryModel($v["cate_id"], $v["name"], $v["active"],$v["description"],$v["created_at"])
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
				select 	c.cate_id as cate_id,
						c.name as name,
						c.active as active,
						c.description as description,
						c.created_at as created_at
				from categories as c
				where c.cate_id = :id
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng product
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute(); // Thực thi câu query ở trên 
			$rs = $stmt->fetch(); // Lấy ra 1 bản ghi trả về
			if($rs){
				$result = new CategoryModel($rs["cate_id"], $rs["name"], $rs["active"], $rs["description"], $rs["created_at"]);
			}else{
				$result = null;
			}
			return $result;
		}

	public static function Save($category){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		if($category->cate_id == 0){
			$stmt = $db->prepare("
				insert into categories
					(name, active, description, created_at)
				values
					(:name, :active, :description, now())
			"); // Chuẩn bị 1 câu query để insert dữ liệu trong bảng product
		}else{
			$stmt = $db->prepare("
				update 	categories
				set 	name 		= :name, 
						active 		= :active, 
						description = :description, 
						created_at 	= now()
				where 	cate_id 	= :cate_id
			"); // Chuẩn bị 1 câu query để update dữ liệu trong bảng product
			$stmt->bindParam(':cate_id', $category->cate_id, PDO::PARAM_INT);
		}
		$stmt->bindParam(':name', $category->name, PDO::PARAM_STR);
		$stmt->bindParam(':active', $category->active, PDO::PARAM_INT);
		$stmt->bindParam(':description', $category->description, PDO::PARAM_STR);
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
				delete from categories where cate_id = :id
			"); // Chuẩn bị 1 câu query xóa 1 bản ghi trong
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		return true;
	}

	/**
	*	Hàm tìm kiếm trong bảng category
	*/
	public static function get_search($name){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				select 	c.cate_id as cate_id,
						c.name as name,
						c.active as active,
						c.description as description,
						c.created_at as created_at
				from categories as c
				where c.name like :name
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng category
		$stmt->bindParam(':name',$name, PDO::PARAM_STR);
		$stmt->execute(); // Thực thi câu query ở trên 
		$rs = $stmt->fetchAll(); // Lấy ra toàn bộ dữ liệu trả về
		$arr = [];
		if(count($rs) > 0){
			foreach ($rs as $v) {
				array_push($arr, 
					new CategoryModel($v["cate_id"], $v["name"], $v["active"],$v["description"],$v["created_at"])
				);
			}
		}
		return $arr;
	}
}
?>