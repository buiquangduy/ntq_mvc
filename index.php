<?php
session_start();
// 	File mac dinh chay vao dau tien cua he thong
// 	TODO check params tren url 
//	set gia tri cho bien toan cuc la $ctr va $action
	require_once("connection.php"); // tao ket noi den co so du lieu
// $db = Db::GetInstance(); -- Luc nao can su dung db thi thuc hien the nay 

// Neu param ctr co gia tri thi thi set gia tri cua no cho $ctr, neu khong co thi set = Category
	$ctr = isset($_GET['ctr']) == false ? "Category" : $_GET['ctr'];

// Neu param action co gia tri thi thi set gia tri cua no cho $action, neu khong co thi set = ListCategory
	$action = isset($_GET['action']) == false ? "ListCategory" : $_GET['action'];
	include './app/views/layout.php'; // Goi den file layout nam trong view de tao ra cau truc html chung cho app	
?>