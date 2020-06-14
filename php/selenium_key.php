<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/key.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
$text1 = $driver->findElement(WebDriverBy::name("text1"));
$text2 = $driver->findElement(WebDriverBy::name("text2"));
// text1 SHIFTキー押しながら test
$text1->sendKeys(WebDriverKeys::SHIFT."test");
// text1 Ctrlキー押しながら ac
$text1->sendKeys(WebDriverKeys::CONTROL."ac");
// text2 Ctrlキー押しながら v
$text2->sendKeys(WebDriverKeys::CONTROL."v");
sleep(3);
$driver->quit();
