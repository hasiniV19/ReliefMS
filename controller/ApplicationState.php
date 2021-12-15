<?php

namespace app\controller;

interface ApplicationState
{
    public function __construct($context);
    public function submit();
    public function decline();
    public function approve();
    public function close();
    public function __toString();
}