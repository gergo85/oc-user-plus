<?php namespace Indikator\User;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use RainLab\User\Models\User as UserModel;
use Lang;

class Plugin extends PluginBase
{
    public $require = ['RainLab.User'];

    public function pluginDetails()
    {
        return [
            'name'        => 'indikator.user::lang.plugin.name',
            'description' => 'indikator.user::lang.plugin.description',
            'author'      => 'indikator.user::lang.plugin.author',
            'homepage'    => 'https://github.com/gergo85/oc-user-plus'
        ];
    }

    public function boot()
    {
        UsersController::extendFormFields(function($form, $model, $context) {

            if (!$model instanceof UserModel) {
                return;
            }

            $form->addTabFields([
               'iu_gender' => [
                   'label' => 'indikator.user::lang.personal.gender',
                   'tab'   => 'indikator.user::lang.personal.tab',
                   'type'  => 'dropdown',
                   'options' => ['unknown' => Lang::get('indikator.user::lang.gender.unknown'), 'female' => Lang::get('indikator.user::lang.gender.female'), 'male' => Lang::get('indikator.user::lang.gender.male')],
                   'span'  => 'left'
               ],
               'iu_job' => [
                   'label' => 'indikator.user::lang.personal.job',
                   'tab'   => 'indikator.user::lang.personal.tab',
                   'span'  => 'right'
               ],
               'iu_about' => [
                   'label' => 'indikator.user::lang.personal.about',
                   'tab'   => 'indikator.user::lang.personal.tab',
                   'type'  => 'textarea',
                   'size'  => 'small',
                   'span'  => 'full'
               ],
               'iu_webpage' => [
                   'label' => 'indikator.user::lang.internet.webpage',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'left'
               ],
               'iu_blog' => [
                   'label' => 'indikator.user::lang.internet.blog',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'right'
               ],
               'iu_facebook' => [
                   'label' => 'indikator.user::lang.internet.facebook',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'left'
               ],
               'iu_twitter' => [
                   'label' => 'indikator.user::lang.internet.twitter',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'right'
               ],
               'iu_skype' => [
                   'label' => 'indikator.user::lang.internet.skype',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'left'
               ],
               'iu_icq' => [
                   'label' => 'indikator.user::lang.internet.icq',
                   'tab'   => 'indikator.user::lang.internet.tab',
                   'span'  => 'right'
               ],
               'iu_comment' => [
                   'label' => 'indikator.user::lang.comment',
                   'tab'   => 'rainlab.user::lang.user.account',
                   'type'  => 'textarea',
                   'size'  => 'small',
                   'span'  => 'full'
               ]
           ]);

        });
    }
}
