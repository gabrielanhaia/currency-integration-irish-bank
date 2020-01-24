<?php


namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmai.com>
 */
class TestCase extends BaseTestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        require_once('./vendor/autoload.php');

        parent::__construct($name, $data, $dataName);
    }
}