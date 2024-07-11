<?php

namespace Espo\Modules\EmailFilters\Classes\Select\PrimaryFilters;

use Espo\Core\Select\Primary\Filter;
use Espo\ORM\Query\SelectBuilder;
use Espo\Entities\Email;

class Important implements Filter
{
    public function apply(SelectBuilder $queryBuilder): void
    {
        $queryBuilder->where([
            Email::ALIAS_INBOX . '.isImportant' => true
        ]);
    }
}
