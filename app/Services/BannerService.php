<?php

namespace App\Services;

/**
 * Class BannerService
 * @package App\Services
 */
class BannerService
{
    /**
     * @return \string[][]
     */
    public function all()
    {
        return array(
            [
                'url-mobile' => 'img/banner/mobile/20220425115402.png',
                'url-web' => 'img/banner/web/20220425115402.png',
                'link' => 'http://batismo.igrejamsv.org',
            ],
        );
    }
}
