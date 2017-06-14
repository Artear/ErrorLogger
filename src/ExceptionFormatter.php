<?php

namespace ErrorLogger;

use Exception;

class ExceptionFormatter {
  public static function prettify(Exception $e) {
    $msg = 'Error: ' . $e->getMessage();
    $msg .= ' in ' . $e->getFile() . '(' . $e->getLine() . ')';

    return $msg;
  }

  public static function getCallStackHtml(Exception $e) {
    $trace = $e->getTrace();

    $msg = '</br>';
    $msg .= str_repeat('=', 50) . "\n";
    $msg .= '</br>';
    $i = 1;

    if (!empty($trace)) {
      foreach ($trace as $node) {
        if (isset($node['file'])) {
          $msg .= "$i. " . basename($node['file']) . ':' . $node['function'] . '(' . $node['line'] . ')</br>';
          $i++;
        }
      }
    }

    $msg .= str_repeat('=', 50) . "\n";
    $msg .= '</br>';

    return $msg;
  }
}