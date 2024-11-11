<?php
namespace Fagathe\Phplib\Symfony\Twig\Extension;

use Fagathe\Phplib\Service\Breadcrumb\Breadcrumb;
use Fagathe\Phplib\Service\Breadcrumb\BreadcrumbGenerator;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

final class BreadcrumbExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('generate_breadcrumb', [$this, 'generateBreadcrumb'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * generateBreadcrumb
     *
     * @param  mixed $breadcrumb
     * @return string
     */
    public function generateBreadcrumb(?Breadcrumb $breadcrumb): string
    {
        return (new BreadcrumbGenerator($breadcrumb))->generate();
    }
}