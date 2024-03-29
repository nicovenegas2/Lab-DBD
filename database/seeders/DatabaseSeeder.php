<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Message;
use App\Models\PaymentMethod;
use App\Models\Follower;
use App\Models\RoleUser;
use App\Models\Bank;
use App\Models\MethodBank;
use App\Models\Game;
use App\Models\WishList;
use App\Models\Voucher;
use App\Models\CountryGame;
use App\Models\Library;
use App\Models\Comment;
use App\Models\ContentVoucher;
use App\Models\Developer;
use App\Models\GameKind;
use App\Models\Kind;
use App\Models\Like;
use App\Models\RolePermission;
use App\Models\UserMethod;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $newcountrygame = function($idgame, $idcountry){
            $new = new CountryGame();
            $new->id_countries = $idcountry;
            $new->id_games = $idgame;
            $new->price = rand(0,999999);
            $new->save();
        };

        Permission::factory(10)->create();
        Country::factory(10)->create();
        User::factory(5)->create();
        # Generacion roles para Roles
        $admin = new Role();
        $admin->name = "admin";
        $admin->description = "Control total sobre la plataforma";
        $admin->save();
        $developer = new Role();
        $developer->name = "developer";
        $developer->description = "Agregar y modificar juegos";
        $developer->save();
        $user = new Role();
        $user->name = "user";
        $user->description = "disfruta de la plataforma";
        $user->save();

        Message::factory(10)->create();
        # Generacion metodos de pagos para PaymentMethod
        $visa = new PaymentMethod();
        $visa->name = "Visa";
        $visa->save();
        $mastercard = new PaymentMethod();
        $mastercard->name = "MasterCard";
        $mastercard->save();
        Follower::factory(10)->create();
        RoleUser::factory(5)->create();
        Bank::factory(10)->create();
        MethodBank::factory(10)->create();
        Game::factory(40)->create();
        WishList::factory(10)->create();
        Voucher::factory(15)->create();
        #Generacion datos para CountryGame
        foreach(Game::all() as $game){
            foreach (Country::all() as $country) {
                $newcountrygame($game->id, $country->id);
            };
        };
        Comment::factory(20)->create();
        ContentVoucher::factory(8)->create();
        Developer::factory(12)->create();
        Kind::factory(6)->create();
        #Generacion datos para GameKind
        foreach(Game::all() as $game){
            for ($i = 0; $i < rand(1, Kind::all()->count()); $i++){
                $newkindgame = new GameKind();
                $newkindgame->id_game = $game->id;
                $newkindgame->id_kind = rand(1, Kind::all()->count());
                $newkindgame->save();
            }
        }
        Like::factory(5)->create();
        RolePermission::factory(5)->create();
        Library::factory(200)->create();
        UserMethod::factory(8)->create();
        $UserAdmin = new User();
        $UserAdmin->nickname = "admin";
        $UserAdmin->name = "admin";
        $UserAdmin->email = "admin@admin.com";
        $UserAdmin->password = "admin";
        $UserAdmin->wallet = 999999;
        $UserAdmin->birthday = "2001-01-01";
        $UserAdmin->id_country = 1;
        $UserAdmin->save();
        $roleUserAdmin = new RoleUser();
        $roleUserAdmin->id_user = $UserAdmin->id;
        $roleUserAdmin->id_role = 1;
        $roleUserAdmin->save();

        $developer = new User();
        $developer->nickname = "developer";
        $developer->name = "developer";
        $developer->email = "developer@developer.com";
        $developer->password = "developer";
        $developer->wallet = 999999;
        $developer->birthday = "2001-01-01";
        $developer->id_country = 1;
        $developer->save();
        $roledeveloper = new RoleUser();
        $roledeveloper->id_user = $developer->id;
        $roledeveloper->id_role = 2;
        $roledeveloper->save();


    }
}