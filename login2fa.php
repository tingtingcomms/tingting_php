<?php

require_once("TingtingAPI.php");

if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
    echo 'Nothing here';
    die();
}

const CONFIG_ID = 'Verify Configuration ID'; //please change with your verify configuration ID
const APIKEY = 'Your API Key'; //please change with your api key
const PHONE = '8491xx'; //please change with your test phone number

$email = htmlspecialchars_decode($_POST['email']);
$password = htmlspecialchars_decode($_POST['password']);

if ($email == 'test@tingting.im' && $password == '123456abcd') {

    $tingting = new TingtingAPI(APIKEY);
    if (!isset($_POST['msg_id']) || !isset($_POST['pin_code'])) {
        $json = $tingting->session(CONFIG_ID, PHONE);
        echo json_encode(['status' => 'success', 'require_2fa' => true, 'data' => $json]);
        die();
    }
    else if (isset($_POST['msg_id']) && isset($_POST['pin_code'])) {

        $msgId = htmlspecialchars_decode($_POST['msg_id']);
        $pincode = htmlspecialchars_decode($_POST['pin_code']);

        $json = $tingting->verifyPin($msgId,$pincode);
        if ($json['status'] == 'success') {
            if ($json['data']['verified'] == 1) {
                echo json_encode(['status' => 'success', 'require_2fa' => false, 'data' => $json]);
                die();
            }
        }

        echo json_encode(['status' => 'error']);
        die();
    }
}


