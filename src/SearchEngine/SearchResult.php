<?php

namespace Slicvic\Whip\SearchEngine;

/**
 * Class to represent search engine results.
 */
class SearchResult
{
    /**
     * @var int
     */
    protected $totalHits;

    /**
     * @var array
     * @see data/cars.json for example.
     */
    protected $results;

    /**
     * @param array $results
     * @param int   $totalHits
     */
    public function __construct(array $results, int $totalHits)
    {
        $this->results = $results;
        $this->totalHits = $totalHits;
    }

    /**
     * @return int
     */
    public function getTotalHits()
    {
        return $this->totalHits;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }
}
