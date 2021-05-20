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
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="description">説明</label>
        <textarea class="form-control   "name="description" cols="30" rows="4" value="{{ $recipe->description }}"></textarea>
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('description') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      <!-- TODO toolsテーブルを作成した後に追加する
      道具(tools, checkbox)
      <div class="form-group">
        <label for="cookingtime">所要時間</label>
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
       -->
      <div class="form-group">
        <label for="is_comment_allowed">コメント許可</label><br/>
        <input type="radio" id="allowed" name="is_comment_allowed" value="0" checked="{{ $recipe->is_comment_allowed }}">
        <label for="allowed">許可する</label>
        <input type="radio" id="not_allowed" name="is_comment_allowed" value="0" checked="{{ $recipe->is_comment_allowed }}">
        <label for="allowed">許可しない</label>
        @if ($errors->has('is_comment_allowed'))
          @foreach ($errors->get('is_comment_allowed') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      <!-- TODO カテゴリーテーブルを作成して値を参照するセレクトボックスを作成する
      カテゴリ(select_box)
      <div class="form-group">
        <label for="cookingtime">所要時間</label>
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      -->
        <!-- TODO: 画像アップロード機能を追加する?
        (file)
      <div class="form-group">
        <label for="cookingtime">所要時間</label>
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
        -->
      <button type="submit" class="btn btn-default">登録</button>
      <input type="reset"  class="btn btn-default" value="リセット">
      <a href="/recipe">戻る</a>
      </form>
    </div>
  </div>
</div>
