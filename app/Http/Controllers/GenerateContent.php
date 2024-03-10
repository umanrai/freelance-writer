<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
class GenerateContent
{

    public function __invoke( Request $request )
    {

        $prompt = 'Act as a professional content writer and write an article about ' .
            $request->get('prompt_title') . '. Here is a detailed description: ' .
            $request->get('prompt_desc') . 'Write me 5 paragraphs about the topic of ' .
            $request->get('prompt_title') . ', focusing on ' . $request->get('prompt_title');

        try {
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-002',
                'prompt' => $prompt,
                'max_tokens' => 500,
                'temperature' => 0.7,
                'n' => 5,
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
