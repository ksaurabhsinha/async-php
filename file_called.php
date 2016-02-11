<?php
/**
 * @purpose: This is the file which is called asynchronously from the file usage.php
 * @author: Kumar Saurabh Sinha
 * @date: 2/11/2016
 * @time: 3:15 PM
 *
 *
 */

$postArray = json_decode($_POST['postValue'], true);
var_dump($postArray);