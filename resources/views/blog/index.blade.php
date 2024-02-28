<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: 1px solid #dc3545;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Posts Lists</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>
                            <form action="{{ route('blog.edit', $post->id) }}" method="GET" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
