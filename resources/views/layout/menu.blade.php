<div class="ui menu">
  <a href="{{url()}}" class="item">{{t('Home')}}</a>
  <div class="ui dropdown link item">
    <span class="text">{{t('People')}}</span>
    <i class="dropdown icon"></i>
    @include('layout.menu.people')
  </div>
</div>
<br />

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $('.ui.dropdown').dropdown({
    "on": 'hover',
    "action": 'none'
  });
});
</script>
@endpush
