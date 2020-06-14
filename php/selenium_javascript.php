<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/javascript.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// [1] JavaScript で計算しアラートで表示
$driver->executeScript("ans = 1 +1 ; alert(ans);");
sleep(1);
// [2] アラートのOK押下
$driver->switchTo()->alert()->accept();
// [3] myfunc関数実行
$driver->executeScript("myfunc(ans);");
sleep(1);
$driver->switchTo()->alert()->accept();
// [4] スクロール
$driver->executeScript("window.scrollTo(0, document.body.scrollHeight);");
sleep(3);
$driver->quit();
