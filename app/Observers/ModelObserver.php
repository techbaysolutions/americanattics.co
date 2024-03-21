<?php

namespace App\Observers;

class ModelObserver {



    public function __construct(){

    }


    public function updating($model)
    {
        $path = storage_path() . '/app/public';

        if (file_exists($path)) {
            \File::cleanDirectory($path, 0777, true, true);
        }
    }


    public function creating($model)
    {
        $path = storage_path() . '/app/public';

        if (file_exists($path)) {
            \File::cleanDirectory($path, 0777, true, true);
        }
    }


    public function removing($model)
    {
        $path = storage_path() . '/app/public';

        if (file_exists($path)) {
            \File::cleanDirectory($path, 0777, true, true);
        }
    }



    public function saving($model)
    {

        $path = storage_path() . '/app/public';

        if (file_exists($path)) {
            \File::cleanDirectory($path, 0777, true, true);
        }
    }

    /**
     * return numm value if the string is empty
     *
     */
    private function emptyToNull($string)
    {
        //trim every value
        $string = trim($string);

        if ($string === ''){
            return null;
        }

        return $string;
    }

}
