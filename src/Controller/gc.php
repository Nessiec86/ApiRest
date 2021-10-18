<?php
namespace App\Controller;

use App\Service\GoogleCloud;
use Google\Cloud\BigQuery\BigQueryClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Google\Cloud\Core\ExponentialBackoff;

class gc //extends GoogleCloud
{
    public function get(): Response
    {

        $projectId = 'aerobic-acronym-329211';
        $serviceAccountPath = './../Service/key.json';
        $query = 'SELECT id, view_count FROM `bigquery-public-data.stackoverflow.posts_questions`';

        $bigQuery = new BigQueryClient([
            'projectId' => $projectId,
            'keyFilePath' => $serviceAccountPath,
        ]);

        $jobConfig = $bigQuery->query($query);
        $job = $bigQuery->startQuery($jobConfig);

        $backoff = new ExponentialBackoff(10);
        $backoff->execute(function () use ($job) {
            print('Waiting for job to complete' . PHP_EOL);
            $job->reload();
            if (!$job->isComplete()) {
                throw new Exception('Job has not yet completed', 500);
            }
        });
      
        $queryResults = $job->queryResults();

        $i = 0;
        foreach ($queryResults as $row) {
            printf('--- Row %s ---' . PHP_EOL, ++$i);
            foreach ($row as $column => $value) {
                printf('%s: %s' . PHP_EOL, $column, json_encode($value));
            }
        }
        printf('Found %s row(s)' . PHP_EOL, $i);
        echo "<script>console.log('Get ')</script>";
       
        return new Response (
            '<html><body>Query:'.$queryResults.'</body></html>'
        );
    }
}




