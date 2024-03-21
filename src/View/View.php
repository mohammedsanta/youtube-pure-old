<?php
namespace Santa\View;

class View
{

    public static function make($view,$parmas = [])
    {

        $baseContent = static::getBaseContent();
        $viewContent = static::getViewContent($view,parmas:$parmas);
        echo str_replace('{{content}}',$viewContent,$baseContent);

    }

    public static function getBaseContent()
    {
        ob_start();
        include views_path() . 'layouts/main.php';
        return ob_get_clean();
    }

    public static function makeError()
    {
        return static::getViewContent('404',true);
    }

    public static function getViewContent($view,$isError = '',$parmas = [])
    {

        extract($parmas);

        $view = $isError ? '404/404' : $view;

        if(str_contains($view,'.')){

            $views = explode('.',$view);

            foreach($views as $view){

                if(is_dir(views_path() . $view)){

                    $path = $view . '/';

                }

            }

            $view = $path . end($views) . '.php';

        }else {
            $view = $view . '.php';
        }


        if($isError){
            return include_once views_path() . $view;
        }else {
            ob_start();
            include_once views_path() . $view;
            return ob_get_clean();
        }

    }

}