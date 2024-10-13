import './bootstrap';

Livewire.on('updated', () => {
    let rolledNumbersCount = document.getElementById('rolled-numbers-count').value;

    let lastRoll = document.getElementById(`roll-${rolledNumbersCount - 1}`);
    if (lastRoll) {
        lastRoll.scrollIntoView({ behavior: 'smooth' });
    }
});
