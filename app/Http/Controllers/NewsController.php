<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $categories = [['politics' => 'Политика'], ['economics' => 'Экономика'], ['it' => 'IT'], ['sport' => 'Спорт']];
    protected $news = [];

    public function __construct() {
        $this->news = [
            [
                'category' => $this->categories[0],
                'title' => 'Заголовок 1',
                'text' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus."
            ],
            [
                'category' => $this->categories[1],
                'title' => 'Заголовок 2',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[2],
                'title' => 'Заголовок 3',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[3],
                'title' => 'Заголовок 4',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[0],
                'title' => 'Заголовок 5',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[1],
                'title' => 'Заголовок 6',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[2],
                'title' => 'Заголовок 7',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ],
            [
                'category' => $this->categories[0],
                'title' => 'Заголовок 8',
                'text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat ratione nam facere autem consequatur fuga ex beatae, fugit repellendus, dicta id sed animi illum quibusdam magnam voluptatibus laboriosam incidunt?
                Quibusdam aspernatur laborum eaque, doloremque saepe quidem nisi consectetur, sit est placeat blanditiis odit temporibus. Aut consequuntur repudiandae, id sint similique tempore, sapiente sequi obcaecati consequatur, soluta aliquam temporibus. Officiis.
                Nemo sequi in, distinctio temporibus necessitatibus eligendi minima corporis minus expedita vitae eos atque error sint fuga assumenda beatae incidunt adipisci repellat reprehenderit illum dolorum pariatur corrupti esse culpa. Earum?
                Dolorem amet quos minima voluptas dolor, modi in iusto tempore incidunt praesentium atque, perferendis voluptate unde nemo eligendi fugiat necessitatibus neque saepe delectus animi repudiandae quis esse iure! Quaerat, voluptatibus.'
            ]
        ];
    }

    public function index(){
        return view('news', 
            [
                'news' => $this->news
            ]
        );
    }

    public function page($category, $id){
        return view('news-page', 
            [
                'news' => $this->news,
                'category' => $category,
                'id' => $id
            ]
        );
    }

    public function categories(){
        return view('categories', 
            [
                'categories' => $this->categories
            ]
        );
    }

    public function category($category){
        return view('categories', 
            [
                'news' => $this->news,
                'categories' => $this->categories,
                'selectedCategory' => $category
            ]
        );
    }

    public function addView(){
        return view('add', 
            [
                'categories' => $this->categories,
            ]
        );
    }

    public function add(Request $request){
        dd($request->all());

        return view('add', 
            [
                'categories' => $this->categories,
            ]
        );
    }
}
