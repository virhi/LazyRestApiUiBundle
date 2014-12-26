<?php

namespace Virhi\UiRestApiDoctrineBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VirhiUiRestApiDoctrineBundle extends Bundle
{
    public function getParent()
    {
        return 'VirhiAdminBundle';
    }
}
