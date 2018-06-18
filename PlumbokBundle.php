<?php

namespace MJKruszewski\PlumbokBundle;


use MJKruszewski\PlumbokBundle\DependencyInjection\PlumbokExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlumbokBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new PlumbokExtension();
    }
}