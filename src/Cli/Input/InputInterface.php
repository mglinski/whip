<?php

namespace Slicvic\Whip\Cli\Input;

/**
 * Interface to read command line input.
 */
interface InputInterface
{
    /**
     * Prompt the user for input.
     *
     * @param  string $question
     * @return string
     */
    public function ask(string $question);
}
