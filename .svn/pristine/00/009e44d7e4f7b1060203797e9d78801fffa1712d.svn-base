<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $featured_image
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Blog extends base\BaseBlog
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'content', 'featured_image', 'status'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'status'], 'string', 'max' => 80],
            [['slug'], 'string', 'max' => 40],
            [['featured_image'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'featured_image' => 'Featured Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new query\BlogQuery(get_called_class());
    }
    
    
   
    
    /**
     * Blog list
     * @param type $params
     * @return ActiveDataProvider
     */
    public static function blogList($params) {
        $query = self::find()->byStatus('Active');
                $query->select("blog.id,"
                . "blog.title,"
                . "blog.slug,"
                . "blog.content,"
                . "blog.featured_image,"
                . "blog.created_at,"
                . "blog.updated_at");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
        ]);
        if (!empty($dataProvider)) {
            $result = [];
            foreach ($dataProvider->getModels() as $blog) {
                $url = \Yii::$app->urlManagerBackend->baseurl;
                if (!empty($blog['featured_image'] && file_exists('../../backend/web/' . $blog['featured_image']))) {
                    $blog['featured_image'] = $url . $blog['featured_image'];
                } else {
//                    $blog['featured_image'] = $url . '/uploads/blog/default-blog-image.png';
                    $blog['featured_image'] = 'https://placeholdit.imgix.net/~text?txtsize=80&txt=Default%20image&w=600&h=300';
                }
                $result[] = $blog;
            }
            $dataProvider->setModels($result);
        }
        return $dataProvider;
    }
}
