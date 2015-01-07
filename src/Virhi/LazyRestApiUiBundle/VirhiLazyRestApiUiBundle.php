<?php

namespace Virhi\LazyRestApiUiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VirhiLazyRestApiUiBundle extends Bundle
{
    public function getParent()
    {
        return 'VirhiAdminBundle';
    }
}
