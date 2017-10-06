<?php

namespace Slicvic\Whip\Cli\Output;

/**
 * Class to write command line output.
 */
class Output implements OutputInterface
{
    /**
     * {inheritdoc}
     */
    public function say(string $message)
    {
        fwrite(STDOUT, $message);
        return $this;
    }
}
