<div class="row">
    @foreach ($destaques as $k => $post)
        @if ($k == 0)
            <div class="col-12">
                @include('website.partials.card-post', ['class_img' => 'col-sm-6', 'class_text' => 'col-sm-6'])
            </div>
        @else
            <div class="col-12 col-sm-6">
                @include('website.partials.card-post', ['class_img' => 'col-sm-6', 'class_text' => 'col-sm-6'])
            </div>
        @endif
    @endforeach
</div>