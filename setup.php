<?php

$seleniumServerDir = 'selenium-server';
$seleniumServer = $seleniumServerDir . '/selenium-server-standalone-3.3.1.jar';
$firefoxDriver = $seleniumServerDir . '/geckodriver.exe';
$chromedriver = $seleniumServerDir . '/chromedriver.exe';
$composer = 'composer.phar';

if (!file_exists($seleniumServerDir)) {
    echo "Create directory $seleniumServerDir";
	system('mkdir ' . $seleniumServerDir);
	echo PHP_EOL;
	echo PHP_EOL;
}

if (!file_exists($seleniumServer)) {
	echo 'Downloading selenium-server-standalone...';
	echo PHP_EOL;
	copy('http://selenium-release.storage.googleapis.com/3.3/selenium-server-standalone-3.3.1.jar', $seleniumServer);
	echo PHP_EOL;
}


if (!file_exists($firefoxDriver)) {
	echo 'Downloading geckodriver-v0.15.0-win64.zip...';
	echo PHP_EOL;
	copy('https://github.com/mozilla/geckodriver/releases/download/v0.15.0/geckodriver-v0.15.0-win64.zip', 'selenium-server/geckodriver-v0.15.0-win64.zip');
	system('unzip selenium-server/geckodriver-v0.15.0-win64.zip -d ./selenium-server');
	echo PHP_EOL;
}

if (!file_exists($chromedriver)) {
	echo 'Downloading chromedriver_win32.zip...';
	echo PHP_EOL;
	copy('https://chromedriver.storage.googleapis.com/2.28/chromedriver_win32.zip', 'selenium-server/chromedriver_win32.zip');
	system('unzip selenium-server/chromedriver_win32.zip -d ./selenium-server');
	echo PHP_EOL;
}

if (!file_exists($composer)) {
	echo 'Downloading Composer...';
	echo PHP_EOL;
	copy('https://getcomposer.org/composer.phar', $composer);
	echo PHP_EOL;
}

system('php composer.phar update');

?>
