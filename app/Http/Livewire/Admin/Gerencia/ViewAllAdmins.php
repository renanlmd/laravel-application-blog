<?php

namespace App\Http\Livewire\Admin\Gerencia;

use Livewire\Component;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;



class ViewAllAdmins extends Component
{
    use WithPagination;

    public $search = null;

    public $perPage = 10;

    public $sorts = [
        'sortField' => 'created_at',
        'sortDirection' => 'asc' 
    ];

    public $filters = [
        'search' => null,
    ];

    public function render()
    {
        $allAdmin = $this->runQuerySearchAdmins();
        return view('livewire.admin.gerencia.view-all-admins', compact('allAdmin'));
    }

    public function applySort($value)
    {
        if ($this->sorts['sortField'] === $value) {
            $this->sorts['sortDirection'] = $this->sorts['sortDirection'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sorts['sortDirection'] = 'asc';
        }

        $this->sorts['sortField'] = $value;

    }

    public function runQuerySearchAdmins()
    {  
        $query = User::runQuery($this->filters['search'], $this->perPage,$this->sorts);
        return $query;

    }
    
    
}
