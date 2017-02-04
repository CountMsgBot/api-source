<?php
/**
 * Created by @OnyxTM.
 * User: Morteza Bagher Telegram id : @mench
 * GitHub Url: https://github.com/onyxtm
 * Channel : @phpbots , @ch_jockdoni , @ch_pm , @onyxtm
 * Date: 11/12/2016
 * Time: 09:19 PM
 */

$token = $_GET["token"];
$admin = $_GET["admin"];
$startbot = $_GET["start"];

$tokeen = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getMe"));

if (empty($admin) || empty($startbot)) {
    if (empty($admin)) {
        $av0 = array("ok" => false, 'result' => array('error' => "Admin Id is empty"));
        echo json_encode($av0);
    } elseif (empty($startbot)) {
        $av3 = array("ok" => false, 'result' => array('error' => "Start Text is empty"));
        echo json_encode($av3);
    } else {
        $av4 = array("ok" => false, 'result' => array('error' => "Admin Id and Start Text is empty"));
        echo json_encode($av4);
    }
} else {
    if ($tokeen->ok == true) {
        $user = $tokeen->result->username;
        $id = $tokeen->result->id;
//    $startbot = "ÓáÇã ÏæÓÊ ãä Èå ÑÈÇÊ Óíä ÓÇÒ ÎæÔ ÇæãÏíÏ íÇãÊ Ñæ ÈÝÑÓ ÊÇ Óíä ÏÇÑÔ ˜äã." ;
        if (!is_dir("bot/$id")) {
            mkdir("bot/$id");
            file_put_contents("bot/$id/channel.txt", "");
            file_put_contents("bot/$id/start.txt", $startbot);
            file_put_contents("bot/$id/bool.txt", "false#-!false#-!false");
            file_put_contents("bot/$id/token.txt", "$token");
            file_put_contents("bot/$id/admin.txt", "$admin");
            file_put_contents("bot/$id/step.txt", "NULL");
            file_put_contents("bot/$id/Member.txt", "$admin\n");
            $bot = file_get_contents("bot.txt");
            file_put_contents("bot/$id/index.php", "$bot");
            $av = array("ok" => true, 'result' => array('tag' => 'new', 'token' => $token, 'username' => $tokeen->result->username, 'first_name' => $tokeen->result->first_name, 'last_name' => $tokeen->result->last_name, 'admin' => $admin));
            echo json_encode($av);
//        echo "ÑÈÇÊ ÔãÇ ËÈÊ ÔÏ.
//            @" . $tokeen->result->username . "
//            ÈÑÇí ÏÑíÇÝÊ ÑÇåäãÇ æ ÊäÙíã ãÊä ÔÑæÚ æ ÂíÏí ˜ÇäÇá ÏÑ ÑÈÇÊ ÎæÏ ÏÓÊæÑ /help ÑÇ ÇÑÓÇá ˜äíÏ ??";
//        $t = "ÑÈÇÊ ÔãÇ Èå @COUNTMSGBOT ãÊÕá ÔÏ
//            ÈÑÇí ÏÑíÇÝÊ ÑÇåäãÇ ÏÓÊæÑ /help ÑÇ ÇÑÓÇá ˜äíÏ";
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$admin&text=$t");
            file_get_contents("https://api.telegram.org/bot$token/setWebHook?url=https://binaam.000webhostapp.com/bot/countbot/bot/$id/index.php");
        } else {
            $bot12 = file_get_contents("bot.txt");
            file_put_contents("bot/$id/index.php", $bot12);
            file_put_contents("bot/$id/step.txt", "NULL");
            file_put_contents("bot/$id/token.txt", "$token");
            file_put_contents("bot/$id/start.txt", "$startbot");
            file_put_contents("bot/$id/admin.txt", "$admin");

            $av111 = array("ok" => true, 'result' => array('tag' => 'update', 'token' => $token, 'username' => $tokeen->result->username, 'first_name' => $tokeen->result->first_name, 'last_name' => $tokeen->result->last_name, 'admin' => $admin));
            echo json_encode($av111);

//            echo "ÑÈÇÊ ÈÑæÒ ÔÏ
//                @" . $tokeen->result->username;
            file_get_contents("https://api.telegram.org/bot$token/setWebHook?url=https://binaam.000webhostapp.com/bot/countbot/bot/$id/index.php");
        }
    } else {
        $av2 = array("ok" => false, 'result' => array('error' => "Token Not Found"));
        echo json_encode($av2);
    }
}
?>



