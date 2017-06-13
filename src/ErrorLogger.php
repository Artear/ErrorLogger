<?php


namespace ErrorLogger;

use Exception;

interface ErrorLogger {
  public function logError(Exception $exception);
}