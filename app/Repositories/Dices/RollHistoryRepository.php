<?php

namespace App\Repositories\Dices;


use App\Models\RollHistory;
use Carbon\Carbon;

class RollHistoryRepository implements RollHistoryRepositoryInterface
{

    public function save(array $data): RollHistory
    {
        return RollHistory::create($data);
    }

    public function getRecentRolls()
    {
        return RollHistory::query()->where('roll_histories.created_at', '>=', Carbon::now()->subDay())
            ->with('user')
            ->orderBy('roll_histories.created_at')
            ->get()?->toArray();
    }
}
