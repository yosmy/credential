<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class CredentialTest extends TestCase
{
    public function testGetters()
    {
        $id = 'id';
        $token = 'token';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';
        $roles = ['role'];

        $credential = new Yosmy\Credential(
            $id,
            $token,
            $country,
            $prefix,
            $number,
            $roles
        );

        $this->assertEquals(
            $id,
            $credential->getId()
        );

        $this->assertEquals(
            $token,
            $credential->getToken()
        );

        $this->assertEquals(
            $country,
            $credential->getCountry()
        );

        $this->assertEquals(
            $prefix,
            $credential->getPrefix()
        );

        $this->assertEquals(
            $number,
            $credential->getNumber()
        );

        $this->assertEquals(
            $roles,
            $credential->getRoles()
        );
    }

    public function testJsonSerialize()
    {
        $id = 'id';
        $token = 'token';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';
        $roles = ['role'];

        $credential = new Yosmy\Credential(
            $id,
            $token,
            $country,
            $prefix,
            $number,
            $roles
        );

        $this->assertEquals(
            [
                'id' => $id,
                'token' => $token,
                'country' => $country,
                'prefix' => $prefix,
                'number' => $number,
                'roles' => $roles
            ],
            $credential->jsonSerialize()
        );
    }
}