<?php

namespace Slicvic\Whip\Cli\Input;

use Slicvic\Whip\Cli\Output\OutputInterface;
use Slicvic\Whip\Cli\Output\Output;

/**
 * Class to read console input.
 */
class Input implements InputInterface
{
    /**
     * @var OutputInterface
     */
    protected $outputter;

    /**
     * @param OutputInterface $outputter
     */
    public function __construct(OutputInterface $outputter = null)
    {
        $this->outputter = ($outputter) ?: new Output;
    }

    /**
     * {@inheritdoc}
     */
    public function ask(string $question)
    {
        $this->outputter->say($question . ' ');
        return trim(fgets(STDIN));
    }
}
