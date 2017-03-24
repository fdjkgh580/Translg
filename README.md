Codeigniter (CI) 簡單轉換多國語言
====
輕易的把語言切換，改成物件的寫法。直覺又好懂！


# 使用 compsoer 安裝
composer.json
````php
{
    "require": {
        "translg/translg": "dev-master"
    }
}
````
````cmd
composer install
````
這會依賴相關套件 Jsnlib，並自動下載。


# 使用傳統安裝
下載解壓縮後，依照 Codeigniter 原則，放到你的 libraries，並在程式碼中直接引入。
因為依賴套件 Jsnlib\Ao.php，若使用 Composer 下載的話會會自動下載關聯，但在傳統安裝需要自行前往
https://github.com/fdjkgh580/jsnlib 解壓縮，將 Ao\ 複製到 libraries\。
````php
require_once('application/libraries/Translg/Translg.php');
require_once('application/libraries/Ao/src/Ao.php');
````

# Composer 自動加載
````php
require __DIR__ . '/vendor/autoload.php';
````

# 使用方法
這裡介紹 PHP傳統方式。若在 CI 的控制器(Controller)中，您可依照 CI 風格做修改。
````php
$translg = new \Jsnlib\Codeigniter\Translg();

// 語言是英文時
// 會讀取 application/language/english/menu_lang.php 中的 $lang['morning'] 
echo $translg->englist->menu->morning;


// 語言是正體中文時
// 會讀取 application/language/zh/menu_lang.php 中的 $lang['morning'] 
echo $translg->zh->menu->morning; 

````

沒錯，你只要切換『第二個連接參數』為你的語言名稱即可。
````php
$translg->語言名稱->分類文件->語言辨識鍵;
````
如
````php
$translg->chinese->menu->about;
$translg->chinese->menu->news;
$translg->chinese->menu->contact;
````

# Codeigniter 的多國語言
可以參考官方擴充的涵式庫 libraries/language 
http://www.codeigniter.com/user_guide/libraries/language.html

--

# 從安裝到使用，一切都這麼輕巧簡單，快樂用它吧！
<a href="https://github.com/fdjkgh580/Translg/archive/master.zip" target="_blank">Download</a>

