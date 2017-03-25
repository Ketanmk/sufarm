<?php

namespace App\Console\Commands;

use App\User;
use App\Utilities\Constants;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application Installer';
    protected $database = [];
    protected $emailSetting = [];
    protected $user = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //.
        $this->call("cach:clear");
        $myfile = '.env';
        if (File::exists($myfile)) {
            File::delete($myfile);
        }
        $this->showWelcomeMessage();
        $this->setPermissions();
        //
        $this->databaseSetup();
        $this->userSetup();
        $this->smtpSetup();
        $this->setupEnvFile();
        $this->triggerMigrations();
        $this->createDefaultUser();
        $this->info('Setup is complete. Welcome to Sunder Farms Dash Board');

    }

    /**
     * Shows the welcome message.
     *
     * @return void
     */
    protected function showWelcomeMessage()
    {
        $this->output->writeln(<<<WELCOME
<fg=white>
*-----------------------------------------------*
|                                               |
|               Device Manager                   |
|               Copyright (c) 2017              |
|                                               |
|                                               |
*-----------------------------------------------*
</fg=white>
WELCOME
        );
    }

    private function setPermissions()
    {

        $output = shell_exec('chmod 777 -R public');
        $output = shell_exec('chmod 777 .env');
        $output = shell_exec('chmod 777 bootstrap/cache');
        $this->info('Folders Permission sets');
    }

    /**
     * Setup the database credentials.
     *
     * @return void
     */
    protected function databaseSetup()
    {
        $this->output->writeln(<<<STEP
<fg=yellow>
*-----------------------------------------------*
|                                               |
|              Configure Database               |
|         This package uses MySQL Only          |
|                                               |
*-----------------------------------------------*
</fg=yellow>
STEP
        );

        $host = $this->anticipate('Please enter the database host',
            ['localhost']);
        $name = $this->anticipate('Please enter the database name',
            ['homestead']);
        $user = $this->anticipate('Please enter the database user',
            ['homestead']);
        $dbport = $this->anticipate('Please enter the database port',
            ['3306']);
        $pass = $this->databaseSetupPassword();

        $headers = [
            'Setting',
            'Value',
        ];

        $data = [
            ['Host', $host],
            ['Name', $name],
            ['User', $user],
            ['Password', $pass],
            ['Port', $dbport],
        ];

        $this->table($headers, $data);

        if (!$this->confirm('Is the database info correct?')) {
            $this->databaseSetup();
        }

        $this->database = [
            'host' => $host,
            'name' => $name,
            'user' => $user,
            'pass' => $pass,
            'dbport' => $dbport,
        ];

        $this->info('Database configuration saved.');
    }

    /**
     * Setup the database credentials password.
     *
     * @return string
     */
    protected function databaseSetupPassword()
    {
        $pass = $this->secret('Please enter the database password');
        $passConfirm = $this->secret('Please confirm the database password');

        if ($pass != $passConfirm) {
            $this->error('[ERROR] Database passwords do not match. Please retry.');
            $this->databaseSetupPassword();
        }

        return $pass;
    }

    protected function userSetup()
    {
        $this->output->writeln(<<<STEP
<fg=yellow>
*-----------------------------------------------*
|                                               |
|            Configure Default User             |
|                                               |
*-----------------------------------------------*
</fg=yellow>
STEP
        );

        $first = $this->ask('Please enter the user name');
        $email = $this->ask('Please enter the user email');
        $pass = $this->userSetupPassword();

        $headers = [
            'Setting',
            'Value'
        ];

        $data = [
            ['User Name', $first],
            ['Email', $email],
            ['Password', $pass],
        ];

        $this->table($headers, $data);

        if (!$this->confirm('Is the user information correct?')) {
            $this->userSetup();
        }

        $this->user = [
            'first' => $first,
            'email' => $email,
            'pass' => $pass,
        ];

        $this->info('User configuration saved.');
    }

    /**
     * Setup the user credentials password.
     *
     * @return string
     */
    protected function userSetupPassword()
    {
        $pass = $this->secret('Please enter the user password');
        $passConfirm = $this->secret('Please confirm the user password');

        if ($pass != $passConfirm) {
            $this->error('[ERROR] Passwords do not match.');
            $this->userSetupPassword();
        }

        return $pass;

    }

    /**
     * Setup ENV file with database credentials.
     *
     * @return void
     */
    protected function setupEnvFile()
    {
        $env = __DIR__ . '/stubs/env.stub';
        $config = array_merge($this->database, $this->emailSetting);
        // Update the env stub file with actual credentials.
        $contents = str_replace(
            array_map(function ($key) {
                return '{{' . $key . '}}';
            }, array_keys($config)),
            array_values($config),
            $this->laravel['files']->get($env)
        );

        // Generate a key
        $contents = str_replace('{{key}}', Str::random(32), $contents);

        // Check if we can actually write the environment file.
        if ($this->laravel['files']->put(($envFile = $this->laravel['path.base'] . '/.env'),
                $contents) === false
        ) {
            throw new \RuntimeException("Could not write env file to [$envFile].");
        }

        // Reload env file
        $this->laravel['Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables']->bootstrap($this->laravel);

        // Reload config
        $this->laravel['Illuminate\Foundation\Bootstrap\LoadConfiguration']->bootstrap($this->laravel);

    }

    /**
     * Setup the database credentials.
     *
     * @return void
     */
    protected function smtpSetup()
    {
        $this->output->writeln(<<<STEP
<fg=yellow>
*-----------------------------------------------*
|                                               |
|              Configure SMTP                   |
|                                               |
*-----------------------------------------------*
</fg=yellow>
STEP
        );

        $host = $this->anticipate('Please enter the Mail  host',
            ['localhost']);
        $port = $this->anticipate('Please enter the Mail Port',
            ['587']);
        $user = $this->anticipate('Please enter the Mail user',
            ['local']);
        $pass = $this->emailSetupPassword();

        $headers = [
            'Setting',
            'Value',
        ];

        $data = [
            ['Host', $host],
            ['Port', $port],
            ['User', $user],
            ['Password', $pass],
        ];

        $this->table($headers, $data);

        if (!$this->confirm('Is the SMTP info correct?')) {
            $this->smtpSetup();
        }

        $this->emailSetting = [
            'emailhost' => $host,
            'emailport' => $port,
            'emailuser' => $user,
            'emailpassword' => $pass,
        ];

        $this->info('Email configuration saved.');
    }

    protected function emailSetupPassword()
    {
        $pass = $this->secret('Please enter the Email password');
        $passConfirm = $this->secret('Please confirm the Email password');

        if ($pass != $passConfirm) {
            $this->error('[ERROR] Email passwords do not match. Please retry.');
            $this->emailSetupPassword();
        }

        return $pass;
    }

    /**
     * Run the migrations to migrate the database.
     *
     * @return void.
     */
    protected function triggerMigrations()
    {
        $this->info('Starting database migrations.');
        $this->call('migrate');
        $this->info('Database migrations finished.');
    }

    protected function createDefaultUser()
    {
        // Get the user configuration data.
        $config = $this->user;

        $credentials = [
            'name' => $config['first'],
            'email' => $config['email'],
            'password' => bcrypt($config['pass']),
        ];

        $user = User::create($credentials);


        $this->info('Default User Created');


    }
}
