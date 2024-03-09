<?php

namespace Fluffici\SDK\Geo\Partials;

class PartialMatcher
{
    private bool $matching;

    /**
     * Class constructor.
     *
     * @param bool $matching The matching flag.
     *
     * @return void
     */
    public function __construct(bool $matching)
    {
        $this->matching = $matching;
    }

    /**
     * Get the matching flag.
     *
     * @return bool The matching flag.
     */
    public function isMatching(): bool
    {
        return $this->matching;
    }
}
