<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Laravel\Dusk\DuskServiceProvider;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        //static::$use_headless === true;
        //static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {


        $chromeOptions = new ChromeOptions;
        $chromeOptions->addArguments(array_filter([
            '--no-sandbox',
           // Disable browser window opening if needed
                '--headless',
            '--disable-gpu',
            sprintf(
                '--window-size=%d,%d',
                config('tests.browser.screen.width'),
                config('tests.browser.screen.height')
            ),
        ]));
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions)
        ->setCapability('acceptInsecureCerts', true);
        return RemoteWebDriver::create('http://localhost:8000',
            $capabilities,
            150000,
            150000
        );
        //$driver = RemoteWebDriver::create('http://localhost:8000', $caps);
        //return RemoteWebDriver::create(
        //    'http://localhost:8000', DesiredCapabilities::chrome()
        //);
    }
}
