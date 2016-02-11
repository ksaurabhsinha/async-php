<?php
/**
 * @purpose: This is a small demonstration of calling a php file in an async manner on server-side
 * @author: Kumar Saurabh Sinha
 * @date: 2/11/2016
 * @time: 2:18 PM
 *
 * Required Parameters
 * $protocol - This defines the Schema for the call http|https
 * $host - This defines the host to which the call would be made. Ideally this would be localhost
 * $port - This would depend on the protocol/schema being used. 80|443
 * $path - This defines the file path on the host which needs to be called
 * $postData - This defines the POST Data to be sent, if required!
 * $header - Although by default we get the HTTP_USER_AGENTS but sometimes there can be a problem fetching the same.
 *          So we can pass a custom USER_AGENT info.
 *
 *
 */


/**
 * @param $protocol
 * @param $host
 * @param $port
 * @param $path
 * @param $postData
 * @param string $header
 * @return bool
 */
function post_async_using_post($protocol, $host, $port, $path, $postData, $header = '')
{

    $headerAgent = $_SERVER['HTTP_USER_AGENT'];
    if($header != '') {
        $headerAgent = $header;
    }
    if ($fp = fsockopen("{$protocol}{$host}", $port, $errno, $errstr, 30))
    {
        $msg  = "POST {$path} HTTP/1.1\r\n";
        $msg .= "Host: {$host}\r\n";
        $msg .= "User-Agent: " . "$headerAgent" . "\r\n";
        $msg .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $msg .= "Content-length: " . strlen($postData) . "\r\n";
        $msg .= "Connection: close\r\n\r\n";
        $msg .= $postData . "\r\n\r\n";
        fwrite($fp, $msg);
        fclose($fp);
    }
    else
    {
        return false;
    }
    return true;
}