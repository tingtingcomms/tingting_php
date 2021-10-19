<?php

//to send sms
//to: the phone number of receiver, to send sms to multiple receivers at once, you can seperate phone numbers by comma, ie: 8497xxxxxxx,8490xxxxxxx
//content: the sms content
//sender: the pre-registered brandname

function sendSMS($to, $content, $sender) {
    $api = new TingtingAPI('your api key');
    $api->sendSMS($to, $sender, $content);
}

//to make auto call
//to: the phone number of receiver, to send sms to multiple receivers at once, you can seperate phone numbers by comma, ie: 8497xxxxxxx,8490xxxxxxx
//content: the content, tingting will convert the text content to voice by using text to speech
//sender: the pre-registered caller phone number

function call($to, $content, $sender) {
    $api = new TingtingAPI('your api key');
    $api->call($to, $sender, $content);
}