<?php
$html = "<body><p>てすと１</p><p>てすと２</p><p>てすと３</p></body>";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$htmlStr = $dom->saveHTML();
$htmlStr = mb_convert_encoding($htmlStr, 'UTF-8', 'HTML-ENTITIES');
// HTML整形前
echo $htmlStr;
$dom->formatOutput = true;
$htmlStr = $dom->saveHTML();
$htmlStr = mb_convert_encoding($htmlStr, 'UTF-8', 'HTML-ENTITIES');
// HTML整形後
echo $htmlStr;