<?php
$html = "<body><p id=1>てすと１</p><p id=2>てすと２</p><p id=3>てすと３</p></body>";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$nodes = $dom->getElementsByTagName("p");
$node = $dom->getElementById(2);
echo $node->nodeValue;