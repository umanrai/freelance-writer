<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Faker\Factory as Faker;
class GenerateContent
{

    public function __invoke( Request $request )
    {

        $prompt = 'Act as a profession content writer and write content using ' . $request->get('prompt_title') . ' and more description is :' . $request->get('prompt_desc');


        try {
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
            ]);
            $paragraphs = data_get($result, 'choices.0.text') ?? null;
        } catch (\Exception $exception) {
            $faker = Faker::create();

            $paragraphs = [];
            $count = 5;

            for ($i = 0; $i < $count; $i++) {
                $numSentences = rand(3, 6);
                $paragraphs[] = $faker->paragraphs($numSentences, true);
            }
        }

        return response()
            ->json(
                $paragraphs
            );
    }

}
