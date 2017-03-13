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
     * @param array $data Payload
     * @param array $params Query string
     * @return array Response data
     */
    public function request($method, $url, $data = null, $params = null)
    {
        $url = ltrim($url, '/');
        return $this->nation->request(
            $method,
            "sites/$this->siteSlug/$url",
            $data,
            $params
        );
    }
}
