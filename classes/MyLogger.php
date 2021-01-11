<?php

namespace classes;

class MyLogger implements LoggerInterface
{
    private $log_file;

    public function __construct($log_file)
    {
        $this->log_file = $log_file;
    }

    public function info($message)
    {
        file_put_contents($this->log_file, date('Y-m-d H:i:s') . ' INFO: ' . $message . PHP_EOL, FILE_APPEND);
    }

    public function error($message)
    {
        file_put_contents($this->log_file, date('Y-m-d H:i:s') . ' ERROR: ' . $message . PHP_EOL, FILE_APPEND);
    }
}