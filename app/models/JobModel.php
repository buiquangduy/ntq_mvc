<?php

/**
 *
 */
class JobModel
{
    public $id;
    public $staff_id;
    public $title;
    public $content;
    public $salary;
    public $country;
    public $last_date;
    public $job_type;
    public $job_category;
    public $time_type;
    public $image;
    public $created_at;

    function __construct($id = null,
                         $staff_id = null,
                         $title = null,
                         $content = null,
                         $salary = null,
                         $country = null,
                         $last_date = null,
                         $job_type = null,
                         $job_category = null,
                         $time_type = null,
                         $image = null,
                         $created_at = null)
    {
        $this->id = $id;
        $this->staff_id = $staff_id;
        $this->title = $title;
        $this->content = $content;
        $this->salary = $salary;
        $this->country = $country;
        $this->last_date = $last_date;
        $this->job_type = $job_type;
        $this->job_category = $job_category;
        $this->time_type = $time_type;
        $this->image = $image;
        $this->created_at = $created_at;
    }

    public static function getByJobType($jobCategory = 1, $jobType = null, $country = null, $currentPage = 1, $limit = 3)
    {
        $db = Db::GetInstance();

        $sqlTotal = "
				select id
				from job 
				where job_category = {$jobCategory} 
			";

        $positionStart = ($currentPage - 1) * $limit;

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						j.job_type as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.image as image,
						j.created_at as created_at
				from job as j 
				where j.job_category = {$jobCategory} 
			";

        if (!empty($jobType)) {
            $sql .= "and j.job_type in ({$jobType}) ";
            $sqlTotal .= "and job_type in ({$jobType}) ";
        }

        if (!empty($country)) {
            $sql .= "and j.country like '%{$country}%' ";
            $sqlTotal .= "and country like '%{$country}%' ";
        }

        $sql .= "limit {$positionStart}, {$limit} ";

        $stmt = $db->prepare($sql);
        $stmtTotal = $db->prepare($sqlTotal);

        $stmt->execute();
        $rs = $stmt->fetchAll();

        $stmtTotal->execute();
        $total = $stmtTotal->rowCount();
        $total = ceil($total / $limit);
        
        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobModel($v["id"], $v["staff_id"], $v["title"], $v["content"], $v["salary"], $v["country"], $v["last_date"],
                        $v["job_type"], $v["job_category"], $v["time_type"], $v["image"], $v["created_at"])
                );
            }
        }

        return [
            'data' => $arr,
            'total' => $total
        ];
    }

    public static function getByStaffId($staffId)
    {
        $db = Db::GetInstance();

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						jt.name as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.image as image,
						j.created_at as created_at
				from job as j 
				INNER JOIN job_type as jt 
                ON j.job_type = jt.id 
				where j.staff_id = {$staffId} 
			";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll();

        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobModel($v["id"], $v["staff_id"], $v["title"], $v["content"], $v["salary"], $v["country"], $v["last_date"],
                        $v["job_type"], $v["job_category"], $v["time_type"], $v["image"], $v["created_at"])
                );
            }
        }

        return $arr;
    }
}

?>