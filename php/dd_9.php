<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use DOMDocument;
use DOMXPath;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->manage()->timeouts()->implicitlyWait(10);
$driver->get($url);
// HTMLをパースして"商品名,単価" の文字列を返す
function getParsedData($html){
    $dom = new DOMDocument;
    $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
    $options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
    @$dom->loadHTML($html, $options);
    $xpath = new DOMXPath($dom);
    $item_name = $xpath->query("//*[@class = 'item_name']")->item(0)->nodeValue;
    $unit_price = $xpath->query("//*[@class = 'unit_price']")->item(0)->nodeValue;
    $unit_price = str_replace("円", "", $unit_price);
    $data = "${item_name},${unit_price}";
    return $data;
}
// １．リンクの要素を取得
$item_links = $driver->findElements(WebDriverBy::cssSelector("ul.item_link > li > a"));
foreach($item_links as $item_link){
    // アクセス間隔は1秒以上空ける
    sleep(1);
    // ２．Ctrl + クリック
    $driver->action()
        ->keyDown(null, WebDriverKeys::CONTROL)
        ->click($item_link)
        ->keyUp(null, WebDriverKeys::CONTROL)
        ->perform();
    // ３．タブの移動
    $driver->switchTo()->window($driver->getWindowHandles()[1]);
    // ４．HTMLをパースし出力
    echo getParsedData($driver->getPageSource()) . PHP_EOL;
    // タブを閉じる
    $driver->close();
    // ５．元のタブへ移動    
    $driver->switchTo()->window($driver->getWindowHandles()[0]);
}
sleep(3);
$driver->quit();