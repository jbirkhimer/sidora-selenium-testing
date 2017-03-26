<?php
// An example of using php-webdriver.
namespace exampleTests\Test;

require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Cookie;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class ExampleFirefoxTest extends \PHPUnit\Framework\TestCase {
	
	public function testfirefox() {

		// start Firefox with 5 second timeout
		$host = 'http://localhost:4444/wd/hub'; // this is the default

		//this does not seem to work correctly  (Jason)
		/* $capabilities = DesiredCapabilities::firefox();
		$driver = RemoteWebDriver::create($host, $capabilities, 5000); */

		$driver = RemoteWebDriver::create($host, array("platform"=>"WINDOWS", "browserName"=>"firefox"), 5000);

		// navigate to 'http://www.seleniumhq.org/'
		$driver->get('http://www.seleniumhq.org/');

		//this does not seem to work correctly  (Jason)
		// adding cookie
		$driver->manage()->deleteAllCookies();

		$cookie = new Cookie('cookie_name', 'cookie_value');
		$driver->manage()->addCookie($cookie);

		$cookies = $driver->manage()->getCookies();
		print_r($cookies);

		// click the link 'About'
		$link = $driver->findElement(
			WebDriverBy::id('menu_about')
		);
		$link->click();


		//this does not seem to work correctly  (Jason)
		// wait until the page is loaded
		$driver->wait()->until(
			WebDriverExpectedCondition::titleContains('About')
		);

		// print the title of the current page
		$title = $driver->getTitle();
		echo "The title is '" . $title . "'\n";
		$this->assertContains('About Selenium', $title);

		// print the URI of the current page
		$currentURI = $driver->getCurrentURL();
		echo "The current URI is '" . $currentURI . "'\n";
		$this->assertContains('http://www.seleniumhq.org/about/', $currentURI);

		//this does not seem to work correctly (Jason)
		// write 'php' in the search box
		$driver->findElement(WebDriverBy::id('q'))
			->sendKeys('php');


		// submit the form
		$driver->findElement(WebDriverBy::id('submit'))
			->click(); // submit() does not work in Selenium 3 because of bug https://github.com/SeleniumHQ/selenium/issues/3398

		// wait at most 10 seconds until at least one result is shown
		$driver->wait(20)->until(
			WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
				WebDriverBy::className('gsc-result')
			)
		);

		// close the Firefox
		$driver->quit();

	}

}