<?php
@$bIp = gethostbyname($_ENV['COMPUTERNAME']); //获取本机的局域网IP
echo "本机IP：",$bIp,"\n";

if(getenv('HTTP_CLIENT_IP')){

    $onlineip = getenv('HTTP_CLIENT_IP');
    
    }
    
    elseif(getenv('HTTP_X_FORWARDED_FOR')){
    
    $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    
    }
    
    elseif(getenv('REMOTE_ADDR')){
    
    $onlineip = getenv('REMOTE_ADDR');
    
    }
    
    else{
    
    $onlineip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
    
    }
    
    echo $onlineip;

function get_user_addr(){
    $user_ip = '192.168.234.1';
    $url = "https://api.map.baidu.com/location/ip?ak=kdB5IHPH0UrFFXOmH1k5OdSuSFzrzNAC&ip=$".$user_ip."&coor=bd09ll";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    if(curl_errno($ch)) {
        echo 'CURL ERROR Code: '.curl_errno($ch).', reason: '.curl_error($ch);
    }
    curl_close($ch);
    $info = json_decode($output, true);
    if($info['status'] == "0"){
        $addr_info = $info['content']['address_detail']['province'].' '.$info['content']['address_detail']['city'];
    }

    return $addr_info;
}
$res = get_user_addr();
?>
