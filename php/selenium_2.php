<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
// Chromeオプション
use Facebook\WebDriver\Chrome\ChromeOptions;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
// Chromeオプションのインスタンス
$options = new ChromeOptions();
// Chromeオプションを設定
$options->addArguments(["--incognito", "--window-size=500,300"]);
// 機能にChromeオプションを渡す
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options );
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
sleep(3);
$driver->quit();
