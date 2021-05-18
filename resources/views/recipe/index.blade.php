<head>
    <title>easyCookingMediaApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">レシピ一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">レシピ名</th>
                    <th class="text-center">所要時間</th>
                    <th></th>
                </tr>
                @foreach($recipes as $recipe)
                <tr>
                    <td>
                        <a href="/recipe/{{ $recipe->id }}/edit">{{ $recipe->id }}</a>
                    </td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->cookingtime }}</td>
                    <td>
                        <form action="/recipe/{{ $recipe->id }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div><a href="/recipe/create" class="btn btn-default">新規作成</a></div>
        </div>
    </div>
