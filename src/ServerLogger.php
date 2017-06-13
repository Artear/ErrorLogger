<?php


namespace ErrorLogger;


use Exception;

class ServerLogger implements ErrorLogger {

  public function logError(Exception $e) {
    error_log(ExceptionFormatter::prettify($e));
  }
}