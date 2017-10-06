<?php

namespace Slicvic\Whip\SearchEngine;

/**
 * Interface for search engine.
 */
interface SearchEngineInterface
{
    /**
     * Load JSON data to search.
     *
     * @param string $filename
     * @throws \Slicvic\Whip\SearchEngine\SearchEngineException
     */
    public function loadData(string $filename);

    /**
     * Find images by keywords.
     *
     * @param  array   $keywords List of keywords to match.
     * @param  integer $limit    Maximum number of results to return.
     * @return \Slicvic\Whip\SearchEngine\SearchResult
     * @throws \Slicvic\Whip\SearchEngine\SearchEngineException
     */
    public function search(array $keywords, int $limit = 3);
}
