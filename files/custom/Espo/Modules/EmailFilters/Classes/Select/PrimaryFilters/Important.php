<?php

namespace Espo\Modules\EmailFilters\Classes\Select\PrimaryFilters;

use Espo\Core\Select\Primary\Filter;
use Espo\ORM\Query\SelectBuilder;
use Espo\Classes\Select\Email\Helpers\JoinHelper;
use Espo\Entities\Email;
use Espo\Entities\User;

class Important implements Filter
{
    private User $user;
    private JoinHelper $joinHelper;

    public function __construct(User $user, JoinHelper $joinHelper)
    {
        $this->user = $user;
        $this->joinHelper = $joinHelper;
    }

    public function apply(SelectBuilder $queryBuilder): void
    {
        $this->joinHelper->joinEmailUser($queryBuilder, $this->user->getId());
        
        $queryBuilder->where([
            Email::ALIAS_INBOX . '.isImportant' => true,
        ]);
    }
}