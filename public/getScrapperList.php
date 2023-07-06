<?php

function getXpathList(DOMXPath $xpath): array {
    $orderNumbers = $xpath->evaluate('//span[@class="rank"]');
    $titles = $xpath->evaluate('//span[@class="titleline"]');
    $scores = $xpath->evaluate('//span[@class="subline"]//span[@class="score"]');

    //last() is not getting last a
    //$comments = $xpath->evaluate('//span[@class="subline"]//a[last()]');
    $extractedTitles = [];

    foreach ($titles as $key => $title) {
        $extractedTitles[] = $orderNumbers[$key]->textContent .' '. $title->textContent
            .' '. $scores[$key]->textContent;
    }

    return $extractedTitles;
}