<?php

namespace App\UseCases\Dices;

use App\DTO\RollHistoryDTO;
use App\Models\RollHistory;
use App\Repositories\Dices\RollHistoryRepositoryInterface;

class SaveRollDiceUseCase
{
    public function __construct(
        private RollHistoryRepositoryInterface $rollHistoryRepository
    ) {}

    public function handle(RollHistoryDTO $dto): RollHistory
    {
        $data = $dto->toArray();
        return $this->rollHistoryRepository->save($data);
    }
}
