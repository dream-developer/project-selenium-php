<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
// ChromeOptions
use Facebook\WebDriver\Chrome\ChromeOptions;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/javascript.html";
// headlessモードにする
$options = new ChromeOptions();
$options->addArguments(["--headless"]);
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options );
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// ウィンドウサイズをブラウザ表示域にする
$w = $driver->executeScript("return document.body.scrollWidth;");
$h = $driver->executeScript("return document.body.scrollHeight;");
$dimension = new WebDriverDimension($w, $h);
$driver->manage()->window()->setSize($dimension);
$driver->takeScreenshot("screenshot_full.png");
sleep(3);
$driver->quit();
