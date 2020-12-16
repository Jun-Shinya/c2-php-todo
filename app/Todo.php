<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    const STATUS_NOT_YET = 0;
    const STATUS = [
        '未着手',
        '作業中',
        '完了'
    ];

    const WEEK = [
        '日',
        '月',
        '火',
        '水',
        '木',
        '金',
        '土',
    ];

    protected $fillable = ['title', 'due_date', 'status'];

    /**
     * 状態表示のテキストを返す
     * 
     * @return string
     */
    public function getStatusText() {
        if (empty(self::STATUS[$this->status])) {
            return "";
        }

        return self::STATUS[$this->status];
    }

    public function getDisplayDate(): string 
    {
        $timestamp = strtotime($this->due_date);
        return Date('Y年m月d日',$timestamp) . '('.self::WEEK[Date('w',$timestamp)].')';
    }
}
