<?php
class Controller_Post extends Controller
{
    public function action_index()
    {
            $data = array();
            $data['rows'] = Model_Post::find_all();
            return View::forge('post/list',$data);
    }
    public function action_form()
    {
	    return View::forge('post/form');
    }
    public function action_save()
    {
            $form = array();
	    $form['title'] = Input::post('title');
	    $form['summary'] = Input::post('summary');
	    $form['body'] = Input::post('body');
            $date = new Datetime();
            $form['created_at'] = $date->format('YmdH');
	    $post = Model_Post::forge();
	    $post->set($form);
	    $post->save();
	    Response::redirect('post');
    }

    public function action_auto_insert()
    {
        for ($i = 0; $i < 10; $i++) {
            $post = Model_Post::forge();
            //投入用のダミーデータを配列として作成
            $row = array();
            $row['title'] = $i . '番目の投稿の件名';
            $row['summary'] = $i . '番目の投稿の概要';
            $row['body'] = 'これは' . $i . '番目の投稿です。' . "\n" . 'テストで投稿しています。';
//            $row['created_at'] = date("Y-m-d H:i:s", timestamp);
//            $row['updated_at'] = date("Y-m-d H:i:s", timestamp);
            //配列からModel_Postクラスのオブジェクトに値を設定する
   	    $post->set($row);
            //オブジェクトを保存する
            $post->save();
        }
        echo "Finished!";
    }
}
