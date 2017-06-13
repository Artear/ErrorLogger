<?php


namespace ErrorLogger;

require_once __DIR__ . '/Bugsnag/Autoload.php';

use Bugsnag_Client;
use Exception;

class BugsnagLogger implements ErrorLogger {

  const BUGSNAG_API = '';

  public function logError(Exception $exception) {

    $name = $exception->getFile() . ":" . $exception->getLine();

    $metadata = [
      'stack_trace_str' => $exception->getTraceAsString(),
      'exception_code' => $exception->getCode()
    ];

    $bugsnag = new Bugsnag_Client(self::BUGSNAG_API);
    $bugsnag->notifyError($name, $exception->getMessage(), $metadata, 'error');
  }
}