<?php
/**
 * Created by PhpStorm.
 * User: kaanmamikoglu
 * Date: 11/04/15
 * Time: 00:39
 */

function getFeed($feed_url)
{
    $xml = ($feed_url);

    $xmlDoc = new DOMDocument();
    $xmlDoc->load($xml);

    for ($i=0; $i<=5; $i++) {
        $channel = $xmlDoc->getElementsByTagName('entry')->item($i);
        $channel_title = $channel->getElementsByTagName('title')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_link = $channel->getElementsByTagName('link')
            ->item(0)->childNodes->item(0)->nodeValue;
        $channel_desc = $channel->getElementsByTagName('content')
            ->item(0)->childNodes->item(0)->nodeValue;

        echo($channel_link
            . " " . $channel_title);
        echo("<br>");
        echo($channel_desc);
    }
}

getFeed("http://feeds.bbci.co.uk/news/rss.xml");