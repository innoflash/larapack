<?php

namespace App\Helpers;

use Illuminate\Support\Str;

trait PackageDetail
{
    /**
     * Get composer file content.
     *
     * @return mixed
     */
    protected function getComposer()
    {
        $dev_path = app()->environment() == 'development' ? '/package/TestApp' : '';
        $path = getcwd().$dev_path.'/composer.json';

        return json_decode(file_get_contents($path));
    }

    /**
     * Get namespace from composer.
     *
     * @throws Exception
     * @return int|string|null
     */
    public function namespaceFromComposer()
    {
        $content = $this->getComposer();
        $psr = 'psr-4';

        return key($content->autoload->$psr);
    }

    /**
     * Get vendor name from composer.
     *
     * @throws Exception
     * @return string
     */
    protected function getVendor()
    {
        return Str::before($this->namespaceFromComposer(), '\\');
    }

    /**
     * Get package name.
     *
     * @throws Exception
     * @return string|string[]
     */
    public function getPackageName()
    {
        return str_replace('\\', '', Str::after($this->namespaceFromComposer(), '\\'));
    }

    /**
     * Namespace to be used by make commands.
     *
     * @throws Exception
     * @return int|string|null
     */
    protected function rootNamespace()
    {
        return $this->namespaceFromComposer();
    }

    public function devPath()
    {
        return (app()->environment() === 'development') ? '/package/'.$this->getPackageName().'/' : '/';
    }

    public function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $path = getcwd().$this->devPath();
        $path = $this->getComposer()->type !== 'project' ? $path.'src/' : $path;

        return $path.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Navigates to illuminate.
     * mainly to pick stubs from it.
     *
     * @return false|string
     */
    public function illuminateDirectory()
    {
        return realpath(__DIR__
            .'/../../vendor/laravel-zero/foundation/src/Illuminate/');
    }
}
