<?php
namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class XMLParserService
{
    public function saveNews($link, $userId)
    {
        $xml = XmlParser::load($link);

        $data = $xml->parse(
            [
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ]
            ]
        );

        foreach($data['news'] as $dataNews)
        {
            if(!News::whereTitle($dataNews['title'])->first())
            {
                $news = new News;
                $news->fill(
                    [
                        'author' => 'Yandex',
                        'category_id' => 31,
                        'resource_id' => 40,
                        'title' => $dataNews['title'],
                        'img' => '536897781.jpg',
                        'text' => $dataNews['description'],
                        'ip' => '0.0.0.0',
                        'updated_user_id' => $userId,
                        'created_user_id' => $userId,
                    ]
                )->save();
            }
        }

        $fileName = sprintf('Logs%s.txt', time() . rand(0, 10000));
        Storage::disk('publicLogs')->put($fileName, $link);
    }
}