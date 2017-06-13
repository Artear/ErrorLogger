<?php


namespace ErrorLogger;


use Exception;

class OnScreenLogger implements ErrorLogger {

  public function logError(Exception $e) {
    echo ExceptionFormatter::prettify($e);
    echo ExceptionFormatter::getCallStackHtml($e);
  }
}