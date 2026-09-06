<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

#[Signature('admin:create')]
#[Description('Create the initial administrator')]
class CreateAdmin extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (User::query()->exists()) {
            $this->error('An administrator already exists.');

            return self::FAILURE;
        }

        $email = $this->ask('Admin e-mail');
        $password = $this->secret('Admin password');
        $passwordConfirmation = $this->secret('Confirm the password');

        $data = [
            'email' => trim(strtolower((string) $email)),
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ];

        $validator = Validator::make($data, [
            'email' => ['required', 'email', 'max:255'],
            'password' => [
                'required',
                'confirmed',
                Password::min(12),
            ],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $validated = $validator->validated();

        User::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $this->info('Administrator created successfully.');

        return self::SUCCESS;
    }
}
