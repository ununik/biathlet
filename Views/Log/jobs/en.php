<?php
$container = '';

$container .= '<div class="fiftyfifty">';
$container .= '<h3>Part time jobs</h3>';
foreach ($job->getAllPartTimeJobs($user->_maxEnergy, $page->_language) as $job) {
    $container .= '<div>';
    $container .= '<div class="partTimeTitle">'.$job['title'].'</div>';
    $container .= '<div class="partTimeDetail">';
    if ($user->_actualEnergy < $job['energy1']) {
        $container .= '<div class="partTimeTime">10 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy1'].'</div>';
        $container .= '<div>Amount: '.$job['price1'].'</div>';
        $container .= '</div>';
    } else {
        $container .= '<div class="partTimeTime">10 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy1'].'</div>';
        $container .= '<div>Amount: '.$job['price1'].'</div>';
        $container .= '</div>';
        $container .= '<div class="partTimeGetJob" onclick="getParttimeJob(\''.$job['id'].'\', \'1\',  \'en\')">Get the job</div>';
    }
    
    if ($user->_actualEnergy < $job['energy2']) {
        $container .= '<div class="partTimeTime">20 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy2'].'</div>';
        $container .= '<div>Amount: '.$job['price2'].'</div>';
        $container .= '</div>';
    } else {
        $container .= '<div class="partTimeTime">20 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy2'].'</div>';
        $container .= '<div>Amount: '.$job['price2'].'</div>';
        $container .= '</div>';
        $container .= '<div class="partTimeGetJob" onclick="getParttimeJob(\''.$job['id'].'\', \'2\',  \'en\')">Get the job</div>';
    }
    
    if ($user->_actualEnergy < $job['energy3']) {
        $container .= '<div class="partTimeTime">30 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy3'].'</div>';
        $container .= '<div>Amount: '.$job['price3'].'</div>';
        $container .= '</div>';
    } else {
        $container .= '<div class="partTimeTime">30 min</div>';
        $container .= '<div class="partTimeRest">';
        $container .= '<div>Energy: '.$job['energy3'].'</div>';
        $container .= '<div>Amount: '.$job['price3'].'</div>';
        $container .= '</div>';
        $container .= '<div class="partTimeGetJob" onclick="getParttimeJob(\''.$job['id'].'\', \'3\',  \'en\')">Get the job</div>';
    }
    $container .= '</div>';

    $container .= '</div>';
}
$container .= '</div>';

$container .= '<div class="fiftyfifty">';
$container .= '<h3>Full time jobs</h3>';
$container .= '</div>';

$container .= '<div id="jobsResult"></div>';

return $container;