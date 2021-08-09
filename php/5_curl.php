<?php

function m_curl(){
    
$filesize = $_FILES['file']['size'];
if ($filedata != '')
{
    $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
    $postfields = array("filedata" => "@$filedata", "filename" => $filename);
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => true,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_INFILESIZE => $filesize,
        CURLOPT_RETURNTRANSFER => true
    ); // cURL options
    curl_setopt_array($ch, $options);
    curl_exec($ch);
    if(!curl_errno($ch))
    {
        $info = curl_getinfo($ch);
        if ($info['http_code'] == 200)
            $errmsg = "File uploaded successfully";
    }
    else
    {
        $errmsg = curl_error($ch);
    }
    curl_close($ch);
}
else
{
    $errmsg = "Please select the file";
}

}


$nmm;
        $tesbs;
$testkk;
?>

<form action="" method="POST"><input type="file" name="mani_image" id="">
</form>