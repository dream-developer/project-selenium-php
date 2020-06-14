<?php
$html = "
<html>
<body>
<div>【１】<p>【１−１】</p><p>【１−２】</p></div>
<div>【２】<p>【２−１】</p><p>【２−２】</p></div>
</body>
</html>
";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$xpath = new DOMXPath($dom);
$query = "/html/body/div[1]";
$nodes = $xpath->query($query);
echo $nodes->item(0)->nodeValue . PHP_EOL;
$query = "/html/body/div[2]/p[2]";
$nodes = $xpath->query($query);
echo $nodes->item(0)->nodeValue . PHP_EOL;