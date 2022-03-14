<?php

$url = $argv[1] ?? null;
if (!$url) {
    throw new Exception('url is required');
}

$modifications = [];

$xml = new XMLReader();
$xml->open($url);
while ($xml->read()) {
    if ($xml->nodeType == XMLReader::ELEMENT && $xml->name == 'modification') {
        $modifications[$xml->getAttribute('name')] = null;
    }
}
$xml->close();

echo count($modifications);
echo PHP_EOL;
