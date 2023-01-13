<?php /** @noinspection SpellCheckingInspection */

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Redirect;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

    
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tickets=Ticket::factory(40)->make();
        $id = 1;
        

        foreach ($tickets as $ticket) {
            $slug = $id."-".$ticket->title.$ticket->created_at;
            Ticket::factory()->create([
                'slug' => md5($slug)
            ]);
            
            $id++;
        }

        User::factory()->create([
            'first_name' => "Renata",
            'last_name' => "Jokisz-Rogucka",
            'email' => 'admin@soszd.pl',
            'password' => '$2y$10$rcQUWtlo3oPpmxroFw8nV.OVOMf94/ETYqO/7lhFpm0NPtc3z/LmO',
            'role'=> 'admin',
        ]);

        User::factory()->create([
            'first_name' => "Beata",
            'last_name' => "Mulsanowska",
            'email' => 'uzytkownik@soszd.pl',
            'password' => '$2y$10$4K2iVZ.fQxYBf/oX9IwvP.K59AAt//78pkOqtEYAcwNa81g1/RepC',
        ]);

        Redirect::factory(15)->create();

    }
}
