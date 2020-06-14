<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/dialog.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// [アラート] OK
$driver->findElement(WebDriverBy::id("alert"))->click();
sleep(1);
$driver->switchTo()->alert()->accept();
// [確認] Cancel
$driver->findElement(WebDriverBy::id("confirm"))->click();
sleep(1);
$driver->switchTo()->alert()->dismiss();
// [入力] OK → [アラート] OK
$driver->findElement(WebDriverBy::id("prompt"))->click();
sleep(1);
$driver->switchTo()->alert()->sendKeys("てすと");
$driver->switchTo()->alert()->accept();
sleep(1);
$driver->switchTo()->alert()->accept();
sleep(3);
$driver->quit();
