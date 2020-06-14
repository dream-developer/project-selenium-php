<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/modal.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// [1] モーダルを出すボタン
$driver->findElement(WebDriverBy::id("btn"))->click();
// [2] モーダルの入力欄
$driver->findElement(WebDriverBy::id("inputfield"))->sendKeys("てすと");
// [3] モーダルの入力後OKボタン
$driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[3]/div/button"))->click();
sleep(3);
$driver->quit();
