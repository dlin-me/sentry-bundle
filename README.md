Dlin Symfony Sentry Bundle
=========

Dlin Sentry Bundle is Symfony2 wrapper bundle for the 'raven-php' library:


This Sentry Bundle provides a configurable service to work with Sentry



Version
--------------

0.9



Installation
--------------


Installation using [Composer](http://getcomposer.org/)

Add to your `composer.json`:


    json
    {
        "require" :  {
            "dlin/sentry-bundle": "dev-master"
        }
    }


Enable the bundle in you AppKernel.php


    public function registerBundles()
    {
        $bundles = array(
        ...
        new Dlin\Bundle\SentryBundle\DlinSentryBundle(),
        ...
    }


Configuration
--------------

The DSN url must be provided in the config.xml file. For example:

    #app/config/config.yml

    dlin_sentry:
        sentry_service:
            dsn: https://xxxxxxxxxxce4168aaafe6f658375edf:xxxxxxxxxxd44828a5ba7b78d807f5d@app.getsentry.com/123456



Usage
--------------

Geting the service in a controller

    $service =  $this->get('dlin.sentry_service');

Getting the service in a ContainerAwareService

    $service = $this->container->get('dlin.sentry_service');

Manually sending a message to Sentry

    $service->captureMessage('An error is found when user clicks the button');


Manually reporting an exception to Sentry

    try{
      throw new \Exception('hello, here is an exception');
    }catch(\Exception $e){
        $optionalData = array();
        $optionalData['phpVersion'] = '5.3';
        $service->captureException($e, $optionalData);
    }

Reporting errors to Sentry automatically.

    #web/app.php
    ...
    $kernel->loadClassCache();

    $kernel->boot();
    $kernel->getContainer()->get('dlin.sentry_service')->register();
    ...



License
-

MIT

*Free Software, Yeah!*


