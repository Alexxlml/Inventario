<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\VisitSession;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;

class JetstreamServiceProvider extends ServiceProvider
{
    public $user, $user_agent;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $this->user_agent = $request->header('User-Agent');

            $this->user = User::where('email', $request->login)
                ->orWhere('username', $request->login)
                ->where('access', 1)
                ->first();

            if (
                $this->user &&
                Hash::check($request->password, $this->user->password)
            ) {
                $this->insertSession($this->user, $this->user_agent);
                return $this->user;
            }
        });
    }

    public function insertSession($user, $user_agent)
    {
        $p = VisitSession::where('created_at', Carbon::now())->where('user_id', $user->id)->get();
        if (count($p) > 0) {
            
        } else {
            VisitSession::Create(
                [
                    'user_id' => $user->id,
                    'user_agent' => $user_agent,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
