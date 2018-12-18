<?php

namespace backend\modules\order\models;

use app\models\Position;
use backend\modules\statusorder\models\StatusOrder;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $time
 * @property string $comments
 * @property int $user_id
 *
 * @property Position[] $positions
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['user_id','status_order'], 'integer'],
            [['comments'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'comments' => 'Comments',
            'user_id' => 'User ID',
            'status_order'=>'Status Order'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusOrder::className(), ['id'=>'status_order']);
    }
    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
