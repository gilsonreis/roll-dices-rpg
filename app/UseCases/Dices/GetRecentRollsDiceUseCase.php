<?php

namespace App\UseCases\Dices;

use App\Repositories\Dices\RollHistoryRepositoryInterface;
use Carbon\Carbon;

class GetRecentRollsDiceUseCase
{
    public function __construct(private readonly RollHistoryRepositoryInterface $rollHistoryRepository)
    {
    }

    public function handle()
    {
        $results = $this->rollHistoryRepository->getRecentRolls();

        $rolls = [];
        foreach ($results as $result) {
            $rolls[] = [
                'user_name' => $result['user']['name'],
                'roll' => $result['roll'],
                'created_at' => Carbon::parse($result['created_at'])->timezone('America/Sao_Paulo')->format('H:i:s d/m/Y'),
                'rolls' => $result['result_dices'],
                'modifier' => $result['modifier'],
                'total' => $result['result'],
            ];
        }
        return $rolls;
    }
}
