<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/coffee.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// プルダウン要素からWebDriverSelectインスタンスを取得
$element = $driver->findElement(WebDriverBy::name("num"));
$select_num = new WebDriverSelect($element);
// selectByValue 等のメソッドで操作
$select_num->selectByValue("2");
$element = $driver->findElement(WebDriverBy::xpath("/html/body/form/input[1]"));
$element->click();
$chk_sugar = $driver->findElement(WebDriverBy::cssSelector("input[name='included'][value='sugar']"));
$chk_milk = $driver->findElement(WebDriverBy::cssSelector("input[name='included'][value='milk']"));
$chk_cream = $driver->findElement(WebDriverBy::cssSelector("input[name='included'][value='cream']"));
$chk_sugar->click();
$chk_cream->click();
var_dump($chk_milk->isSelected()); // bool(false)
var_dump($chk_cream->isSelected()); // bool(true)
$element = $driver->findElement(WebDriverBy::name("remarks"));
$element->sendKeys("やや熱めでお願いします");
sleep(1);
$element = $driver->findElement(WebDriverBy::cssSelector("input[type='submit']"));
//$element = $driver->findElement(WebDriverBy::cssSelector("input[type='reset']"));
$element->click();
// acceptメソッドでOK押下
$driver->switchTo()->alert()->accept();
sleep(3);
$driver->quit();
