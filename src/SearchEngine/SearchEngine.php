<?php

namespace Slicvic\Whip\SearchEngine;

/**
 * Brains of the operation.
 */
class SearchEngine implements SearchEngineInterface
{
    /**
     * Data to search.
     *
     * @var array
     */
    protected $data;

    /**
     * {@inheritdoc}
     */
    public function search(array $keywords, int $limit = 3)
    {
        if (empty($this->data) || !is_array($this->data)) {
            throw new SearchEngineException('No data to search!');
        }

        // Trim keywords
        foreach ($keywords as $k => $v) {
            $keywords[$k] = trim($v);
        }

        // Do search
        $results = array_filter($this->data, function(array $row) use ($keywords) {
            return (count(array_intersect($keywords, $row['keywords'])) > 0);
        });

        // Return findings
        $totalHits = count($results);
        $resultsLimitted = array_values(array_slice($results, 0, $limit));

        return new SearchResult($resultsLimitted, $totalHits);
    }

    /**
     * {@inheritdoc}
     */
    public function loadData(string $filename)
    {
        $json = @file_get_contents($filename);
        if (false === $json) {
            throw new SearchEngineException("Couldn't read file: " . $filename);
        }
        $data = json_decode($json, true);
        if (!is_array($data)) {
            throw new SearchEngineException("Couldn't parse JSON: " . $filename);
        }
        $this->data = $data;
    }
}
