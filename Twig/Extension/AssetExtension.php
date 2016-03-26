<?php

/*
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 */

namespace Glory\Bundle\MediaBundle\Twig\Extension;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of AssetExtension
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
class AssetExtension extends \Twig_Extension
{

    protected $container;
    protected $asset;

    public function __construct(ContainerInterface $container, AssetExtension $asset)
    {
        $this->container = $container;
        $this->asset = $asset;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('media', array($this, 'getMediaUrl'))
        );
    }

    public function getMediaUrl($path)
    {
        $storages = $this->container->getParameter('media.storages');
        list($type, $uri) = explode('://', $path, 2);
        if (empty($storages[$type])) {
            return $path;
        }
        $path = $storages[$type]['uri'];
        $uri = $path . ((strrchr($path, '/') == '/') ? : '/') . $uri;
        return $this->asset->getAssetUrl($uri);
    }

    public function getName()
    {
        return 'glory.media.twig.extension.asset';
    }

}
