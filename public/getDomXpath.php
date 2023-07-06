<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @throws GuzzleException
 */
function get(string $url): DOMXPath {

    $client = new Client();

    $response = $client->get($url);
    //Load the web page into a string
    $htmlString = (string) $response->getBody();
    $document = new DOMDocument();
    $document->loadHTML($htmlString);

    return new DOMXPath($document);
}
