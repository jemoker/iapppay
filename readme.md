# iapppay
自用
Iapppay Payment

###Install

1. 修改composer.json文件,加入```"jemoker/iapppay": "dev-master"```
```json
  "require": {
    "jemoker/iapppay": "dev-master"
  }
```

2. 修改app/config/app.php
```php
'providers' => array(
  		'Jemoker\Iapppay\IapppayServiceProvider'
)


'aliases' => array(
		'Iapppay' => 'Jemoker\Iapppay\Facades\IapppayFacade'
)
```

3. 运行```composer update ```命令
