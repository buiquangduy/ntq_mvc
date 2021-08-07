<?php
function Call($controller, $action)
{
    require_once("./app/controllers/" . $controller . "Controller.php");
    switch ($controller) {
        case 'Staff':
            require_once("./app/models/StaffModel.php");
            $ctr = new StaffController();
            $ctr->{$action}();
            break;
        case 'Student':
            require_once("./app/models/StudentModel.php");
            require_once("./app/models/JobModel.php");
            require_once("./app/models/JobTypeModel.php");
            $ctr = new StudentController();
            $ctr->{$action}();
            break;
        case 'Job':
            require_once("./app/models/JobModel.php");
            $ctr = new JobController();
            $ctr->{$action}();
            break;
        default:
            require_once("./app/models/StudentModel.php");
            require_once("./app/models/JobModel.php");
            $ctr = new StudentController();
            $ctr->NotFound();
            break;
    }
}

$listCtr = [
    "Student" => ["profile", "getDataProfile", "notFound", "login", "logout", "home"],
    "Staff" => ["profile", "getDataProfile", "notFound", "login", "logout"],
    "Job" => ["paginateJobs", "getByStaffId"],
];

if (array_key_exists($ctr, $listCtr)) {
    if (in_array($action, $listCtr[$ctr])) {
        Call($ctr, $action);
    } else {
        $ctr = "Student";
        $action = "notFound";
        Call($ctr, $action);
    }
} else {
    $ctr = "Student";
    $action = "NotFound";
    Call($ctr, $action);
}


?>