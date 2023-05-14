<div>
    <div class="flex items-center justify-end pl-4 pb-4 pr-4 mt-4 w-full mx-auto">
        <button wire:click='$emit("openModal", "user.user-form", {{ json_encode(["modal" => "create", "user" => null]) }})'
                class="h-8 px-4 m-2 text-sm text-white bg-red-600 transition-colors duration-150 rounded-lg focus:shadow-outline hover:bg-indigo-800">New User</button>
    </div>
    <table class="table w-full">
        <thead>
        <tr>
            <th class="border p-4">Name</th>
            <th class="border p-6">Email</th>
            <th class="border p-2">Manipulation</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($users))
            @foreach($users as $user)
                <tr>
                    <td class="border p-4">{{ $user->name }}</td>
                    <td class="border p-6">{{ $user->email }}</td>
                    <td class="border p-2 text-center">
                        <button wire:click='$emit("openModal", "user.user-form", {{ json_encode(["modal" => "update", "user" => $user]) }})' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        <span class="w-custom"></span>
                        <button wire:click="deleteuser({{ $user->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete </button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
