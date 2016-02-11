<?php
/**
 * @purpose: This is a simple demonstration of using the ASYNC function
 * @author: Kumar Saurabh Sinha
 * @date: 2/11/2016
 * @time: 3:00 PM
 *
 *
 */


/** ********* Start: Define the required Parameters ************** */

define('PROTOCOL', 'ssl://');
define('HOST', 'localhost');
define('PORT', '443');

/** ********* End: Define the required Parameters ************** */

$postDataArray = array('key' => 'value',
                        'key_2' => 'value2');

$asyncParamsJSON = json_encode($postDataArray);

post_async_using_post(PROTOCOL, HOST, PORT, 'file_called.php', 'postValue=' . $asyncParamsJSON);