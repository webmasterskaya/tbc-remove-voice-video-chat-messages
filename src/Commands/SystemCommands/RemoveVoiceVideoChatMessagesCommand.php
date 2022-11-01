<?php

namespace Webmasterskaya\TelegramBotCommands\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class RemoveVoiceVideoChatMessagesCommand extends SystemCommand
{
	/**
	 * @var string
	 */
	protected $name = 'removevoicevideochatmessages';

	/**
	 * @var string
	 */
	protected $description = 'Handles and remove system messages about starting and ending of video and voice chat';

	/**
	 * @var string
	 */
	protected $version = '1.0.0';

	public function execute(): ServerResponse
	{
		$message = $this->getMessage();

		if ($message->getVideoChatStarted()
			|| $message->getVideoChatEnded()
			|| $message->getVoiceChatStarted()
			|| $message->getVoiceChatEnded())
		{
			return Request::deleteMessage([
				'chat_id'    => $message->getChat()->getId(),
				'message_id' => $message->getMessageId()
			]);
		}

		return Request::emptyResponse();
	}
}