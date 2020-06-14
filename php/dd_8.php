<?php
$html = "
<html><body>
<div>aaa<p>ppp</p><p>qqq</p><p>rrr</p></div>
</body></html>
";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$xpath = new DOMXPath($dom);
$query = "//div";
$nodes = $xpath->query($query);
$node = $nodes->item(0);
$c_nodes = $node->childNodes;
for($i = $c_nodes->length; --$i >= 1;) {
  $c_node = $c_nodes->item($i);
  $c_node->parentNode->removeChild($c_node);
}
// aaa
echo $node->nodeValue . PHP_EOL;