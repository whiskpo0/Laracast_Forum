<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

abstract class Filters
{
    protected $request;
    protected $builder;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilter() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
            
            $this->$filter($this->request->$filter);
        }

        return $this->builder;
    }

    public function getFilter()
    {
        return $this->request->only($this->filters);
    }
}
