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
    private $condition = [];

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
        if(!empty($this->condition)) {
            foreach ($this->condition as $key => $condition){
                $col = $condition['column'];
                $operator = $condition['operator'];
                $value = $condition['value'];
                $params[] = "condition[$col][$operator]=$value";
            }
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

    public function addCondition($key, $operator, $value)
    {
        array_push($this->condition, ["column" => $key, "operator" => $operator, "value" => $value]);
        return $this;
    }
}