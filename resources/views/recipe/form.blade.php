<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>レシピ登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            @include('recipe/message')
            @if ($target == 'store')
                <form action="/recipe" method="post">
            @elseif($target == 'update')
                    <form action="/recipe/{{ $recipe->id }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">レシピ名</label>
                <input type="text" class="form-control" name="name" value="{{ $recipe->name }}">
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $message)
                        <span class="text-danger">{{ $message }}</span><br>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="cookingtime">所要時間</label>
                <input type="text" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
                @if ($errors->has('cookingtime'))
                    @foreach ($errors->get('cookingtime') as $message)
                        <span class="text-danger">{{ $message }}</span><br>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-default">登録</button>
            <a href="/recipe">戻る</a>
            </form>
        </div>
    </div>
</div>
