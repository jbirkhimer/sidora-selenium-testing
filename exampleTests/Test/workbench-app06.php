<?php
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
		  
class ExampleChromeTest extends \PHPUnit\Framework\TestCase {
	
	public function testfirefox() {
		  

		  $web_driver = RemoteWebDriver::create(
			"http://localhost:4444/wd/hub",
			array("platform"=>"WINDOWS", "browserName"=>"chrome")
		  );
		  $web_driver->get("http://google.com");

		  $element = $web_driver->findElement(WebDriverBy::name("q"));
		  if($element) {
			  $element->sendKeys("TestingBot");
			  $element->submit();
		  }
		  $title = $web_driver->getTitle();
		  
		  print $title;
		  
		  $this->assertContains('Google', $title);
		  $web_driver->quit();
	}
}
?>