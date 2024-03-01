# Telegram Bot Command - Remove voice and video chat messages

> [!NOTE]
> **For GitHub users!** This is mirror! All development takes place [here](https://git.webmasterskaya.xyz/tbc/tbc-remove-voice-video-chat-messages)
> | Вся разработка ведётся [здесь](https://git.webmasterskaya.xyz/tbc/tbc-remove-voice-video-chat-messages)

Automatically deletes messages about started and ended voice/video chats on a Telegram channel.

Автоматически удаляет сообщения о начавшихся и завершенных голосовых/видеочатах в Telegram канале.

## Подключение к проекту

Установите пакет в зависимости

```shell
composer require webmasterskaya/tbc-remove-voice-video-chat-messages
```

Зарегистрируйте класс команды, при инициализации приложения.

```php
$bot_api_key  = 'your:bot_api_key';
$bot_username = 'username_bot';

$telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

$telegram->addCommandClass(\Webmasterskaya\TelegramBotCommands\Commands\SystemCommands\RemoveVoiceVideoChatMessagesCommand::class);

$telegram->handle();
// OR
$telegram->handleGetUpdates();
```

Команду нужно запускать вручную! Например, при инициализации приложения, в `UpdateFilter`

```php
$telegram->setUpdateFilter(function (Update $update, Telegram $telegram, &$reason = 'Update denied by update_filter') {

    $telegram->executeCommand('removevoicevideochatmessages');

    return true;
});
```