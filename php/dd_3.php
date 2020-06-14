<?php
$html = "<body><p>てすと１</p><p>てすと２</p><p>てすと３</p></body>";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$nodes = $dom->getElementsByTagName("p");
foreach($nodes as $node){
   echo $node->nodeName . PHP_EOL;
   echo $node->nodeValue . PHP_EOL;
}