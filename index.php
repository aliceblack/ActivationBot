<?php

echo "Hi! This is a bot for Telegram!";

$botToken=getenv('BOT_TOKEN');
$website="https://api.telegram.org/bot".$botToken;
$update=file_get_contents("php://input");
$update=json_decode($update, TRUE);
$chatId=$update["message"]["chat"]["id"];
$name=$update["message"]["chat"]["first_name"];
$text=$update["message"]["text"];

$appToken = getenv('APP_TOKEN');

if(strpos($text,'reply')!==false){
	file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=hi there");
}

if(strpos($text,'/activate')!==false){
	file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=i am awake");
}

if(strpos($text,'$appToken')!==false){
	file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=token is correct");
}


$channelUserName="@activationchanneltest";

if(strpos($text,'/writechannel')!==false){
	file_get_contents($website."/sendmessage?chat_id=".$channelUserName."&text=speaking to the masses");
}
