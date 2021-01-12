<?php


namespace Framework\View;


class View
{
    private string $directory;

    /**
     * Templeton constructor.
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function render(string $templateName, array $templateVariables) : string {
        $file = $this->directory . $templateName;
        if (!file_exists($file)) {
            return "Error loading template file ($file).";
        }
        $output = file_get_contents($file);

        foreach ($templateVariables as $key => $value) {
            $tagToReplace = "{{ $key }}";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}