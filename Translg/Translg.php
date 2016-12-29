<?php
/**
 * v1.1.1
 * 
 * [快速切換多國語言]
 * 如同 CI 指定語言的檔案，要放在 language/ 底下。
 * 
 * 使用方法
 * 
 * $translg = new Translg();
 *
 * 顯示英文
 * 會讀取 language/english/menu_lang.php 中的 $lang['morning'] 
 * $translg->englist->menu->morning;
 * 
 * 顯示正體中文
 * 會讀取 language/zh/menu_lang.php 中的 $lang['morning'] 
 * $translg->zh->menu->morning; 
 * 
 */
namespace Jsnlib\Codeigniter;

class Translg
{
    protected $ci;
    
    // 語言名稱
    protected $lang;

    // 語言底下的翻譯文件名稱
    protected $file;

    // 儲存訪查路徑是否存在的紀錄 array($path => true/false)
    // 避免輸出相同的語言，卻重複的檢查路徑存在 
    protected $history = array(); 

    function __construct()
    {
        if (\class_exists('\Jsnlib\Ao') === false)
            throw new \Exception("Need Class : '\Jsnlib\Ao' ");
    }

    function __get($name)
    {
        $this->ci =& get_instance();

        // 若還沒有指定到翻譯文件
        if (empty($this->file))
        {
            $exist_lang = self::exist_lang($name);

            // 語言路徑存在
            if ($exist_lang) 
            {
                $this->lang = $name;
                return $this;
            }

            // 語言路徑不存在，也沒有指定過語言，
            // 那麼當前指定的視為語言。
            if (!isset($this->lang)) 
            {
                $this->lang = $name;
                return $this;
            }

            // 指定翻譯文件
            $this->file = $name;

            // 載入語言檔案
            $this->ci->lang->load($this->file, $this->lang);
            
            return $this;
        }

        // 已經載入翻譯文件了，所以接著指定的是顯示的鍵
        else 
        {
            $this->clean();
            $line = $this->ci->lang->line($name);
            return is_array($line) ? new \Jsnlib\Ao($line) : $line;
        }

    }

    //釋放供下次使用
    protected function clean()
    {
        unset($this->lang, $this->file);
    }

    // 指定的是語言?
    protected function exist_lang($lang_name)
    {
        // 檢查是否包含這個語言資料夾
        $path = APPPATH . "language/{$lang_name}";

        // 先查看紀錄，過去是否檢查過了
        if (isset($this->history[$path]))
        {
            $isexist = true;
        }
        else 
        {
            $isexist = file_exists($path);
        }

        // 紀錄起來，下次不必重新檢查
        $this->remember($path, $isexist);
        return ;
    }   

    // 紀錄起來，下次不必重新檢查
    protected function remember($path, $isexist)
    {
        $this->history[$path] = $isexist;
    }

    // 取得訪查紀錄
    public function history()
    {
        return $this->history;
    }

}

/* End of file Translg.php */
/* Location: ./application/libraries/Translg.php */
