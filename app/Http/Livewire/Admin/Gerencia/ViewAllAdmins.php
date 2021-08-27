<?php

namespace App\Http\Livewire\Admin\Gerencia;

use Livewire\Component;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class ViewAllAdmins extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $sorts = [
        'sortField' => 'created_at',
        'sortDirection' => 'desc' 
    ];

    public $filters = [
        'search' => null,
    ];

    public function render()
    {
        $allAdmin = $this->runQuerySearchAdmins();
        $allAdmin = $this->paginate($allAdmin, $this->perPage);        
        return view('livewire.admin.gerencia.view-all-admins', compact('allAdmin'));
    }

    public function applySort($value)
    {
        if ($this->sorts['sortField'] === $value) {
            $this->sorts['sortDirection'] = $this->sorts['sortDirection'] === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sorts['sortDirection'] = 'asc';
        }

        $this->sorts['sortField'] = $value;

    }

    public function runQuerySearchAdmins()
    {  
        if(empty($this->filters['search'])){
            return User::runQuery(null, $this->sorts);
        }else{
            $this->gotoPage(1);
            return User::runQuery($this->filters['search'], $this->sorts);
        }

    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
       
}
