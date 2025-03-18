protected $listen = [
    \App\Events\ProductCreated::class => [
        \App\Listeners\SendProductCreatedEmail::class,
    ],
];