<?php

require '../sms/twilio/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 29-Dec-17
 * Time: 2:13 PM
 */

class SMS
{

    protected static $sid;
    protected static $token;
    protected static $client;
    protected static $phoneNumber;

    // default constructor
    function __construct(){
        self::$sid = 'AC2dd8510e1050de86a5e2401fbb4247fc';
        self::$token = '3097178934fd53ce73af0d332611db8b';
        self::$client = new Client(self::$sid, self::$token);
        self::$phoneNumber = '+19792436762';
    }

    // send the sms to the driver
    function sendSMSToDriver($phone_number,$bin_id,$location,$description){
        try{
            $contactno1=substr($phone_number,1,9);
            $contactno2='+94'.$contactno1;
            $msg_body = "Please check the follwing bin. Bin No: ".$bin_id.", Location: ".$location.", ".$description;
            self::$client->messages->create(
            // the number you'd like to send the message to
                $contactno2,
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => self::$phoneNumber,
                    // the body of the text message you'd like to send
                    'body' => $msg_body,
                    'statusCallback' => "https://requestb.in/17orvht1"
                )
            );

            /*$result = file_get_contents('https://requestb.in/17orvht1');

            if ($result=="ok"){
                echo "<h4>SMS has been sent successfully.</h4>";
            }
            else{
                echo "<h4>SMS NOT sent</h4>";
            }*/
            return 1;

        }
        catch (Exception $e){
            echo $e;
        }

    }
}