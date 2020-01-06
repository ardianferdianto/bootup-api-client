<?php
/**
 * Created by PhpStorm.
 * User: ardianferdianto
 * Date: 21/11/19
 * Time: 16.37
 */

namespace BootUP\Client;


class EndpointBuilder
{
    private $endpoint;
    private $include;
    private $search;

    /**
     * EndpointBuilder constructor.
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function setIncludes(array $includes)
    {
        $this->include = $includes;

        return $this;
    }

    public function getIncludes() {
        return $this->include;
    }

    public function setSearch(array $search)
    {
        $this->search = $search;

        return $this;
    }

    public function build() : string
    {
        $url = $this->endpoint;
        $params = [];
        if($this->include)
            $params[] = 'include=' . implode(',', $this->include);
        if($this->search) {
            $params[] = 'search=' . implode(';', $this->searchBuilder($this->search));
        }
        $params = implode('&', $params);
        return $url.'?'.$params;
    }

    private function searchBuilder(array $searchs)
    {
        $search = [];
        foreach ($searchs as $key => $val) {
            $search[] = $key.':'.$val;
        }

        return $search;
    }
}