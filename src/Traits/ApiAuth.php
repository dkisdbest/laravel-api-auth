<?php

namespace Bitfumes\ApiAuth\Traits;

trait ApiAuth
{
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $verify = app()['config']['api-auth.notifications.verify'];
        $this->notify(new $verify());
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $reset_notification = app()['config']['api-auth.notifications.reset'];
        $this->notify(new $reset_notification($token));
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
