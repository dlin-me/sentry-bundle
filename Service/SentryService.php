<?php


namespace Dlin\Bundle\SentryBundle\Service;




class SentryService
{
    /**
     * @var
     */
    public $client;


    /**
     * Constructor
     *
     * @inheritdoc
     */
    function __construct($dsn)
    {
        $this->client = new \Raven_Client($dsn);

    }


    /**
     * Log a message to Sentry manually
     *
     * @param $msg
     * @return mixed, event Id
     */
    public function captureMessage($msg){
        return  $this->client->captureMessage($msg);
    }

    /**
     * Manually send an exception with optional data to Sentry
     *
     * @param $ex
     * @param $data
     * @return mixed|null  event Id
     */
    public function captureException(\Exception $ex, array $data){
        return  $this->client->captureException($ex, $data);
    }


    /**
     * Register the error/exception handlers.
     * i.e. Automatically sends error to Sentry
     */
    public function register(){
        $error_handler = new \Raven_ErrorHandler($this->client);
        $error_handler->registerExceptionHandler();
        $error_handler->registerErrorHandler();
        $error_handler->registerShutdownFunction();
    }


}