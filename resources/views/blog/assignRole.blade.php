<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .btn-group {
        display: flex;
        gap: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h1>User Lists</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td>
                            <div class="btn-group">
                                @foreach ($roles as $role)
                                    <form method="POST" action="{{ route('admin.assignRole', ['user' => $user, 'role' => $role]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">{{ $user->hasRole($role->name) ? 'Remove ' : 'Assign ' }}{{ $role->name }}</button>
                                    </form>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
