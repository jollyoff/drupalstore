<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/drupalsite/templates/region--footer.html.twig */
class __TwigTemplate_ff6b57144126fb89feb336406e9b4e9e713a399e121ef44df8d2b24561080a03 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 16, "if" => 22];
        $filters = ["clean_class" => 19, "escape" => 23];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 16
        $context["classes"] = [0 => "footer", 1 => "region", 2 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 19
($context["region"] ?? null))))];
        // line 22
        if (($context["content"] ?? null)) {
            // line 23
            echo "  <footer";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
    <div class=\"footer-wrap\">
    ";
            // line 25
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
            echo "
      ";
            // line 26
            $context["cls"] = "ds-social-network";
            // line 27
            echo "      <nav class=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "\">
        <ul class=\"";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-list\">
          <li class=\"";
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-item\">
            <a class=\"";
            // line 30
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-link\" href=\"https://facebook.com\" target=\"_blank\">
              <img src=\"themes/custom/drupalsite/assets/images/facebook_png.png\">
            </a>
          </li>
          <li class=\"";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-item\">
            <a class=\"";
            // line 35
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-link\" href=\"https://instagram.com\" target=\"_blank\">
              <img src=\"themes/custom/drupalsite/assets/images/instagram_png.png\">
            </a>
          </li>
          <li class=\"";
            // line 39
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-item\">
            <a class=\"";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-link\" href=\"https://twitter.com\" target=\"_blank\">
              <img src=\"themes/custom/drupalsite/assets/images/twitter_png.png\">
            </a>
          </li>
          <li class=\"";
            // line 44
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-item\">
            <a class=\"";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cls"] ?? null)), "html", null, true);
            echo "-link\" href=\"https://youtube.com\" target=\"_blank\">
              <img src=\"themes/custom/drupalsite/assets/images/youtube_png.png\">
            </a>
          </li>
        </ul>
      </nav>
    </div>

  </footer>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/drupalsite/templates/region--footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 45,  114 => 44,  107 => 40,  103 => 39,  96 => 35,  92 => 34,  85 => 30,  81 => 29,  77 => 28,  72 => 27,  70 => 26,  66 => 25,  60 => 23,  58 => 22,  56 => 19,  55 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/drupalsite/templates/region--footer.html.twig", "D:\\xampp\\htdocs\\drupalsite\\themes\\custom\\drupalsite\\templates\\region--footer.html.twig");
    }
}
