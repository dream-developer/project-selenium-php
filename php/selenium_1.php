<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
// Chrome のドライバを取得
$driver = RemoteWebDriver::create($host, $capabilities);
// urlを開く
$driver->get($url);
sleep(3);
// 終了する
$driver->quit();
