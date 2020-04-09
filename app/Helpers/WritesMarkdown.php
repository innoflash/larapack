<?php

namespace App\Helpers;

trait WritesMarkdown
{
    use PackageDetail;
    /**
     * Write the Markdown template for the mailable.
     *
     * @return void
     */
    protected function writeMarkdownTemplate()
    {
        $path = realpath(null).$this->devPath().'views/'.str_replace('.', '/', $this->option('markdown')).'.blade.php';

        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0755, true);
        }

        $this->files->put($path,
            file_get_contents($this->illuminateDirectory().'/Foundation/Console/stubs/markdown.stub'));
    }
}
