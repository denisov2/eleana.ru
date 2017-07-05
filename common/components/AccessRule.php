<?php


namespace common\components;


class AccessRule extends \yii\filters\AccessRule
{
    /**
     * @inheritdoc
     * */
    protected function matchRole($user)
    {


        if (empty($this->roles)) {
            return true;
        }

        foreach ($this->roles as $role) {
            if ($role === '?') {
                if (\Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!\Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif (!$user->getIsGuest() && $role === $user->identity->role) {
                return true;
            }
            /*
            elseif ($role === 'admin') {
                if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->isAdmin) {
                    return true;
                }
            }

            elseif ($user->can($role)) {
                return true;
            }
            */
        }

        return false;
    }
}
