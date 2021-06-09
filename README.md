# Mini Readme

_You should already have php installed, my PHP version is 5.6.40_

The first step is to install ffmpeg

```html
apt-get update

apt-get install ffmpeg -y
```

In the second line, insert the name of the file you want to check. And also put it beside the script.
```html
$m3u8_for_check="big.m3u8";
```

If everything worked out, then run the command in the console

```html
php iptv_checker.php
```

If there are working channels in the sheet, the file **big.m3u8_good.m3u8** will be created


***Powered by Aleksejqa***
