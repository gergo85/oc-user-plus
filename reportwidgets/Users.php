<?php namespace Indikator\User\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use Schema;
use Db;

class Users extends ReportWidgetBase
{
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'indikator.user::lang.widget.title',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
            'total' => [
                'title'             => 'indikator.user::lang.widget.show_total',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'active' => [
                'title'             => 'indikator.user::lang.widget.show_active',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'inactive' => [
                'title'             => 'indikator.user::lang.widget.show_inactive',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'deleted' => [
                'title'             => 'indikator.user::lang.widget.show_deleted',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'guest' => [
                'title'             => 'indikator.user::lang.widget.show_guest',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'superuser' => [
                'title'             => 'indikator.user::lang.widget.show_superuser',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }

    protected function loadData()
    {
        $this->vars['active']   = Db::table('users')->where('is_activated', 1)->count();
        $this->vars['inactive'] = Db::table('users')->where('is_activated', 0)->count();

        if (Schema::hasColumn('users', 'deleted_at')) {
            $this->vars['deleted'] = Db::table('users')->where('deleted_at', '>', 0)->count();
        }
        else {
            $this->vars['deleted'] = 0;
        }

        if (Schema::hasColumn('users', 'is_guest')) {
            $this->vars['guest'] = Db::table('users')->where('is_guest', 1)->count();
        }
        else {
            $this->vars['guest'] = 0;
        }

        if (Schema::hasColumn('users', 'is_superuser')) {
            $this->vars['superuser'] = Db::table('users')->where('is_superuser', 1)->count();
        }
        else {
            $this->vars['superuser'] = 0;
        }

        $this->vars['total'] = $this->vars['active'] + $this->vars['inactive'];
    }
}
