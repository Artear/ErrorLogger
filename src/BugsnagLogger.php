<?php


namespace ErrorLogger;

require_once __DIR__ . '/Bugsnag/Autoload.php';

use Bugsnag_Client;
use Exception;

class BugsnagLogger implements ErrorLogger {

  private  $apiKey = '';

  function __construct($apiKey = "") {
    $this->apiKey = $apiKey;
  }

  public function logError(Exception $exception) {

    $name = $exception->getFile() . ":" . $exception->getLine();

    $metadata = [
      'stack_trace_str' => $exception->getTraceAsString(),
      'exception_code' => $exception->getCode()
    ];

    $bugsnag = new Bugsnag_Client($this->apiKey);
    $bugsnag->notifyError($name, $exception->getMessage(), $metadata, 'error');
  }
}