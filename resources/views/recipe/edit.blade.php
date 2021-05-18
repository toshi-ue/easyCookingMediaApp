<head>
    <title>easyCookingMediaApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>レシピ登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <form action="/recipe/{{ $recipe->id }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">レシピ名</label>
                    <input type="text" class="form-control" name="name" value="{{ $recipe->name }}">
                </div>
                <div class="form-group">
                    <label for="cookingtime">所要時間</label>
                    <input type="text" class="form-control" name="price" value="{{ $recipe->cookingtime }}">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/recipe">戻る</a>
            </form>
        </div>
    </div>
</div>
