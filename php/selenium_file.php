<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/file.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
$upfile = 'C:\Users\writer\study_work\html\test.txt';
$driver->findElement(WebDriverBy::name("filename"))->sendKeys($upfile);
sleep(3);
$driver->quit();
