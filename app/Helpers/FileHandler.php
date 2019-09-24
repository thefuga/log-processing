<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHandler
{
    function __construct($fileName)
    {
	$this->fileName = $fileName;
    }

    /**
     * Reads a file line by line, yielding on each line. This should be called
     * from a foreach loop.
     */ 
    public function read()
    {
	$fileHandler = fopen($this->fileName, 'rb');

	while (($line = fgets($fileHandler)) !== false) {
	    yield rtrim($line, "\r\n");
	}

	fclose($fileHandler);
    }

    /**
     * Appends to the end of the file being held by this handler.
     * @param $content string or array of strings
     */
    public function append($content)
    {
	Storage::append($this->fileName, $this->toString($content));
    }

    /**
     * Converts an array of strings to a comma separetad string.
     * @param $content string or array of strings
     * @return comma separetad string
     */
    private function toString($content)
    {
	if(gettype($content) == 'array') {
	    return implode($content, ',');
	}
	else
	    return $content;
    }
}
