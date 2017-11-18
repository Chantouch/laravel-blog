@auth
  <comment-form
      post_id="{{ $post->id }}"
      placeholder="@lang('comments.placeholder.content')"
      button="@lang('comments.comment')">
  </comment-form>
@else
  @component('components.alerts.default', ['type' => 'warning'])
    <a href="{!! url('login') !!}">@lang('comments.sign_in')</a>@lang('comments.to_comment')
  @endcomponent
@endauth