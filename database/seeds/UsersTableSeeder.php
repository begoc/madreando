<?php


use App\Services\Registrar;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * @var Registrar
     */
    private $registrar;

    public function __construct(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    public function run()
    {
        $users = [
            [
                'name' => 'Ana',
                'email' => 'admin@madreando.net',
                'password' => 'madreando',
                'password_confirmation' => 'madreando'
            ]
        ];

        foreach ($users as $user) {
            $this->registrar->create($user);
        }
    }
}
