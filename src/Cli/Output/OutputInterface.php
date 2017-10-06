<?php

namespace Slicvic\Whip\Cli\Output;

/**
 * Interface to write command line output.
 */
interface OutputInterface
{
    /**
     * Write something to the command-line.
     *
     * @param string $message
     * @return self
     */
    public function say(string $message);
}
