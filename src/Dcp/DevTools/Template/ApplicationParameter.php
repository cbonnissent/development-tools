<?php
namespace Dcp\DevTools\Template;

class ApplicationParameter extends Template
{

    public function render($arguments, $outputPath, $force = false)
    {
        if (!empty($outputPath) && !is_dir($outputPath)) {
            throw new Exception("The output path $outputPath is not a dir");
        }
        if (!isset($arguments["name"]) || !$this->checkLogicalName($arguments["name"])) {
            throw new Exception("You need to set the name of the application with a valid name " . $this->logicalNameRegExp);
        }
        if (!empty($outputPath)) {
            $outputPath .= DIRECTORY_SEPARATOR . $arguments["name"] . "_init.php";
        }
        return parent::main_render("application_param", $arguments, $outputPath, $force);
    }

} 