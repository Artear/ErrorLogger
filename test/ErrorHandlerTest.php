<?php

namespace ErrorLoggerTest;

use ErrorLogger\ErrorHandler;
use ErrorLogger\ServerLogger;
use PHPUnit_Framework_TestCase;

class ErrorHandlerTest extends PHPUnit_Framework_TestCase {

  /**
   * @var \ErrorLogger\ErrorHandler;
   */
  private $errorHandler;

  public function setUp() {
    $this->errorHandler = new ErrorHandler();
  }

  /**
   * Test the Methods
   */
  public function testErrorHandlerMethods() {
    $this->assertTrue(method_exists($this->errorHandler, 'addLogger'));
    $this->assertTrue(method_exists($this->errorHandler, 'dieOnError'));
    $this->assertTrue(method_exists($this->errorHandler, 'getErrors'));
    $this->assertTrue(method_exists($this->errorHandler, 'onError'));
  }

  public function testAddLogger() {
    $this->assertInstanceOf(ErrorHandler::class, $this->errorHandler->addLogger(new ServerLogger()));
  }

  public function testDieOnError() {
    $this->assertInstanceOf(ErrorHandler::class, $this->errorHandler->dieOnError(true));
  }

  public function testOnError() {
    $this->assertInstanceOf(ErrorHandler::class, $this->errorHandler->onError(new \Exception()));
  }

  /**
   * @expectedException \ErrorException
   */
  public function testErrorException() {
    $this->errorHandler->dieOnError(true)->onError(new \Exception("Error Mock"));
  }

  public function testGetErrors() {
    $this->assertInternalType('array',$this->errorHandler->getErrors());
  }
}