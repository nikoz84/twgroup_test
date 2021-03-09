<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        Comment::create(array(
            'publication_id'     => 1,
            'user_id' => 4,
            'content'    => 'Interesante como se definen las variables de entorno',
            'status' => 'APROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 2,
            'user_id' => 2,
            'content'    => 'No me interesa',
            'status' => 'APROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 1,
            'user_id' => 3,
            'content'    => 'Como haces para hacerlo de esa forma?',
            'status' => 'APROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 1,
            'user_id' => 4,
            'content'    => 'Eres un ##$#&¨@%',
            'status' => 'DESAPROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 1,
            'user_id' => 2,
            'content'    => 'Hola, como es?',
            'status' => 'APROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 2,
            'user_id' => 4,
            'content'    => 'Hola, porque pasa eso?',
            'status' => 'APROVADO'
        ));


        Comment::create(array(
            'publication_id'     => 5,
            'user_id' => 3,
            'content'    => 'Eres un ##$#&¨@%',
            'status' => 'DESAPROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 4,
            'user_id' => 2,
            'content'    => 'estoy en Chile pero vivo en Brasil, Hola',
            'status' => 'APROVADO'
        ));

        Comment::create(array(
            'publication_id'     => 3,
            'user_id' => 3,
            'content'    => 'Estoy en Holanda y en Talca',
            'status' => 'APROVADO'
        ));
    }
}
