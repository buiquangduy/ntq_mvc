<?php

class JobController
{
    /**
     * Ajax data job
     *
     * @return JobModel|null
     */
    public function paginateJobs()
    {
        $currentPage = $_POST['current_page'];
        $jobType = $_POST['job_type'];
        $country = $_POST['country'];
        $jobs = JobModel::getByJobType(1, $jobType, $country, $currentPage);

        $textApply = '';
        if (!empty($jobs['data'])) {
            foreach ($jobs['data'] as $job) {
                $textApply .= "<div class='card card-job'>
                                    <div class='card-header'>
                                        <h4 class='card-title'>
                                            <a href='job.html'>{$job->title}</a>
                                        </h4>
                                        <img class='img' src='{$job->image}'>
                                    </div>
                                    <div class='card-body'>
                                        <p>
                                        {$job->content}
                                        </p>
                                        <h6>
                                            <i class='ti-time'></i>
                                            {$job->last_date}                                                    
                                        </h6>
                                    </div>
                                    <hr>
                                    <div class='card-footer'>
                                        <div class='stats'>
                                            <i class='now-ui-icons ui-2_favourite-28'></i>
                                            Save
                                        </div>
                                    </div>
                                </div>";

            }
        }

        $textApplyPaginate = "<li class='page-item'>
                                        <a href='javascript:void(0)' onclick='prevPage()' class='page-link'>
                                        <span aria-hidden='true'>
                                            <i class='fa fa-angle-double-left' aria-hidden='true'></i>
                                        </span>
                                        </a>
                                    </li>";
        if ($jobs['total']) {
            for ($i = 1; $i <= $jobs['total']; $i++) {
                $active = ($i == 1) ? 'active' : '';
                $textApplyPaginate .= "<li class='page-item page-$i $active'>
                                        <a href='javascript:void(0)' class='page-link' onclick='changePage($i)'>$i</a>
                                    </li>";
            }
        }

        $textApplyPaginate .= "<li class=\"page-item\">
                                        <a href=\"javascript:void(0)\" onclick=\"nextPage()\" class=\"page-link\">
                                        <span aria-hidden=\"true\">
                                            <i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i>
                                        </span>
                                        </a>
                                    </li>";

        $jobs['text'] = $textApply;
        $jobs['paginate'] = $textApplyPaginate;
        unset($jobs['data']);

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($jobs)) {
            echo json_encode([
                'status' => true,
                'info' => $jobs,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'fail',
            ]);
        }
        exit();
    }
}

?>