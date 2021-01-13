<?php


namespace Framework\View;


class View implements iTemplate
{
    private string $rootDirectory;

    /**
     * Templeton constructor.
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        $this->rootDirectory = $directory;
    }

    public function render(string $templateName, array $templateVariables = []) : string
    {
        $file = $this->rootDirectory . "/Templates/$templateName.tmpl";
        if (!file_exists($file)) {
            return "Error loading template file ($file).";
        }
        $output = file_get_contents($file);

        if (!empty($templateVariables)) {
            foreach ($templateVariables as $key => $value) {
                $tagToReplace = "{{ $key }}";
                $output = str_replace($tagToReplace, $value, $output);
            }
        }

        return $output;
    }
}