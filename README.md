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
# 使用傳統安裝
下載解壓縮後，放到你的目錄，並在你的程式碼中直接引入
````php
inclide_once('translg/Translg.php');
````

# Composer 自動加載
````php
require __DIR__ . '/vendor/autoload.php';
````

# 使用方法
這裡介紹 PHP傳統方式。若在 CI 的控制器(Controller)中，您可依照 CI 風格做修改。
````php
$translg = new Translg();

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

