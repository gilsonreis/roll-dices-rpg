<?php

namespace App\UseCases\Dices;

use App\Repositories\Dices\RollHistoryRepositoryInterface;
use Carbon\Carbon;

class GetLastDiceRolledByUserId
{
    public function __construct(private readonly RollHistoryRepositoryInterface $rollHistoryRepository)
    {
    }

    public function handle(int $userId)
    {
        $result = $this->rollHistoryRepository->getLastDiceRolledByUserId($userId);

        return [
            'user_name' => $result['user']['name'],
            'roll' => $result['roll'],
            'created_at' => Carbon::parse($result['created_at'])->timezone('America/Sao_Paulo')->format('H:i:s d/m/Y'),
            'rolls' => $result['result_dices'],
            'modifier' => $result['modifier'],
            'total' => $result['result'],
        ];
    }
}
