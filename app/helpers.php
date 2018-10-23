<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}


if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}


if (! function_exists('pageLinks')) {

    function pageLinks()
    {
        return \App\Models\Page::where('priority', '<', 3)->orWhereNull('priority')->select(['title', 'slug', 'id'])->get();
    }
}



if (!function_exists('now')) {
    /**
     * @param string|array $messages
     * @param bool $error
     * @param int $responseCode
     * @param array $data
     * @return array
     */
    function now()
    {
        return \Carbon\Carbon::now();
    }
}

if (!function_exists('models')) {
    
    function models($method, $path=null)
    {

        if(!$path){ $path = app_path() . "/Models"; }

        $models = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $models = array_merge($models, models($method, $filename));
            }else{
                try {
                    $register = substr(str_replace('/', '\\', str_replace(app_path(), '\\App', $filename)),0,-4);
                    $class = app($register);
                    if(is_array($method )){
                        $in = true;
                        foreach ($method as $m => $meth) {
                            if(!method_exists($class, $meth)){ $in = false; }
                        }
                        if($in){ $models[] = $class; }
                    }else{
                        if(method_exists($class, $method)){
                            $models[] = $class;
                        }
                    }

                } catch (\Exception $e) {
                    
                }
            }

        }
        return $models;
    }

}

if (!function_exists('carbon')) {
    /**
     * @param string|array $messages
     * @param bool $error
     * @param int $responseCode
     * @param array $data
     * @return array
     */
    function carbon($date)
    {
        return \Carbon\Carbon::parse($date);
    }
}


if(! function_exists('decimal')){

    function decimal($number, $format=2)
    {
        return number_format($number, $format, '.', '');
    }

}


if(! function_exists('desc_limit')){

    function desc_limit($description, $limit=180)
    {
        return str_limit(strip_tags($description), $limit, $end = "...");
    }

}

if(! function_exists('ccMask')){

    function ccMask($number, $maskingCharacter = '*')
    {
        return substr($number, 0, 4) . str_repeat($maskingCharacter, strlen($number) - 8) . substr($number, -4);
    }
}

if(! function_exists('mapFields')){

    function mapFields($fields, $label = null)
    {
        return array_combine(
            array_map(function($field) use($label){
                return ($label ? $label . '.' : '') . $field;
            }, $fields)
            ,

            array_map(function($field) use($label){
                return ($label ? ucfirst($label) . '.' : '') . ucfirst(str_replace('_', ' ', $field));
            }, $fields)
        );    
    }
}


if (!function_exists('transformToLabels')) {
    /**
     * pluck name
     */
    function transformToLabels($value)
    {
        return implode(",", array_map('strtoupper', $value->toArray()));
    }
}
