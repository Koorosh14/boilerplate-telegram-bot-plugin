# Boilerplate Telegram Bot Plugin

`v1.1.0`

A boilerplate plugin for connecting a Telegram bot to your WordPress website.

---

## Quick Start
Clone or download this repository, change its name to something else, and then you'll need to do a four-step **CASE-SENSITIVE** find and replace in all the codes:
1. Search for `BoilerplateTelegramPlugin` to capture the namespaces.
2. Search for `BTBP` to capture the constants.
3. Search for `btbp` to capture the keys and slugs.
4. Search for `boilerplate-telegram-plugin` to capture the text domains.

Then, update the header in `plugin.php` with your own information.

## Composer Setup
```
$ composer install
```

## Bot Setup

### Create Bot
Create a bot with [@BotFather](https://t.me/BotFather) and copy the token.

## Plugin setup
1. Enable the plugin
2. Copy bot's token and username (with `@`) in the plugin's settings
3. Open the `options-permalink.php` page so that the API endpoints get refreshed

### Use `getUpdates` method (Local)
To test the bot on a local environment, add this constant to your `wp-config.php` file: 
```
define('WP_ENVIRONMENT_TYPE', 'local');
```
And use this endpoint to handle the updates (e.g. each time you message the bot):
```
https://{WEBSITE.COM}/wp-json/btbp/v1/get_message_polling
```

### Set Webhook (Production)
To enable your bot for a production website, set the bot's webhook to the `get_message` endpoint:
```
https://api.telegram.org/bot{TOKEN}/setWebhook?url=https://{WEBSITE.COM}/wp-json/btbp/v1/get_message
```

## Redirect requests (proxy)
If your server can't access Telegram, you can use a middleman server to redirect requests:
- Change `CURLOPT_URL`'s value in [forward.php](forward.php)
- Upload [forward.php](forward.php) and [forward-to-telegram.php](forward-to-telegram.php) to your middleman server
- Use `forward`'s URL as bot's webhook
- Copy the `forward-to-telegram`'s full link in the plugin's settings

## Debugging
You can see bot's error log file here:
```
wp-content/plugins/boilerplate-telegram-plugin/logs/
```