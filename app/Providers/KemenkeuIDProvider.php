<?php

namespace App\Providers;

use config;
use Laravel\Socialite\Two\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;

class KemenkeuIDProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopes = ['openid profile profil.hris jabatan.hris organisasi.hris'];

    /**
     * Get the authentication URL for the provider.
     *
     * @param  string  $state
     * @return string
     */
    protected function getAuthUrl($state)
    {
        $url = $this->buildAuthUrlFromBase($this->getOpenIdConfig('authorization_endpoint'), $state);
        Log::info('Auth URL: ' . $url); // Logging auth URL
        return $url;
    }

    /**
     * Get the token URL for the provider.
     *
     * @return string
     */
    protected function getTokenUrl()
    {
        $url = $this->getOpenIdConfig('token_endpoint');
        Log::info('Token URL: ' . $url); // Logging token URL
        return $url;
    }

    /**
     * Get the user information by token.
     *
     * @param  string  $token
     * @return array
     */
    protected function getUserByToken($token)
    {
        Log::info('Getting user by token: ' . $token); // Logging token
        try {
            $response = $this->getHttpClient()->get($this->getOpenIdConfig('userinfo_endpoint'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $user = json_decode($response->getBody()->getContents(), true);
            Log::info('User Info: ' . json_encode($user)); // Logging user info
            return $user;
        } catch (\Exception $e) {
            Log::error('Error getting user by token: ' . $e->getMessage()); // Logging error
            throw $e;
        }
    }

    /**
     * Map the raw user array to a Socialite User instance.
     *
     * @param  array  $user
     * @return \Laravel\Socialite\Two\User
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }

    /**
     * Get the OpenID Connect configuration.
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getOpenIdConfig($key)
    {
        static $config;

        if (!$config) {
            $response = $this->getHttpClient()->get(config('services.kemenkeuid.provider_url') . '/.well-known/openid-configuration');
            $config = json_decode($response->getBody()->getContents(), true);
            Log::info('OpenID Configuration: ' . json_encode($config)); // Logging OpenID config
        }

        return $config[$key];
    }

    /**
     * Log the user out of the OpenID Connect provider.
     *
     * @param  string  $idToken
     * @return string
     */
    public function logout($idToken)
    {
        $logoutUrl = $this->getOpenIdConfig('end_session_endpoint') . '?id_token_hint=' . $idToken . '&post_logout_redirect_uri=' . urlencode(config('services.kemenkeuid.logout_redirect'));
        return $logoutUrl;
    }
}