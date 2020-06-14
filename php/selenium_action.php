<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
$tag_link = $driver->findElement(WebDriverBy::tagName("a"));
// Ctrl + クリック
$driver->action()
    ->keyDown(null, WebDriverKeys::CONTROL)
    ->click($tag_link)
    ->keyUp(null, WebDriverKeys::CONTROL)
    ->perform();
// タブの移動
$driver->switchTo()->window($driver->getWindowHandles()[1]);
sleep(3);
// Ctrl + a
$driver->action()
    ->keyDown(null, WebDriverKeys::CONTROL)
    ->sendKeys(null, "a")
    ->keyUp(null, WebDriverKeys::CONTROL)
    ->perform();
sleep(3);
$driver->quit();
