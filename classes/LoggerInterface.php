<?php

namespace classes;

interface LoggerInterface
{
    public function info($message);

    public function error($message);
}