<?php

require __DIR__ . '/vendor/autoload.php';
use Appwrite\Client;
use Appwrite\ID;
use Appwrite\Services\Users;
use Leaf\Blade;

$client = new Client();

$client
    ->setEndpoint('https://cloud.appwrite.io/v1') // Your API Endpoint
    ->setProject('65b336275d9ed03e8743') // Your project ID
    ->setKey('3bfa293723147eb33e372b05c7a0f9c945ec9762cee7e622ad56f04b4e4db631d7eefb16b129625ea9e4c3a4e52f88999a7c674db7804cf4b4ddd99016cb2f66ed16449b35405f75da180c7c467ba5cccf5d12892ca75321d06af20747df8a1ec2cfd5cb18d67f4fa5350fb14d8f359160d018aff5629091932350ec9243e641') // Your secret API key
    ->setSelfSigned() // Use only on dev mode with a self-signed SSL cert
;

$users = new Users($client);

$blade = new Blade('views', 'storage/cache');
$blade->directive('vite', function($expression) {
    list($name, $path) = explode(',', $expression);
    $name = trim($name);
    $path = trim($path);
    return "<?php echo vite($name, $path); ?>";
});

app()->get('/welcome', function() use ($blade) {
    echo $blade->render('welcome', ['name' => 'Taylor']);;
});

app()->post('/clicked', function() {
    echo "You clicked me!";
});

app()->post('/login', function(ID $id, $users) {

    $email = app()->request()->get('email');
    $password = app()->request()->get('password');

    $user = $users->create([
        ID::unique(),
        'email' => $email,
        'password' => $password,
    ]);
});

app()->run();
