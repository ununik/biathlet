<?php
$container = '';

$container .= '<div class="fiftyfifty">';
$container .= '<h3>Part time jobs</h3>';
foreach ($job->getAllPartTimeJobs($user->_maxEnergy, $page->_language) as $job) {
    $container .= '<div>';
    $container .= '<div class="partTimeTitle">'.$job['title'].'</div>';
    $container .= '<table class="partTimeDetail">';
    for ($i = 1; $i < 4; $i++) {
    	$container .= '<tr class="detail'.$i.'">';
    	$container .= '<td class="partTimeTime">'.$i.'0 min</td>';
    	$container .= '<td class="partTimeRest">';
    	$container .= '<div>Energy: '.$job['energy'.$i].'</div>';
    	$container .= '<div>Amount: '.\Library\Extra\moneyFormat($job['price'.$i]).'</div>';
    	if ($user->_actualEnergy < $job['energy'.$i]) {
    		$container .= '<td class="partTimeGetJob">Lack of energy</td>';
    	} else {
    		$container .= '<td class="partTimeGetJob" onclick="getParttimeJob(\''.$job['id'].'\', \''.$i.'\',  \'en\')"></td>';
    	}
    	$container .= '</tr>';
    }
    $container .= '</table>';
    $container .= '</div>';
}
$container .= '</div>';

$container .= '<div class="fiftyfifty">';
$container .= '<h3>Full time jobs</h3>';
$container .= '</div>';

$container .= '<div id="jobsResult"></div>';

return $container;