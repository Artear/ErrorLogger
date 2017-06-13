<?php


namespace ErrorLogger;

final class ErrorHandlerHelper {
  public static function autoConfigure(ErrorHandler $errorHandler) {
    $errorHandler->addLogger(new ServerLogger());
  }
}