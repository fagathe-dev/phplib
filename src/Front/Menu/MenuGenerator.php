<?php 
namespace App\Service\Menu;
use App\Service\Menu\Menu;

final class MenuGenerator 
{

    public function __construct(
        private Menu $menu,
    ) {}

    public function start(): string {
        return '';
    }

    public function end(): string {
        return '';
    }

    public function itemGroupStart():string {
        return '';
    }

    public function itemGroupMenulink():string {
        return '';
    }

    public function itemGroupEnd():string {
        return '';
    }

    public function itemGroup(string $name):string {
        return '';
    }

    public function itemSingle(): string
    {
        return '';
    }

    public function item():string {
        return '';
    }

    public static function generate(): string {
        return '';
    }

}