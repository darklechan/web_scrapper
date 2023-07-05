<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;

    $client = new Client();

    $response = $client->get('https://news.ycombinator.com/');
    //Load the web page into a string
    $htmlString = (string) $response->getBody();
    $document = new DOMDocument();
    $document->loadHTML($htmlString);
    $xpath = new DOMXPath($document);

    list($orderNumbers, $titles, $scores) = getListAttributes($xpath);

    //last() is not getting last a
    //$comments = $xpath->evaluate('//span[@class="subline"]//a[last()]');
    $extractedTitles = [];

    foreach ($titles as $key => $title) {
        $extractedTitles[] = $orderNumbers[$key]->textContent .' '. $title->textContent
            .' '. $scores[$key]->textContent;
    }

    $scrapperResult = json_encode($extractedTitles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES, );

    var_dump($extractedTitles);

    $test = filterArray($extractedTitles);

    /**
     * @param DOMXPath $xpath
     * @return array
     */
    function getListAttributes(DOMXPath $xpath): array
    {
        $orderNumbers = $xpath->evaluate('//span[@class="rank"]');
        $titles = $xpath->evaluate('//span[@class="titleline"]');
        $scores = $xpath->evaluate('//span[@class="subline"]//span[@class="score"]');
        return array($orderNumbers, $titles, $scores);
    }

    function filterArray(array $list): array
    {
        $test = (object) $list;

        return var_dump($test);
    }