<?php
$access_token = '413098026:AAF3qTwi1odJ2JL8I2YA1POmlmYvd4UnRno';
$api = 'https://api.telegram.org/bot' . $access_token;
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
$message = $output['message']['text'];
//
$array_zavtrak = array("Овсянка, Сэр","Бутербродик с маслом","Въеби кошачий корм","Хватит жрать","Седня не ешь","Яйца вкрутую","Яишница","Хлеб с колбаской","Плавленный сыр с хлебом","Манная каша","Молочная рисовая каша");
$array_obed = array("Макарошки с котлеткой","Пюрешка с котлеткой","Щи","Борщ","Шаурма","Пюрешка с сосисками","Ничего","Жаренная картоха","Пицца","Шаурма","Курочка в духовка с картошкой","Картошка по французски","Рыбный суп");
$array_uzin = array("После шести нельзя","Вчерашний борщ","Кефирчик с булочкой","Вареные яйца","Шаурма","Доедаем обед","Чаёк с конфетками","Тушеные рёбрышки","Жареная рыбка");
$timeToZratZavtrak = array_rand($array_zavtrak,1);
$timeToZratObed = array_rand($array_obed,1);
$timeToZratZavtrakUzin = array_rand($array_uzin,1);
//
//$message = mb_strtolower($message,'UTF-8');
switch($message) {
    case 'ужин':
        sendMessage($chat_id, $array_uzin[$timeToZratZavtrakUzin]);
        break;
    case '/ужин':
        sendMessage($chat_id, $array_uzin[$timeToZratZavtrakUzin]);
        break;
    case 'Ужин':
        sendMessage($chat_id, $array_uzin[$timeToZratZavtrakUzin]);
        break;
    case 'обед':
        sendMessage($chat_id, $array_obed[$timeToZratObed]);
        break;
    case 'Обед':
        sendMessage($chat_id, $array_obed[$timeToZratObed]);
        break;
    case '/обед':
        sendMessage($chat_id, $array_obed[$timeToZratObed]);
        break;
    case 'завтрак':
        sendMessage($chat_id, $array_zavtrak[$timeToZratZavtrak]);
        break;
    case 'Завтрак':
        sendMessage($chat_id, $array_zavtrak[$timeToZratZavtrak]);
        break;
    case '/завтрак':
        sendMessage($chat_id, $array_zavtrak[$timeToZratZavtrak]);
        break;
    case 'help':
        sendMessage($chat_id, "Для работы с ботом используйте команды /завтрак, /обед или /ужин либо аналогичные команды без символа / для генерирования блюда. Чтобы снова просмотреть подсказку работают команды - help и /help");
        break;
    case '/help':
        sendMessage($chat_id, "Для работы с ботом используйте команды /завтрак, /обед или /ужин либо аналогичные команды без символа / для генерирования блюда. Чтобы снова просмотреть подсказку работают команды - help и /help");
        break;
    case '/start':
        sendMessage($chat_id, "Приветствуем в помощнике выбора еды ЧоПожрать! Для работы с ботом используйте команды /завтрак, /обед или /ужин либо аналогичные команды без символа / для генерирования блюда. Чтобы снова просмотреть подсказку работают команды - help и /help");
        break;
    default:
        sendMessage($chat_id, "Проверьте список команд /help.  Или скушайте печеньку)");
        break;
}
function sendMessage($chat_id, $message) {
    file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));
}
?>