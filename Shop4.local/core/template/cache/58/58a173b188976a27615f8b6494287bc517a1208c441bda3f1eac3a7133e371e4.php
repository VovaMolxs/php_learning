<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* app.html */
class __TwigTemplate_72ae714477b63c4ad01fe7e580e94c71b0026000467b054a14047eaceb515d4c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Index Controller!</title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">
</head>
<body>
    ";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        // line 10
        echo "</body>
</html>";
    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "app.html";
    }

    public function getDebugInfo()
    {
        return array (  55 => 9,  50 => 10,  48 => 9,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "app.html", "E:\\OSPanel\\OpenServer\\domains\\my-itschool.local\\megashop\\original\\oop_megaShop5.local\\app\\views\\app.html");
    }
}
