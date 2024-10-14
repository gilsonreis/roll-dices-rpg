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
        return RollHistory::query()->where('created_at', '>=', Carbon::now()->subDay())
            ->with('user')
            ->orderBy('created_at')
            ->get()?->toArray();
    }

    public function GetLastDiceRolledByUserId($userId)
    {
        return RollHistory::query()->where('user_id', $userId)
            ->with('user')
            ->orderBy('roll_histories.created_at', 'desc')
            ?->first()
            ?->toArray();
    }
}
