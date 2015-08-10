<?php

if ( ! function_exists('pretty_photo_filename'))
{
    /**
     * Remove the timestamp portion of filename to make it
     * more recognizable to user
     *
     * @param  string  $filename
     * @return void
     *
     */
    function pretty_photo_filename($filename)
    {
        $pos = strpos($filename, '-');

        return substr($filename, $pos + 1);

    }
}