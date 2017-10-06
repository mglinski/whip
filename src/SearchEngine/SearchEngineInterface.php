<?php

namespace Slicvic\Whip\SearchEngine;

/**
 * Interface for search engine.
 */
interface SearchEngineInterface
{
    /**
     * Find images by keywords.
     *
     * @param  array   $keywords   A list of keywords to match.
     * @param  integer $maxResults Maximum number of results to return.
     * @return \Slicvic\Whip\SearchEngine\SearchResult
     */
    public function search(string $filename, array $keywords, int $maxResults = 3);
}
