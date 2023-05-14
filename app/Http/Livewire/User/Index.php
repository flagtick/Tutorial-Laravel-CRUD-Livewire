<?php

namespace App\Http\Livewire\User;

use App\Repositories\User\UserRepository;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{

    use LivewireAlert;

    protected $repository;

    protected $listeners = [
        'refreshUser' => '$refresh',
    ];

    public function mount(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function render()
    {
        if (null != $this->repository) {
            $users = $this->repository->getAll();
        } else {
            /** Handle case if refresh users table */
            $users = app(UserRepository::class)->getAll();
        }
        if (isset($users)) {
            return view('livewire.user.index', compact('users'));
        } else {
            return [];
        }
    }

    public function deleteuser($user_id) {
        app(UserRepository::class)->delete($user_id);
        $this->emit('refreshUser', 'user.index');
        $this->alert('success', 'Delete user successfully!');
    }

    public function refreshUser() {
        $this->render();
    }
}
