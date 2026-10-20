<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateAdmin extends Command
{
    protected $signature = 'app:create-admin';

    protected $description = 'Buat admin baru atau promosikan akun yang sudah ada secara interaktif';

    public function handle(): int
    {
        if (! $this->input->isInteractive()) {
            $this->error('Perintah ini memerlukan terminal interaktif.');

            return self::FAILURE;
        }

        $email = Str::lower(trim((string) $this->ask('Email akun admin')));
        $validation = Validator::make(['email' => $email], ['email' => 'required|email|max:255']);
        if ($validation->fails()) {
            $this->error(implode(PHP_EOL, $validation->errors()->all()));

            return self::FAILURE;
        }

        $user = User::where('email', $email)->first();
        if ($user) {
            if ($user->is_admin) {
                $this->info('Akun sudah memiliki akses admin.');

                return self::SUCCESS;
            }
            if (! $this->confirm('Akun sudah ada. Berikan akses admin kepada akun ini?', false)) {
                $this->info('Promosi dibatalkan.');

                return self::SUCCESS;
            }

            $user->forceFill(['is_admin' => true])->save();
            $this->info('Akses admin diberikan. Password akun tidak diubah.');

            return self::SUCCESS;
        }

        $name = trim((string) $this->ask('Nama admin'));
        $password = $this->secret('Password admin (minimal 12 karakter)', false);
        $confirmation = $this->secret('Ulangi password admin', false);
        $validation = Validator::make([
            'name' => $name,
            'password' => $password,
            'password_confirmation' => $confirmation,
        ], [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:12|confirmed',
        ]);
        if ($validation->fails()) {
            $this->error(implode(PHP_EOL, $validation->errors()->all()));

            return self::FAILURE;
        }

        (new User)->forceFill([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ])->save();

        $this->info('Akun admin dibuat.');

        return self::SUCCESS;
    }
}
