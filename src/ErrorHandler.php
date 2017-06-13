<?php


namespace ErrorLogger;


class ErrorHandler {
  private $loggers = array();
  private $errors = array();
  private $dieOnError = FALSE;

  /**
   * ErrorHandler constructor.
   */
  public function __construct() {
  }

  public function addLogger(ErrorLogger $handler) {
    $this->loggers[] = $handler;
    return $this;
  }

  public function dieOnError($enable = TRUE) {
    $this->dieOnError = $enable;
    return $this;
  }

  /**
   * @return array
   */
  public function getErrors() {
    return $this->errors;
  }

  public function onError(\Exception $exception) {
    /** @var ErrorLogger $handler */
    foreach ($this->loggers as $handler) {
      $handler->logError($exception);
    }

    if ($this->dieOnError) {
      throw new \ErrorException(400);
    }

    return $this;
  }
}