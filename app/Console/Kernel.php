protected $commands = [
    \App\Console\Commands\UpdateProductQuantity::class,
];

protected function schedule(Schedule $schedule)
{
    $schedule->command('product:delete-low-quantity')->mondays()->at('00:00');
}