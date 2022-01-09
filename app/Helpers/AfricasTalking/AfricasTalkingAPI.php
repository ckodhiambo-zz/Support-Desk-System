<?php


namespace App\Helpers\AfricasTalking;


use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingAPI
{
    /**
    * Guzzle client initialization.
    *
    * @var AfricasTalking
    */
    protected $AT;

    /**
     * AfricasTalking APIs application username.
     *
     * @var string
     */
    protected $username;

    /**
     * AfricasTalking APIs application key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Make the initializations required to make calls to the AT APIs
     * and throw the necessary exception if there are any missing required
     * configurations.
     */
    public function __construct()
    {
        $this->username = env('AT_USERNAME');
        $this->apiKey = env('AT_API_KEY');

        $this->AT = new AfricasTalking($this->username, $this->apiKey);
    }

    public function sms($to, $message, $enqueue = false)
    {
        // Get sms service
        $sms = $this->AT->sms();

        // Use the service
        return $sms->send([
            'to' => $to,
            'message' => $message,
            'enqueue' => $enqueue
        ]);
    }
}
