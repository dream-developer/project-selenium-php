<?php
$html = '
<html><body>
<div class="aaa">aaa<p id=100 class="aaa">ppp</p></div>
<div class="aab">aab</div>
<div class="aaa bbb">aaa bbb</div>
</body></html>
';
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$xpath = new DOMXPath($dom);
$query = "//*[@class = 'aaa']";
$nodes = $xpath->query($query);
foreach($nodes as $node){
  echo $node->nodeValue . PHP_EOL;  
}