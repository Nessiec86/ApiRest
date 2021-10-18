<?php
namespace App\Controller;

use App\Service\GoogleCloud;
use Google\Cloud\BigQuery\BigQueryClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class gc //extends GoogleCloud
{
    public function get(): Response
    {
       
        echo "<script>console.log('Get ')</script>";
        
        return new Response (
            '<html><body>Query:'.$queryResults.'</body></html>'
        );
    }
}




