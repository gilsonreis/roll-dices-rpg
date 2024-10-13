<?php

namespace App\Livewire\Dices;

use App\DTO\RollHistoryDTO;
use App\UseCases\Dices\GetRecentRollsDiceUseCase;
use App\UseCases\Dices\RollDiceUseCase;
use App\UseCases\Dices\SaveRollDiceUseCase;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DashboardRollDiceComponent extends Component
{
    use LivewireAlert;

    public $roll;
    public $rolledNumbers = [];

    public function mount(GetRecentRollsDiceUseCase $getRecentRollsDice)
    {
        $this->rolledNumbers = $getRecentRollsDice->handle();
    }


    public function render()
    {
        return view('livewire.dices.dashboard-roll-dice-component');
    }

    public function rollDice(RollDiceUseCase $rollDiceUseCase, SaveRollDiceUseCase $saveRollDiceUseCase)
    {
        try {
            $result = $rollDiceUseCase->handle($this->roll);
            $result['user_name'] = Auth::user()->name;
            $this->rolledNumbers[] = $result;

            $rollHistoryDto = new RollHistoryDto(
                user_id: Auth::id(),
                roll: $this->roll,
                result_dices: $result['rolls'],
                result: $result['total'],
                modifier: $result['modifier'],
            );
            $saveRollDiceUseCase->handle($rollHistoryDto);
            $this->roll = null;
        }catch (\Exception $exception){
            $this->alert('error', $exception->getMessage());
        }
    }
}
