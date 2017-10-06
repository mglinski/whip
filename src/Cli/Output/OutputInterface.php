<?php

namespace Slicvic\Whip\Cli\Output;

/**
 * Interface to write console output.
 */
interface OutputInterface
{
    /**
     * Write something to the console.
     *
     * @param string $message
     * @return self
     */
    public function say(string $message);
}
