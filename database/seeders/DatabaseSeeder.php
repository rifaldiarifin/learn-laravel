<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User
        User::create([
            "name" => "Rifaldi Arifin",
            "username" => "rifaldi17",
            "email" => "rifaldiarifin@gmail.com",
            "password" => bcrypt('rifaldi123')
        ]);

        // User::create([
        //     "name" => "Gilang Kurniawan",
        //     "email" => "gilkurniawan@gmail.com",
        //     "password" => "gilkurniawan"
        // ]);

        User::factory(3)->create();
        
        // Category
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Best Practice',
            'slug' => 'best-practice'
        ]);

        Category::create([
            'name' => 'Tips n Tricks',
            'slug' => 'tips-n-tricks'
        ]);

        Post::factory(mt_rand(20, 25))->create();
        // Posts
        // Post::create([
        //     'title' => 'Tips auto code in ReactJS',
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'slug' => 'tips-auto-code-in-reactjs',
        //     'body' => 'In ut sit et elit culpa sint cupidatat esse nostrud. Nostrud veniam exercitation adipisicing laboris non ad occaecat dolore amet. Elit mollit officia laborum ut sunt tempor Lorem non ullamco veniam ad do sint veniam. Quis minim nisi duis esse do quis adipisicing. Duis qui esse occaecat irure. Proident deserunt elit mollit eu culpa reprehenderit excepteur aliqua Lorem reprehenderit. Id duis ullamco non ad adipisicing. Anim ut officia mollit laboris irure ex est exercitation ipsum fugiat. Quis fugiat id esse in tempor est excepteur minim eu consectetur qui ea. Est eu excepteur nostrud eiusmod est aliqua adipisicing do Lorem ex duis esse. Dolor dolor quis sint occaecat sunt.',
        //     'status' => 'draft'
        // ]);
        
        // Post::create([
        //     'title' => '10 Best Practice in ReactJS',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => '10-best-practice-in-reactjs',
        //     'body' => 'Nostrud et non minim aliqua occaecat dolor officia id ut nostrud Lorem. Laboris ut nostrud veniam id. Dolor aliquip enim sit non mollit exercitation nostrud labore. Ea pariatur proident incididunt pariatur sunt cillum laborum. Tempor cillum anim nostrud nostrud elit velit elit ipsum cillum eu quis. Nostrud reprehenderit est nostrud dolore irure mollit. Cupidatat mollit officia laboris amet ad magna aliqua voluptate dolor dolore. Eu amet nulla culpa velit laborum veniam. Eiusmod dolor est esse dolor mollit quis. Tempor magna aliquip ullamco sint aliqua labore eiusmod labore elit. Sint officia aute labore laboris ea eiusmod esse minim consequat laboris proident. Amet nulla nisi officia id aute. Ex cillum commodo enim aliquip elit aliquip tempor commodo fugiat. Ea dolore et eu dolore consectetur veniam eu consectetur incididunt nostrud laboris. Tempor consectetur nostrud duis nisi excepteur anim amet. Ea dolor culpa cupidatat dolor qui cillum aliqua. Incididunt laborum dolor nisi Lorem ea. Ipsum minim eiusmod ea et. Duis non sit mollit officia culpa cillum cillum elit. Duis id sit anim velit ea ut laboris irure sunt. Et ad incididunt occaecat eu mollit duis cillum elit culpa tempor sit id officia. Labore nostrud labore eiusmod dolore cupidatat culpa. Excepteur dolor aute aliqua laboris. Deserunt sunt in sint duis dolore laboris. Qui sit minim qui et nulla minim laboris fugiat magna ex elit.',
        //     'status' => 'draft'
        // ]);
        
        // Post::create([
        //     'title' => "Don't this in Laravel",
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => "don't-this-in-laravel",
        //     'body' => 'Reprehenderit aute laborum anim sint reprehenderit elit tempor laborum culpa. Et ea exercitation reprehenderit tempor. Culpa sint aute mollit ad non labore amet velit aute enim irure occaecat quis dolor. Fugiat id nostrud commodo aliqua. Magna excepteur velit reprehenderit sunt aliqua sunt velit voluptate magna magna culpa labore. Tempor officia veniam consequat sint excepteur laboris non esse exercitation ullamco non sit sint. Commodo labore occaecat commodo minim irure ex anim laborum. Ad fugiat mollit reprehenderit dolore occaecat sunt ut consectetur aliquip pariatur laboris mollit. Velit mollit pariatur veniam esse Lorem ad consectetur excepteur eu id mollit laborum mollit enim. Dolor ipsum sit ipsum amet. Duis magna et amet pariatur sit labore in culpa irure eu nisi ad labore qui.',
        //     'status' => 'draft'
        // ]);
        
        // Post::create([
        //     'title' => "How to make dynamic component in ReactJS",
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => "how-to-make-dynamic-component-in-reactjs",
        //     'body' => 'Ex Lorem ullamco minim ea fugiat excepteur laboris irure. Laboris cillum irure nostrud qui reprehenderit ullamco laboris cupidatat culpa do ut. Dolore ipsum eiusmod ut exercitation enim in. Pariatur culpa commodo eiusmod non voluptate ut id occaecat ad. Qui ipsum Lorem esse est proident reprehenderit nostrud id ad irure. Eiusmod occaecat consequat eu mollit Lorem dolor veniam cillum proident duis ipsum. Quis anim laborum ut proident pariatur ea non enim consectetur aliqua dolor. Voluptate amet velit mollit mollit aliqua anim ut ad laborum minim deserunt. Do veniam in minim in cupidatat. Veniam incididunt ex minim consectetur laborum culpa veniam nulla eu laboris exercitation et. Deserunt excepteur incididunt dolor deserunt officia do aute esse quis culpa. Ullamco elit tempor in et anim occaecat ipsum nisi dolor eiusmod deserunt aliquip minim id. Sit laborum nostrud dolore Lorem excepteur aliqua eu et do reprehenderit proident labore in sit. Velit in aliqua ex aliqua culpa anim laboris id anim laboris veniam. Irure ex non nostrud incididunt incididunt laborum in occaecat cupidatat in est. Pariatur eu cupidatat adipisicing minim. Nulla dolore elit aute cillum exercitation do Lorem mollit incididunt dolor. Fugiat amet reprehenderit incididunt aute irure tempor fugiat sint dolore laboris duis id aliqua. Sunt magna Lorem consequat incididunt. Adipisicing ad cupidatat magna veniam laborum cupidatat nisi fugiat. Id culpa exercitation fugiat ullamco in mollit anim qui reprehenderit mollit voluptate. Cillum pariatur elit aliquip fugiat pariatur et laborum duis occaecat deserunt proident nulla. Cupidatat do eu non culpa exercitation dolor qui ad fugiat irure voluptate nulla ullamco id. Dolor nulla pariatur nostrud dolor veniam sint mollit nostrud exercitation reprehenderit incididunt nisi ad fugiat. Laboris in eiusmod nostrud irure esse deserunt nisi ea nostrud officia in. Magna id cillum mollit occaecat anim id laboris ullamco.',
        //     'status' => 'draft'
        // ]);
        
        // Post::create([
        //     'title' => "How to make slider using CSS5",
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => "how-to-make-slider-using-css5",
        //     'body' => 'Tempor aliquip adipisicing ipsum esse velit id. Esse quis incididunt duis nulla tempor eiusmod laboris aliquip aliquip deserunt tempor enim amet. Nostrud amet aliquip aliqua irure duis mollit commodo duis incididunt labore voluptate laboris dolore. Ex labore nostrud magna ipsum proident nulla Lorem do laboris nisi. Magna occaecat ad ea nostrud aliqua in. Velit quis reprehenderit in esse cillum occaecat id. Exercitation aliqua consectetur sunt anim. Cillum commodo sint laborum voluptate in id aute consequat esse commodo do non velit ea. Pariatur in exercitation quis do aute consectetur fugiat mollit. Eu nulla cillum id culpa ex deserunt nisi. Lorem dolor exercitation aute occaecat ipsum deserunt. Non proident deserunt ad ad est ullamco aliqua. Tempor laboris ad incididunt qui aliqua consectetur deserunt sint commodo voluptate ullamco qui velit. Est cupidatat in aute eu exercitation irure anim dolore velit Lorem nisi. Eu voluptate aliqua fugiat proident dolore aute magna aliquip officia in quis minim aliqua. Cupidatat anim non consectetur proident anim commodo consectetur irure deserunt Lorem magna cillum do. Non commodo in proident dolor pariatur occaecat nisi consectetur. Commodo non ea Lorem eiusmod qui id eiusmod incididunt. Nulla fugiat mollit occaecat eu aliquip magna excepteur labore et aliqua esse incididunt. Duis aute sunt laboris amet elit. In dolor consectetur elit minim esse exercitation tempor nostrud esse aute ut occaecat. Sunt pariatur eiusmod incididunt amet ad ipsum sit Lorem. Pariatur non veniam irure adipisicing reprehenderit. Ullamco exercitation incididunt aliqua nisi et reprehenderit dolor. Est ad Lorem aliqua irure minim Lorem.',
        //     'status' => 'draft'
        // ]);
    }
}
