<?php
namespace exampleTests\Test;

require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;

class PHPUnitFirefoxTest extends \PHPUnit\Framework\TestCase {
    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
    {
        //$capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		//$capabilities = array("platform"=>"WINDOWS", "browserName"=>"firefox");
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', array("platform"=>"WINDOWS", "browserName"=>"firefox"));
    }
	
	public function tearDown()
	{
		// close the Firefox
		$this->webDriver->quit();
	}

    protected $url = 'https://github.com';

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('GitHub', $this->webDriver->getTitle());
		
    }

}
?>