<?php namespace Tukecx\Base\Pages\Hook;

use Tukecx\Base\Pages\Repositories\Contracts\PageContract;
use Tukecx\Base\Pages\Repositories\PageRepository;

class RegisterDashboardStats
{
    /**
     * @var PageRepository
     */
    protected $repository;

    public function __construct(PageContract $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        $count = $this->repository->count();
        echo view('tukecx-pages::admin.dashboard-stats.stat-box', [
            'count' => $count
        ]);
    }
}
