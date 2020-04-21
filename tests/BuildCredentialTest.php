<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class BuildCredentialTest extends TestCase
{
    public function testBuild()
    {
        $id = 'id';
        $token = 'token';

        $manageToken = $this->createMock(Yosmy\Jwt\ManageToken::class);

        $manageToken->expects($this->once())
            ->method('create')
            ->with(
                'user',
                $id
            )
            ->willReturn($token);

        $gatherPhoneUser = $this->createMock(Yosmy\Phone\GatherUser::class);

        $phoneUser = new Yosmy\Phone\User(
            $id,
            'country',
            'prefix',
            'number'
        );

        $gatherPhoneUser->expects($this->once())
            ->method('gather')
            ->with(
                $id,
                null,
                null,
                null
            )
            ->willReturn(
                $phoneUser
            );

        $gatherPrivilegeUser = $this->createMock(Yosmy\Privilege\GatherUser::class);

        $privilegeUser = new Yosmy\Privilege\User(
            $id,
            ['role']
        );

        $gatherPrivilegeUser->expects($this->once())
            ->method('gather')
            ->with(
                $id,
                null
            )
            ->willReturn(
                $privilegeUser
            );

        $buildCredential = new Yosmy\BuildCredential(
            $manageToken,
            $gatherPhoneUser,
            $gatherPrivilegeUser
        );

        $expectedCredential = $buildCredential->build($id);

        $this->assertEquals(
            $expectedCredential,
            new Yosmy\Credential(
                $id,
                $token,
                $phoneUser->getCountry(),
                $phoneUser->getPrefix(),
                $phoneUser->getNumber(),
                $privilegeUser->getRoles()
            )
        );
    }
}