<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications')->delete();
        Publication::create([
            'title'     => 'Electronic typesetting',
            'content'    => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
            'user_id' => 3
        ]);
        Publication::create([
            'title'     => 'Leap into electronic',
            'content'    => "It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'user_id' => 4
        ]);
        Publication::create([
            'title'     => 'Latin words',
            'content'    => "It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.",
            'user_id' => 3
        ]);
        Publication::create([
            'title'     => 'Lorem Ipsum generators',
            'content'    => "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            'user_id' => 1
        ]);
        Publication::create([
            'title'     => 'You need to be sure',
            'content'    => "If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.",
            'user_id' => 2
        ]);

        Publication::create([
            'title'     => 'Combined with a handful of model',
            'content'    => "It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            'user_id' => 1
        ]);

        Publication::create([
            'title'     => 'Repeat predefined chunks',
            'content'    => "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            'user_id' => 2
        ]);
        Publication::create([
            'title'     => 'Suffered alteration in some form',
            'content'    => "But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
            'user_id' => 2
        ]);
    }
}
