<?php
// An example of using php-webdriver.

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

// start Firefox with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default

//this does not seem to work correctly  (Jason)
/* $capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000); */

$driver = RemoteWebDriver::create($host, array("platform"=>"WINDOWS", "browserName"=>"firefox"), 5000);

// navigate to 'http://www.seleniumhq.org/'
$driver->get('http://www.seleniumhq.org/');

//this does not seem to work correctly  (Jason)
// adding cookie
/* $driver->manage()->deleteAllCookies();

$cookie = new Cookie('cookie_name', 'cookie_value');
$driver->manage()->addCookie($cookie);

$cookies = $driver->manage()->getCookies();
print_r($cookies); */

// click the link 'About'
$link = $driver->findElement(
    WebDriverBy::id('menu_about')
);
$link->click();


//this does not seem to work correctly  (Jason)
// wait until the page is loaded
/* $driver->wait()->until(
    WebDriverExpectedCondition::titleContains('About')
); */

// print the title of the current page
echo "The title is '" . $driver->getTitle() . "'\n";

// print the URI of the current page
echo "The current URI is '" . $driver->getCurrentURL() . "'\n";

//this does not seem to work correctly (Jason)
/* // write 'php' in the search box
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
); */

// close the Firefox
$driver->quit();