<?php

namespace App\DTO;

readonly class RollHistoryDTO
{
    public function __construct(
        public int    $user_id,
        public string $roll,
        public array  $result_dices,
        public int    $result,
        public int    $modifier,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'result' => $this->result,
            'roll' => $this->roll,
            'modifier' => $this->modifier,
            'result_dices' => $this->result_dices,
        ];
    }
}
