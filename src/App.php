<?php

namespace Slicvic\Whip;

use Slicvic\Whip\Cli\Input\InputInterface;
use Slicvic\Whip\Cli\Output\OutputInterface;
use Slicvic\Whip\SearchEngine\SearchEngineInterface;
use Slicvic\Whip\SearchEngine\SearchResult;
use Slicvic\Whip\SearchEngine\SearchEngineException;
use \stdClass;

class App
{
    /**
     * @var string
     */
    public static $defaultDataFile;

    /**
     * @var InputInterface
     */
    private $inputter;

    /**
     * @var OutputInterface
     */
    private $outputter;

    /**
     * @var SearchEngineInterface
     */
    private $searchEngine;

    /**
     * User input.
     *
     * @var stdClass
     */
    private $input;

    /**
     * @param InputInterface        $inputter
     * @param OutputInterface       $outputter
     * @param SearchEngineInterface $searchEngine
     */
    public function __construct(InputInterface $inputter,
                                OutputInterface $outputter,
                                SearchEngineInterface $searchEngine)
    {
        $this->inputter = $inputter;
        $this->outputter = $outputter;
        $this->searchEngine = $searchEngine;
        $this->input = new stdClass;
        $this->input->limit = null;
        $this->input->keywords = null;
    }

    /**
     * Run application.
     */
    public function run()
    {
        $this->printGreeting();
        $this->promptForDataFile();
        $this->promptForNumberOfResults();
        $this->promptForKeywords();
        $results = $this->doSearch();
        $this->printResults($results);
        exit;
    }

    /**
     * Print greeting.
     */
    private function printGreeting()
    {
        $this->outputter
            ->say("\n\n")
            ->say("\n#######################################################\n")
            ->say('                  Now watch me whip!')
            ->say("\n#######################################################\n")
            ->say("\n\n");
    }

    /**
     * Prompt user for data file.
     */
    private function promptForDataFile()
    {
        do {
            $file = $this->inputter->ask("Data file to search (leave blank for default) [" . static::$defaultDataFile . ']:');

            try {
                $this->searchEngine->loadData($file ?: static::$defaultDataFile);
                break;
            } catch (SearchEngineException $e) {
                $this->outputter
                    ->say("\n")
                    ->say('Aw, Snap!')
                    ->say("\n")
                    ->say($e->getMessage())
                    ->say("\n\n");
            }
        } while(true);
    }

    /**
     * Prompt user for number of images to display.
     */
    private function promptForNumberOfResults()
    {
        do {
            $this->input->limit = $this->inputter->ask('Number of images to display:');
            $isNumber = ctype_digit(strval($this->input->limit));
            $isGreaterThanZero = intval($this->input->limit) > 0;

            if ($isNumber && $isGreaterThanZero) {
                break;
            } else {
                $this->outputter
                    ->say("\n")
                    ->say("That's not enough need at least 1!")
                    ->say("\n\n");
            }
        } while (true);
    }

    /**
     * Prompt user for keywords to match.
     */
    private function promptForKeywords()
    {
        do {
            $this->input->keywords =
                $this->inputter->ask('Keywords to match: (comma-separated, i.e. red, honda, 2017):');

            if (!empty($this->input->keywords)) {
                break;
            } else {
                $this->outputter
                    ->say("\n")
                    ->say("That's not enough need at least 1!")
                    ->say("\n\n");
            }
        } while (true);
    }

    /**
     * Run search.
     *
     * @return array
     */
    private function doSearch()
    {
        try {
            $keywords = explode(',', $this->input->keywords);
            return $this->searchEngine->search($keywords, $this->input->limit);
        }
        catch (SearchEngineException $e) {
            $this->outputter
                ->say("\n")
                ->say('Aw, Snap!')
                ->say("\n")
                ->say($e->getMessage())
                ->say("\n\n")
                ->say("Goodbye!")
                ->say("\n\n");
            exit;
        }
    }

    /**
     * Print search results.
     *
     * @param SearchResult $results
     */
    private function printResults(SearchResult $result)
    {
        if ($result->getTotalHits() < 1) {
            $this->outputter
                ->say("\n")
                ->say("\n#######################################################\n")
                ->say("            Sorry, couldn't whip anything!")
                ->say("\n")
                ->say("                   No results found!")
                ->say("\n#######################################################\n")
                ->say("\n\n");
            return;
        }

        $this->outputter
            ->say("\n")
            ->say("\n#######################################################\n")
            ->say('        Woot woot! Found a total of ' . $result->getTotalHits() . ' result(s)!')
            ->say("\n")
            ->say('    But you asked for ' . $this->input->limit . ", and that's all you get!")
            ->say("\n#######################################################\n")
            ->say("\n\n");

        foreach ($result->getResults() as $k => $row) {
            $this->outputter
                ->say('#' . ($k + 1) . "\n")
                ->say("\tURL: {$row['url']}\n")
                ->say("\tWidth: {$row['width']}\n")
                ->say("\tHeight: {$row['height']}\n");
        }

        $this->outputter->say("\n\n");
    }
}
