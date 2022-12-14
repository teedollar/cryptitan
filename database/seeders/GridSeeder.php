<?php

namespace Database\Seeders;

use App\Models\Grid;
use Illuminate\Database\Seeder;

class GridSeeder extends Seeder
{
    /**
     * index.home Widgets
     *
     * @var string[]
     */
    protected $indexHome = [
        'price_chart',
        'payment_account_chart',
        'wallet_account_chart',
        'recent_activity',
        'feature_limits',
        'active_peer_trade_sell',
        'active_peer_trade_buy',
    ];

    /**
     * admin.home widgets
     *
     * @var string[]
     */
    protected $adminHome = [
        'pending_verification',
        'pending_deposits',
        'pending_withdrawals',
        'earning_summary',
        'system_status',
        'registration_chart',
        'latest_users',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedIndexHomePage();
        $this->seedAdminHomePage();
    }

    /**
     * Send Index Home Page
     *
     * @return void
     */
    protected function seedIndexHomePage()
    {
        foreach ($this->indexHome as $order => $name) {
            Grid::updateOrCreate([
                'page' => 'index.home',
                'name' => $name,
            ], [
                'order' => $order,
            ]);
        }
    }

    /**
     * Send Admin Home Page
     *
     * @return void
     */
    protected function seedAdminHomePage()
    {
        foreach ($this->adminHome as $order => $name) {
            Grid::updateOrCreate([
                'page' => 'admin.home',
                'name' => $name,
            ], [
                'order' => $order,
            ]);
        }
    }
}
