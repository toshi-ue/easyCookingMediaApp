@extends('recipe/layout')
@section('content')
<div class="container ops-main">
  <div class="row">
    <form method="GET" action="/recipe" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>
    <div class="col-md-12">
      <h3 class="ops-title">レシピ一覧</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      @if($search_keyword)
          <div>{{$search_keyword}}の検索結果</div>
      @endif

      <table class="table text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">レシピ名</th>
          <th class="text-center">所要時間</th>
          <th class="text-center">説明</th>
          <th class="text-center">コメント許可</th>
          <th class="text-center">公開状態</th>
          <th></th>
        </tr>
        @foreach ($recipes as $recipe)
        <tr>
          <td>
            <a href="/recipe/{{ $recipe->id }}/edit">{{ $recipe->id }}</a>
          </td>
          <td>{{ $recipe->name }}</td>
          <td>{{ $recipe->cookingtime }}</td>
          <td class="text-left">{{ $recipe->description }}</td>
          <td>
          @if($recipe->is_comment_allowed)
            許可する
          @else
            許可しない
          @endif
          </td>
          <td>
          @if($recipe->is_published)
            公開中
          @else
            未公開
          @endif
          </td>
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
      <div>{{$recipes->links()}}</div>
      <div><a href="/recipe/create" class="btn btn-default">新規作成</a></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="ops-title">削除済みレシピ一覧</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <table class="table text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">レシピ名</th>
          <th class="text-center">所要時間</th>
          <th class="text-center">説明</th>
          <th class="text-center">コメント許可</th>
          <th class="text-center">公開状態</th>
          <th></th>
        </tr>
        @foreach ($deleted_recipes as $deleted_recipe)
        <tr>
          <td>
            <a href="/recipe/{{ $deleted_recipe->id }}/edit">{{ $deleted_recipe->id }}</a>
          </td>
          <td>{{ $deleted_recipe->name }}</td>
          <td>{{ $deleted_recipe->cookingtime }}</td>
          <td class="text-left">{{ $recipe->description }}</td>
          <td>
          @if($deleted_recipe->is_comment_allowed)
            許可する
          @else
            許可しない
          @endif
          </td>
          <td>
            <form action="/recipe/restore/{{ $deleted_recipe->id }}" method="get">
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-repeat"></span></button>

            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
