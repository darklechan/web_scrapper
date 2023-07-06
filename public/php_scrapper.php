<?php
require '../vendor/autoload.php';

include('getDomXpath.php');
include('getScrapperList.php');

    $xpath = get('https://news.ycombinator.com/');

    $extractedTitles = getXpathList($xpath);

    $scrapperResult = json_encode($extractedTitles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES, );

    var_dump($scrapperResult);
