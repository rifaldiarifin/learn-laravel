<?php

namespace App\Models;

class Post
{
    protected static $blog_posts = [
        [
            "uuid" => "g36h23f5-47erh46436-234gg2",
            "title" => "Hello World",
        "author" => "Rifaldi Arifin",
        "body" => "Est magna est tempor culpa sit anim proident incididunt reprehenderit ullamco fugiat sunt aute. Et officia amet sit pariatur. Cupidatat ea proident minim occaecat. Non cillum consequat consectetur ad culpa ipsum. Ut amet aute officia ut laboris incididunt culpa. Eiusmod pariatur excepteur occaecat quis cupidatat proident voluptate elit ut ipsum aliqua. Exercitation ex in nisi fugiat occaecat adipisicing duis id pariatur proident non aliquip exercitation ut.

Pariatur sit do commodo voluptate consectetur occaecat commodo et proident consectetur consequat. Ullamco eiusmod amet eiusmod voluptate dolor elit est ex. Ex exercitation ullamco nisi anim. Qui laboris consectetur cupidatat ea eu proident sit qui ut nulla pariatur. Minim velit commodo ipsum exercitation laboris mollit magna officia aliqua aliqua eu. Exercitation dolore minim ad pariatur ut deserunt proident cillum pariatur ipsum incididunt nisi sunt. Adipisicing reprehenderit sit aute ipsum sint velit laboris quis culpa id labore.

Minim nostrud dolor tempor consequat ipsum aliqua deserunt ad. Excepteur ea sit eu enim laboris fugiat pariatur mollit aliqua non ex aute aute culpa. Aute elit ut ut culpa sit aliquip. Eiusmod officia aliqua magna ad officia elit dolore ad occaecat id ex."
        ],
        [
            "uuid" => "66h77676h-2g63h76j45h-2f34g74",
            "title" => "Introduction",
            "author" => "Cihuy Code",
            "body" => "Nostrud reprehenderit excepteur enim laborum elit irure cillum do exercitation nostrud voluptate occaecat irure enim. Ex officia reprehenderit nulla culpa voluptate proident aliqua. Amet tempor amet eu sit consequat quis consectetur do irure fugiat quis elit anim. Enim officia irure duis dolore elit. Excepteur irure ullamco et Lorem laboris. Minim nisi minim nisi ipsum Lorem tempor magna est consectetur aute enim mollit magna sit. Aliqua laborum dolore dolore culpa velit voluptate sunt reprehenderit labore.

Dolore in incididunt aute est magna exercitation ea aliqua laborum sunt. Sunt ullamco enim ex duis. Cupidatat id ea quis est qui esse culpa adipisicing labore dolor amet. Irure tempor eiusmod elit velit. Dolore in commodo nostrud in nisi mollit incididunt. Occaecat ex culpa pariatur ad eiusmod non officia commodo. Aliquip deserunt sunt eu cupidatat adipisicing nisi duis aute nisi officia eiusmod.

Mollit nisi quis ullamco Lorem ipsum ipsum. Excepteur ex reprehenderit nulla eu. Incididunt aliquip non sunt dolor eiusmod. Dolor fugiat minim enim proident laborum. Eiusmod ea cupidatat velit deserunt incididunt non ad Lorem amet.

Veniam culpa minim commodo veniam laboris labore occaecat occaecat. Sunt in minim cupidatat culpa et anim esse et est adipisicing minim aliquip. Tempor mollit laboris eiusmod veniam in. Ex commodo culpa laborum officia sit deserunt elit minim reprehenderit incididunt ut ex deserunt. Eiusmod reprehenderit nulla duis ipsum."
        ],
        [
            "uuid" => "989839g984-g364g4h-f2332f34",
            "title" => "Getting Started",
            "author" => "Jhon Doe",
            "body" => "Eu fugiat consectetur incididunt pariatur magna laboris aliquip eu do voluptate aliqua in sunt. Sunt laboris consequat id anim sit exercitation voluptate reprehenderit pariatur commodo eiusmod quis ad. Non culpa laboris adipisicing ex adipisicing culpa in deserunt. Ea et incididunt elit consequat officia aute adipisicing. Cillum ullamco consectetur ut minim velit consectetur eiusmod consequat do Lorem commodo culpa. Exercitation tempor nisi Lorem excepteur. Amet cupidatat ex nisi minim.

Minim sit aliquip laboris mollit mollit consectetur elit duis cupidatat. Esse eiusmod labore magna aliquip ad officia occaecat. Ut exercitation esse sunt quis. Fugiat amet fugiat ea ex irure. Mollit esse elit mollit anim ipsum esse Lorem elit ea deserunt.

Commodo qui do non veniam officia proident."
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function findOneByKeyblog($keyblog) {
        $post = static::all();
        function get_key_blog ($p) {
            return $p["uuid"] . "-" . str_replace(' ', '-', strtolower($p["title"]));
        }
        foreach (Post::all() as $p) {

            if (get_key_blog($p) === $keyblog) $post = $p;
        }
        return $post;
    }
}
