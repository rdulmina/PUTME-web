<?php require_once '../model/Driver.php' ?>
<?php require_once '../model/SMS.php' ?>

<?php


// check whether reg id is not empty
if (isset($_POST["driver_id"]) AND isset($_POST["req_id"])){

    $driver = new Driver();
    $number = $driver->getDriverNumber($_POST["driver_id"]);
    //initializer($number,$_POST["bin_id"],$_POST["location"],$_POST["description"]);
    $result =$driver -> updateStatus($_POST["driver_id"],$_POST["req_id"]);
    if ($result){
        $sms = new SMS();
        $status = $sms -> sendSMSToDriver($number,$_POST["bin_id"],$_POST["location"],$_POST["description"]);
        if ($status){
            echo json_encode("<h4>Successfully Assigned <br> SMS Sent Successfully</h4>");
        }
        else{
            echo json_encode("<h4>Successfully Assigned <br> SMS Not Sent</h4>");
        }

    }
    else{
        echo json_encode("<h4>Failed to Assign</h4>");
    }
}

//function initializer($number,$bin,$location,$description)
//{
//    $username = 'KushalNaresh';
//    $password = 'kush@123';
//    $url = 'https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';
//    $contactno1=substr($number,1,9);
//    $contactno2='+94'.$contactno1;
//    $unicode_msg = "Bin : ".$bin." Location : ".$location." Description : ".$description;
//    $post_body = unicode_sms( $username, $password, $unicode_msg, $contactno2 );
//    $result = send_message( $post_body, $url );
//}
//
//function unicode_sms ( $username, $password, $message, $msisdn ) {
//    $post_fields = array (
//        'username' => $username,
//        'password' => $password,
//        'message'  => string_to_utf16_hex( $message ),
//        'msisdn'   => $msisdn,
//        'dca'      => '16bit'
//    );
//
//    return make_post_body($post_fields);
//}
//
//function string_to_utf16_hex( $string ) {
//    return bin2hex(mb_convert_encoding($string, "UTF-16", "UTF-8"));
//}
//
//function make_post_body($post_fields) {
//    $stop_dup_id = make_stop_dup_id();
//    if ($stop_dup_id > 0) {
//        $post_fields['stop_dup_id'] = make_stop_dup_id();
//    }
//    $post_body = '';
//    foreach( $post_fields as $key => $value ) {
//        $post_body .= urlencode( $key ).'='.urlencode( $value ).'&';
//    }
//    $post_body = rtrim( $post_body,'&' );
//
//    return $post_body;
//}
//
//function make_stop_dup_id() {
//    return 0;
//}
//
//function send_message ( $post_body, $url ) {
//    /*
//    * Do not supply $post_fields directly as an argument to CURLOPT_POSTFIELDS,
//    * despite what the PHP documentation suggests: cUrl will turn it into in a
//    * multipart formpost, which is not supported:
//    */
//
//    $ch = curl_init( );
//    curl_setopt ( $ch, CURLOPT_URL, $url );
//    curl_setopt ( $ch, CURLOPT_POST, 1 );
//    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
//    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
//    // Allowing cUrl funtions 20 second to execute
//    curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
//    // Waiting 20 seconds while trying to connect
//    curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
//
//    $response_string = curl_exec( $ch );
//    $curl_info = curl_getinfo( $ch );
//
//    $sms_result = array();
//    $sms_result['success'] = 0;
//    $sms_result['details'] = '';
//    $sms_result['transient_error'] = 0;
//    $sms_result['http_status_code'] = $curl_info['http_code'];
//    $sms_result['api_status_code'] = '';
//    $sms_result['api_message'] = '';
//    $sms_result['api_batch_id'] = '';
//
//    if ( $response_string == FALSE ) {
//        $sms_result['details'] .= "cURL error: " . curl_error( $ch ) . "\n";
//    } elseif ( $curl_info[ 'http_code' ] != 200 ) {
//        $sms_result['transient_error'] = 1;
//        $sms_result['details'] .= "Error: non-200 HTTP status code: " . $curl_info[ 'http_code' ] . "\n";
//    }
//    else {
//        $sms_result['details'] .= "Response from server: $response_string\n";
//        $api_result = explode( '|', $response_string );
//        $status_code = $api_result[0];
//        $sms_result['api_status_code'] = $status_code;
//        $sms_result['api_message'] = $api_result[1];
//        if ( count( $api_result ) != 3 ) {
//            $sms_result['details'] .= "Error: could not parse valid return data from server.\n" . count( $api_result );
//        } else {
//            if ($status_code == '0') {
//                $sms_result['success'] = 1;
//                $sms_result['api_batch_id'] = $api_result[2];
//                $sms_result['details'] .= "Message sent - batch ID $api_result[2]\n";
//            }
//            else if ($status_code == '1') {
//                # Success: scheduled for later sending.
//                $sms_result['success'] = 1;
//                $sms_result['api_batch_id'] = $api_result[2];
//            }
//            else {
//                $sms_result['details'] .= "Error sending: status code [$api_result[0]] description [$api_result[1]]\n";
//            }
//
//
//
//
//
//        }
//    }
//    curl_close( $ch );
//
//    return $sms_result;
//}
?>