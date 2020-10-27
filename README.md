Utilities

- isMobile
`check request is from mobile device`

```
deviceCheck = new DeviceCheck();
$deviceCheck->setServerVar($_SERVER);
$isMobile = $deviceCheck->isMobile();
```

- deviceType
`get device type of request`
```
$deviceCheck = new DeviceCheck();
$deviceCheck->setServerVar([
    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0',
    'HTTP_ACCEPT' => 'text/plain; q=0.5, text/html,text/x-dvi; q=0.8, text/x-c'
]);
$deviceType = $deviceCheck->deviceType();
```

- getDownloadSize
`get request download size`
```
$file = new Requests();
$size = $file->getDownloadSize(['https://filepath.com']); // size returns is in bytes
```
