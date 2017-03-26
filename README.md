# sidora-selenium-testing

run setup.php to install composer, php-webdriver, selenium-server, firefox webdriver and chrome webdriver
```bash
$ php setup.php
```

start the selenium-server
```bash
$ cd selenium-server
$ java -jar selenium-server-standalone-3.3.1.jar

or

run start-selenium-server.bat
```

The phpunit.xml file contains the PHPUnit test configuration and location of test
```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit colors="true">
    <testsuites>
        <testsuite name="Application Test Suite">
            <directory>./exampleTests/Test/</directory> 
        </testsuite>
    </testsuites>
</phpunit>
```

Running phpunit tests (open another cmd prompt)
```bash
vendor/bin/phpunit
```

Runing a single phpunit test
```bash
vendor/bin/phpunit exampleTests/Test/SimpleTest.php
```


