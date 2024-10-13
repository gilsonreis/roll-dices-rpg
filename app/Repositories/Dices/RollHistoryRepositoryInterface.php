<?php

namespace App\Repositories\Dices;

use App\Models\RollHistory;

interface RollHistoryRepositoryInterface
{
    public function save(array $data): RollHistory;

    public function getRecentRolls();
}
