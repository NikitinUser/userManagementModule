<?php

namespace NikitinUser\UserManagementModule\Lib\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use NikitinUser\UserManagementModule\Lib\Models\RolesForUser;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-admin {id_user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        try {
            $idUser = $this->argument('id_user');

            RolesForUser::create([
                'id_role' => 1,
                'id_user' => $idUser
            ]);
        } catch (\Throwable $t) {
            Log::error(json_encode($t->getTrace()));
            echo $t->getMessage();
        }
    }
}
