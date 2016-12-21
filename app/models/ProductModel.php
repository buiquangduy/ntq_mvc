<?php
/**
* Tạo Model để tương tác với data trong bảng product
*/
class ProductModel
{
	public $id;
	public $name;
	public $image;
	public $price;
	public $content;
	public $description;
	public $user_id;
	public $cate_id;
	public $created_at;
	function __construct($id = null, 
			$name = null,$price = null,$content = null, $image = null,$description = null,$active = null ,$user_id=null,$cate_id=null,
			$created_at = null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->content = $content;
		$this->image = $image;
		$this->description = $description;
		$this->active = $active;
		$this->user_id = $user_id;
		$this->cate_id = $cate_id;
		$this->created_at = $created_at;
	}

	/**
	*	Hàm lấy toàn bộ dữ liệu trong bảng product
	*/
	public static function All(){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				select 	p.id as id,
						p.name as name,
						p.price as price,
						p.content as content,
						p.image as image,
						p.description as description,
						p.active as active,
						p.user_id as user_id,
						p.cate_id as cate_id,
						p.created_at as created_at
				from products as p
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng product
		$stmt->execute(); // Thực thi câu query ở trên 
		$rs = $stmt->fetchAll(); // Lấy ra toàn bộ dữ liệu trả về
		$arr = [];
		if(count($rs) > 0){
			foreach ($rs as $v) {
				array_push($arr, 
					new ProductModel($v["id"], $v["name"], $v["price"], $v["content"], $v["image"], $v["description"], $v["active"],
					 				$v["user_id"],$v["cate_id"],$v["created_at"])
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
				select 	p.id as id,
						p.name as name,
						p.price as price,
						p.content as content,
						p.image as image,
						p.description as description,
						p.active as active,
						p.user_id as user_id,
						p.cate_id as cate_id,
						p.created_at as created_at
				from products as p
				where p.id = :id
			"); // Chuẩn bị 1 câu query để lấy toàn bộ dữ liệu từ trong bảng product
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		$rs = $stmt->fetch(); // Lấy ra 1 bản ghi trả về
		if($rs){
			$result = new ProductModel($rs["id"], $rs["name"], $rs["price"], $rs["content"], $rs["image"], $rs["description"], $rs["active"],
					 				$rs["user_id"],$rs["cate_id"],$rs["created_at"]);
		}else{
			$result = null;
		}
		return $result;
	}

	/**
	*	Hàm xóa 1 bản ghi trong db
	*/
	public static function Remove($id){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		$stmt = $db->prepare("
				delete from products where id = :id
			"); // Chuẩn bị 1 câu query xóa 1 bản ghi trong
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		return true;
	}

	/**
	*	Hàm save dữ liệu vào bảng product
	*/
	public static function Save($product){
		$db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
		if($product->id == 0){
			$stmt = $db->prepare("
				insert into products
					(name, price,content,image,description,active,user_id,cate_id,created_at)
				values
					(:name, :price, :content, :image ,:description ,:active ,:user_id ,:cate_id,now())
			"); // Chuẩn bị 1 câu query để insert dữ liệu trong bảng product
		}else{
			$stmt = $db->prepare("
				update 	products
				set 	name 		= :name, 
						price 		= :price, 
						content     = :content,
						image 		= :image, 
						description = :description,
						active 		= :active,
						user_id		= :user_id,
						cate_id 	= :cate_id,
						created_at	= now()
				where 	id 			= :id
			"); // Chuẩn bị 1 câu query để update dữ liệu trong bảng product
			$stmt->bindParam(':id', $product->id, PDO::PARAM_STR);
		}
		$stmt->bindParam(':name', $product->name, PDO::PARAM_STR);
		$stmt->bindParam(':price', $product->price, PDO::PARAM_STR);
		$stmt->bindParam(':content', $product->content, PDO::PARAM_STR);	
		$stmt->bindParam(':image', $product->image, PDO::PARAM_STR);
		$stmt->bindParam(':description', $product->description, PDO::PARAM_STR);
		$stmt->bindParam(':active', $product->active, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $product->user_id, PDO::PARAM_STR);
		$stmt->bindParam(':cate_id', $product->cate_id, PDO::PARAM_STR);
		//$stmt->bindParam(':created_at', $product->created_at, PDO::PARAM_INT);
		$stmt->execute(); // Thực thi câu query ở trên 
		return true;
	}
}
