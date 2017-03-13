<?php

namespace library\nationbuilder;

class Site
{
    /**
     * @var Nation
     */
    private $nation;
    /**
     * @var string
     */
    private $siteSlug;

    /**
     * @param Nation $nation
     * @param string $slug
     */
    public function __construct(Nation $nation, $slug)
    {
        $this->nation = $nation;
        $this->siteSlug = $slug;
    }

    /**
     * @param string $method
     * @param string $url Relative to "/api/v1/sites/xyz/"
     * @param array $params Query string
     * @param array $data Payload
     * @return array Response data
     */
    public function request($method, $url, $params = [], $data = null)
    {
        $url = ltrim($url, '/');
        return $this->nation->request(
            $method,
            "sites/$this->siteSlug/$url",
            $params,
            $data
        );
    }
}
