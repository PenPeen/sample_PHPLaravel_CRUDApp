<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;


/**
 * GenerateQueryクラス
 * 
 * DBにアクセスするためのクエリを生成する。
 */
class GenerateQueryService{
    /**
     * 検索に必要となるクエリを生成する。
     * 
     * @param $request リクエスト時に受け取ったデータ
     * @return Illuminate\Database\Query\Builder
     */
    static function generateSearch($request)
    {
        // 検索ワード取得
        $words = $request->input('search_word');
        // 全角スペースを半角スペースに変換
        $words = mb_convert_kana($words, 's', 'UTF-8');
        // 配列に分割
        $search_words = explode(" ", $words);

        // クエリ生成
        $query = DB::table('products')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->select('products.id', 'products.name', 'types.name as type_name', 'products.price')
            ->orderBy('id', 'asc');

        if(!empty($search_words)){
            foreach($search_words as $search_word){
                $query
                    ->where('products.name', 'like', '%' . $search_word . '%')
                    ->orWhere('types.name', 'like', '%' . $search_word . '%');
            }
        }
        return $query; 
    }
}