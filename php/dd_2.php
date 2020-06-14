<?php
$html = "<body><p>てすと</div></body>";
$dom = new DOMDocument;
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
libxml_use_internal_errors(true);
$dom->loadHTML($html, $options);
foreach (libxml_get_errors() as $error) {
    echo $error->message . PHP_EOL;
}
libxml_clear_errors();