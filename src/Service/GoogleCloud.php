<?php
namespace Google\Cloud\Samples\Auth;

require __DIR__ .'./../../vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

function auth_cloud_explicit($projectId, $serviceAccountPath)
{
  # Explicitly use service account credentials by specifying the private key
  # file.
  $config = [
      'keyFilePath' => $serviceAccountPath,
      'projectId' => $projectId,
  ];
  $storage = new StorageClient($config);

  # Make an authenticated API request (listing storage buckets)
  foreach ($storage->buckets() as $bucket) {
      printf('Bucket: %s' . PHP_EOL, $bucket->name());
    }
}

// //Query

// $query = <<<ENDSQL
// SELECT
//   CONCAT(
//     'https://stackoverflow.com/questions/',
//     CAST(id as STRING)) as url,
//   view_count
// FROM `bigquery-public-data.stackoverflow.posts_questions`
// WHERE tags like '%google-bigquery%'
// ORDER BY view_count DESC
// LIMIT 10;
// ENDSQL;
// $queryJobConfig = $bigQuery->query($query);
// $queryResults = $bigQuery->runQuery($queryJobConfig);

// if ($queryResults->isComplete()) {
//     $i = 0;
//     $rows = $queryResults->rows();
//     foreach ($rows as $row) {
//         printf('--- Row %s ---' . PHP_EOL, ++$i);
//         printf('url: %s, %s views' . PHP_EOL, $row['url'], $row['view_count']);
//     }
//     printf('Found %s row(s)' . PHP_EOL, $i);
// } else {
//     throw new Exception('Query failed');
// }

echo "<script>console.log('Service ')</script>";
