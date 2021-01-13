<?php


namespace Framework\view;


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

    public function render(string $tmplName, array $tmplVariables = []) : string
    {
        $file = $this->rootDirectory . "/templates/$tmplName.tmpl";
        if (!file_exists($file)) {
            return "Error loading template file ($file).";
        }
        $output = file_get_contents($file);

        if (!empty($tmplVariables)) {
            foreach ($tmplVariables as $key => $value) {
                $tagToReplace = "{{ $key }}";
                $output = str_replace($tagToReplace, $value, $output);
            }
        }

        return $output;
    }
}