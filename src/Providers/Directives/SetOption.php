<?php

namespace Therour\SbAdmin2\Providers\Directives;

class SetOption
{
    /**
     * Set an option into \Therour\SbAdmin2\SbOptions singleton.
     *
     * @param string $expression
     * @return string
     */
    public function __invoke($expression)
    {
        return '<?php if (isset($sbOptions)) { $sbOptions->set('.$expression.'); } ?>';
    }
}