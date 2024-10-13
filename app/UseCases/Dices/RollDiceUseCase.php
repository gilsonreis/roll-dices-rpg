<?php

namespace App\UseCases\Dices;

use Carbon\Carbon;

class RollDiceUseCase
{
    public function handle(?string $roll = null): ?array
    {
        if ($roll === null) {
            return null;
        }

        if (!preg_match('/(\d+)D(\d+)([+-]\d+)?/i', $roll, $matches)) {
            throw new \InvalidArgumentException('Formato inválido. Use XDY ou XDY+Z, exemplo: 3D20+5.', 422);
        }

        $numDice = (int)$matches[1];
        $numSides = (int)$matches[2];
        $modifier = isset($matches[3]) ? (int)$matches[3] : 0;

        if (!in_array($numSides, [4, 6, 8, 10, 12, 20, 100])) {
            throw new \InvalidArgumentException('Não existe dados de ' . $numSides . ' lados.', 422);
        }

        $rolls = [];
        for ($i = 0; $i < $numDice; $i++) {
            $rolls[] = rand(1, $numSides);
        }

        $total = array_sum($rolls) + $modifier;

        return [
            'roll' => $roll,
            'rolls' => $rolls,
            'modifier' => $modifier,
            'total' => $total,
            'created_at' => Carbon::now()->timezone('America/Sao_Paulo')->format('H:i:s d/m/Y'),
        ];
    }
}
