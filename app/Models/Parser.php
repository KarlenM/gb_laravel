<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchestra\Parser\Xml\Facade as XmlParser;
use \App\Models\News;
use \App\Models\ResourcesIds;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class Parser extends Model
{
    public function run($rss)
    {
        try
        {
            $xml = XmlParser::load($rss);
        }
        catch(Exception $e)
        {
            return false;
        }

        $data = $xml->parse(
            [
                'id' => [
                    'uses' => 'entry.id'
                ],
                'author' => [
                    'uses' => 'entry.author.name'
                ],
                'text' => [
                    'uses' => 'entry.content'
                ],
                'title' => [
                    'uses' => 'entry.title'
                ],
                'news' => [
                    'uses' => 'entry[id,title,author.name,content]'
                ]
            ]
        );

        $i = 0;
        foreach($data['news'] as $key => $dataNews)
        {
            $author = str_replace('/u/', '', $dataNews['author']['name']);
            $data['news'][$key]['author'] = $author;


            if(!resourcesIds::whereResourcesAuthorIds($dataNews['id'])->first())
            {
                $i++;
                $resourcesIds = new ResourcesIds;
                $resourcesIds->fill(
                    [
                        'resources_author_ids' => $dataNews['id']
                    ]
                )->save();

                $news = new News;
                $news->fill(
                    [
                        'author' => $author,
                        'category_id' => 30,
                        'resource_id' => 39,
                        'title' => $dataNews['title'],
                        'img' => '536897781.jpg',
                        'text' => $dataNews['content'],
                        'ip' => '0.0.0.0',
                        'updated_user_id' => Auth::id(),
                        'created_user_id' => Auth::id(),
                    ]
                )->save();
            }
        }

        return ['count' => $i];

    }
}
