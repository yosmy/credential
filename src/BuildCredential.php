<?php

namespace Yosmy;

use Yosmy\Jwt;

/**
 * @di\service({private: true})
 */
class BuildCredential
{
    /**
     * @var Jwt\ManageToken
     */
    private $manageToken;

    /**
     * @var GatherPhone
     */
    private $gatherPhone;

    /**
     * @var GatherPrivilege
     */
    private $gatherPrivilege;

    /**
     * @param Jwt\ManageToken $manageToken
     * @param GatherPhone     $gatherPhone
     * @param GatherPrivilege $gatherPrivilege
     */
    public function __construct(
        Jwt\ManageToken $manageToken,
        GatherPhone $gatherPhone,
        GatherPrivilege $gatherPrivilege
    ) {
        $this->manageToken = $manageToken;
        $this->gatherPhone = $gatherPhone;
        $this->gatherPrivilege = $gatherPrivilege;
    }

    /**
     * @param string $id
     *
     * @return Credential
     */
    public function build(string $id): Credential
    {
        $token = $this->manageToken->create(
            'user',
            $id
        );

        $phone = $this->gatherPhone->gather(
            $id,
            null,
            null,
            null
        );

        $privilege = $this->gatherPrivilege->gather(
            $id
        );

        return new Credential(
            $id,
            $token,
            $phone->getCountry(),
            $phone->getPrefix(),
            $phone->getNumber(),
            $privilege->getRoles()
        );
    }
}
