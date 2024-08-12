<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('qna')->group(function () {
    Route::get('/', 'QnAController@index');
    Route::get('/gpt', function () {
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "system",
                    "content" => "You are a helpful assistant."
                ],
                [
                    "role" => "user",
                    "content" => "Who won the world series in 2020?"
                ],
                [
                    "role" => "assistant",
                    "content" => "The Los Angeles Dodgers won the World Series in 2020."
                ],
                [
                    "role" => "user",
                    "content" => "Where was it played?"
                ],
            ],
            'temperature' => 1.0,
            'max_tokens' => 4000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);


        $d = json_decode($chat);
        // Get Content
        dd($d);
    });
});
