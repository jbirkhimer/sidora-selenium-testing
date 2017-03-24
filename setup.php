<?php

echo 'Downloading selenium-server-standalone-3.3.1.jar...';
echo PHP_EOL;
copy('http://selenium-release.storage.googleapis.com/3.3/selenium-server-standalone-3.3.1.jar', 'selenium-server-standalone-3.3.1.jar');

echo 'Downloading geckodriver-v0.15.0-win64.zip...';
echo PHP_EOL;
copy('https://github.com/mozilla/geckodriver/releases/download/v0.15.0/geckodriver-v0.15.0-win64.zip', 'geckodriver-v0.15.0-win64.zip');
$output = system('unzip geckodriver-v0.15.0-win64.zip');
echo $output;
echo PHP_EOL;

echo 'Downloading chromedriver_win32.zip...';
echo PHP_EOL;
copy('https://chromedriver.storage.googleapis.com/2.28/chromedriver_win32.zip', 'chromedriver_win32.zip');
$output = system('unzip chromedriver_win32.zip');
echo $output;
echo PHP_EOL;

echo 'Downloading composer-setup.php...';
echo PHP_EOL;
echo PHP_EOL;
$url = "https://composer.github.io/installer.sig";
$EXPECTED_SIGNATURE = file_get_contents($url);
copy('https://getcomposer.org/installer', 'composer-setup.php');

if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') {
	echo 'Installer verified';
	echo PHP_EOL;
	echo PHP_EOL;
	system('php composer-setup.php');
	echo 'Finished installing Composer...';
	echo PHP_EOL;
	echo PHP_EOL;
	echo 'Installing facebook/webdriver library...';
	echo PHP_EOL;
	echo PHP_EOL;
	system('php composer.phar require facebook/webdriver');
	echo 'Finished installing facebook/webdriver library...';
	echo PHP_EOL;
} else {
	echo 'Installer corrupt';
	echo PHP_EOL;
	unlink('composer-setup.php');
}

system('rm composer-setup.php');

?>