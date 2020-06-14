<?php
$html = "
<body>
<a href='./page1.html'>text1</a>
<a href='./page2.html'>text2 </a>
<a href='./page3.html'>abcd3</a>
</body>
";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
@$dom->loadHTML($html, $options);
$xpath = new DOMXPath($dom);
$query = "//a[substring(text(), 3) = 'cd3']";
$nodes = $xpath->query($query);
foreach($nodes as $node){
   echo $node->getAttribute('href') . PHP_EOL;
}